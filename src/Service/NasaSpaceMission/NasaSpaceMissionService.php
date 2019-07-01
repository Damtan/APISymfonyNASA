<?php

namespace App\Service\NasaSpaceMission;

use App\Entity\NasaCamera;
use App\Entity\NasaCameraName;
use App\Entity\NasaCameraToRover;
use App\Entity\NasaRover;
use App\Entity\NasaRoverName;
use App\Entity\NasaSpaceFullInfoView;
use App\Entity\NasaSpaceMission;
use App\Entity\NasaSpaceMissionToCamera;
use App\Service\DBBaseService;


class NasaSpaceMissionService extends DBBaseService
{
    public function handleRefreshData(array $missionResults): bool
    {
        foreach ($missionResults AS $missionResult) {
            $this->handleMainMissions($missionResult);
        }

        return TRUE;
    }

    private function handleMainMissions($missionData)
    {
        $nasaSpaceMissionRecord = $this->getOneBy(NasaSpaceMission::class,
            ['eid' => $missionData['id']]
        );

        if (!$nasaSpaceMissionRecord) {
            $nasaSpaceMissionRecord = new NasaSpaceMission();
            $nasaSpaceMissionRecord->setEid((int)$missionData['id']);
        }

        $nasaSpaceMissionRecord->setEarthDate(date_create_from_format('Y-m-d', $missionData['earth_date']));
        $nasaSpaceMissionRecord->setImgSrc(strval($missionData['img_src']));

        $this->commit($nasaSpaceMissionRecord);

        $cameraID = $this->handleMissionCamera($nasaSpaceMissionRecord->getId(), $missionData['camera']);

        $this->handleMissionRover($cameraID, $missionData['rover']);
    }

    private function handleMissionCamera(int $nasaID, array $cameraData): int
    {
        $nasaCameraRecord = $this->getOneBy(NasaCamera::class, ['eid' => $cameraData['id']]);

        if (!$nasaCameraRecord) {
            $nasaCameraRecord = new NasaCamera();
            $nasaCameraRecord->setEid((int)$cameraData['id']);

            $this->commit($nasaCameraRecord);
        }

        $nasaToCameraRecord = $this->getOneBy(
            NasaSpaceMissionToCamera::class,
            [
                'nasa_id' => $nasaID,
                'camera_id' => $nasaCameraRecord->getId()
            ]
        );

        if (!$nasaToCameraRecord) {

            $nasaToCameraRecord = new NasaSpaceMissionToCamera();

            $nasaToCameraRecord->setNasaId($nasaID);
            $nasaToCameraRecord->setCameraId($nasaCameraRecord->getId());

            $this->commit($nasaToCameraRecord);
        }

        $nasaCameraNameRecord = $this->getOneBy(NasaCameraName::class, ['cl_id' => $nasaCameraRecord->getId()]);

        if (!$nasaCameraNameRecord) {
            $nasaCameraNameRecord = new NasaCameraName();
            $nasaCameraNameRecord->setClId((int)$nasaCameraRecord->getId());
        }

        $nasaCameraNameRecord->setName(strval($cameraData['name']));
        $nasaCameraNameRecord->setFullName(strval($cameraData['full_name']));

        $this->commit($nasaCameraNameRecord);

        return $nasaCameraNameRecord->getId();
    }

    private function handleMissionRover(int $cameraID, array $roverData)
    {
        $nasaRoverRecord = $this->getOneBy(NasaRover::class, ['eid' => $roverData['id']]);

        if (!$nasaRoverRecord) {
            $nasaRoverRecord = new NasaRover();

            $nasaRoverRecord->setEid((int)$roverData['id']);

            $this->commit($nasaRoverRecord);
        }

        $cameraToRoverRecord = $this->getOneBy(
            NasaCameraToRover::class,
            [
                'camera_id' => $cameraID,
                'rover_id' => $nasaRoverRecord->getId()
            ]
        );

        if (!$cameraToRoverRecord) {
            $cameraToRoverRecord = new NasaCameraToRover();

            $cameraToRoverRecord->setCameraId($cameraID);
            $cameraToRoverRecord->setRoverId($nasaRoverRecord->getId());

            $this->commit($cameraToRoverRecord);
        }

        $nasaRoverNameRecord = $this->getOneBy(NasaRoverName::class, ['cl_id' => $nasaRoverRecord->getId()]);

        if (!$nasaRoverNameRecord) {
            $nasaRoverNameRecord = new NasaRoverName();
            $nasaRoverNameRecord->setClId($nasaRoverRecord->getId());
        }

        $nasaRoverNameRecord->setName(strval($roverData['name']));

        $this->commit($nasaRoverNameRecord);
    }

    public function getNasaData(string $condition = NULL, array $parameters = [])
    {
        if ($condition !== NULL) {
            $result = $this->getAllWtithCondition(
                NasaSpaceFullInfoView::class,
                $condition,
                $parameters,
                ['t.earth_date' => 'ASC']
            );
        } else {
            $result = $this->getAll(NasaSpaceFullInfoView::class);
        }


        return $result;
    }

    public function getCameras()
    {
        return $this->getAll(NasaCameraName::class);
    }

    public function getRovers()
    {
        return $this->getAll(NasaRoverName::class);
    }
}