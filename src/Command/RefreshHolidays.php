<?php


namespace App\Command;

use App\Service\Holiday\HolidayService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\CurlHttpClient;


class RefreshHolidays extends Command
{
    const API_HOLIDAY_KEY = '994a9b5508982fd38434708f9746751a8a48e514';
    const API_HOLIDAY_URL = 'https://calendarific.com/api/v2/holidays?&api_key=';


    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:refresh-holidays';
    private $holidaysService;


    public function __construct(HolidayService $holidayService)
    {
        parent::__construct();

        $this->holidaysService = $holidayService;
    }

    protected function configure()
    {
        $this
            ->setDescription('Refresh polish holidays.')
            ->setHelp('This command allows you to refresh holidays...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Holiday refresh',
            '============',
            '',
        ]);

        $httpClient = new CurlHttpClient();
        $response = $httpClient->request('GET', $this->getHolidayAPIURL());

        $data = json_decode($response->getContent(), true);

        //$output->writeln();

        $output->writeln('Whoa!');
        $output->write('You are about to ');
        $output->write('refrsh polish holiday list.');

        $this->holidaysService->handleRefreshData($data['response']['holidays']);
    }

    private function getHolidayAPIURL()
    {
        $url = static::API_HOLIDAY_URL;
        $apiKey = static::API_HOLIDAY_KEY;

        $resultKey = "{$url}{$apiKey}&country=PL&year=2019";

        return $resultKey;
    }
}