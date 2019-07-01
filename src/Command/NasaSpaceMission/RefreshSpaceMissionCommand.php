<?php


namespace App\Command\NasaSpaceMission;

use App\Entity\Holidays;
use App\Service\NasaSpaceMission\NasaSpaceMissionService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\CurlHttpClient;


class RefreshSpaceMissionCommand extends Command
{
    const API_NASA_KEY = 'oCEg2uXTbKKbXd5rpyEV9WNlBmIbiZ9cmth2etlj';
    const API_NASA_URL = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date={earth_date}&api_key=';


    protected static $defaultName = 'app:refresh-nasa';
    private $nasaSpaceMissionService;


    public function __construct(NasaSpaceMissionService $nasaSpaceMissionService)
    {
        parent::__construct();

        $this->nasaSpaceMissionService = $nasaSpaceMissionService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Refresh nasa data.')
            ->setHelp('This command allows you to refersh and save nasa data to database...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Whoa!');
        $output->write('You are about to ');
        $output->write('refrsh NASA list.');

        $httpClient = new CurlHttpClient();

        $this->handleNASAPhotosByHolidays($httpClient);

        $output->write("it's done");
    }

    private function handleNASAPhotosByHolidays($httpClient)
    {
        $holidayRecords = $this->nasaSpaceMissionService->getALL(Holidays::class);

        foreach ($holidayRecords AS $holidayRecord) {
            $url = $this->getNASAAPIURL($holidayRecord->getDateAndTime()->format('Y-m-d'));

            $response = $httpClient->request('GET', $url);

            $data = json_decode($response->getContent(), true);

            $this->nasaSpaceMissionService->handleRefreshData($data['photos']);
        }
    }


    private function getNASAAPIURL($date)
    {
        $url = static::API_NASA_URL;
        $apiKey = static::API_NASA_KEY;
        $validURL = str_replace('{earth_date}', $date, $url);
        $resultKey = "{$validURL}{$apiKey}";

        return $resultKey;
    }
}