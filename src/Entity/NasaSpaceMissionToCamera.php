<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource(attributes={"filters"={"nasa_space_mission_to_cameras.nasa_id"}})
 * @ORM\Entity(repositoryClass="App\Repository\NasaSpaceMissionToCameraRepository")
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "nasaID": "exact", "cameraID": "partial"})
 */
class NasaSpaceMissionToCamera
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nasa_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $camera_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNasaId(): ?int
    {
        return $this->nasa_id;
    }

    public function setNasaId(int $nasa_id): self
    {
        $this->nasa_id = $nasa_id;

        return $this;
    }

    public function getCameraId(): ?int
    {
        return $this->camera_id;
    }

    public function setCameraId(int $camera_id): self
    {
        $this->camera_id = $camera_id;

        return $this;
    }
}
