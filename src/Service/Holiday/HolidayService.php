<?php


namespace App\Service\Holiday;

use App\Entity\Holidays;
use App\Service\DBBaseService;


class HolidayService extends DBBaseService
{
    public function handleRefreshData($holidayResults): bool
    {
        foreach ($holidayResults as $index => $holidayResult) {
            $repository = $this->getManager()->getRepository(Holidays::class);
            $holidaysRecord = $repository->findOneBy(['name' => $holidayResult['name']]);

            if (!$holidaysRecord) {
                $holidaysRecord = new Holidays();
            }

            $holidaysRecord->setName(strval($holidayResult['name']));
            $holidaysRecord->setDescription(strval($holidayResult['description']));

            $datetime = $this->getDatetime($holidayResult['date']['datetime']);

            $holidaysRecord->setDateAndTime($datetime);

            $this->commit($holidaysRecord);
        }

        return TRUE;
    }

    protected function getDatetime($currentDateTime)
    {
        $datetime = new \DateTime();

        $datetime->setDate($currentDateTime['year'], $currentDateTime['month'], $currentDateTime['day']);

        return $datetime;
    }
}