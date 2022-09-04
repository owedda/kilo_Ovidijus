<?php declare(strict_types=1);

namespace Tasks;

use Exception;
use Factories\StrategiesFactoryInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use Loggers\LoggerAdapterInterface;
use Outputs\OutputsInterface;
use Ovidijus\OffersPackage\OfferCollectionInterface;
use Ovidijus\OffersPackage\ReaderInterface;
use Monolog\Handler\HandlerInterface;

class CLIOffersServices implements OffersServicesInterface
{
    private StrategiesFactoryInterface $strategiesFactory;
    private ReaderInterface $reader;
    private OutputsInterface $output;
    private LoggerAdapterInterface $log;

    public function __construct(StrategiesFactoryInterface $strategy, ReaderInterface $reader,
                                OutputsInterface $outputs, LoggerAdapterInterface $logger,
                                HandlerInterface $streamHandlerAdapter)
    {
        $this->strategiesFactory = $strategy;
        $this->reader = $reader;
        $this->output = $outputs;
        $this->log = $logger;
        $this->log->pushHandler($streamHandlerAdapter);
    }

    public function doTask(array $args, $apiUrl): int
    {
        try {
            $data = $this->reader->read($apiUrl);
            $taskToStart = $args[1];

            if ($taskToStart == "count_by_price_range"
                && array_key_exists(3, $args)
                && !array_key_exists(4, $args)) {
                return $this->doSelectedTask($taskToStart, $args, $data);
            }
            else if ($taskToStart == "count_by_vendor_id"
                && array_key_exists(2, $args)
                && !array_key_exists(3, $args)) {
                return $this->doSelectedTask($taskToStart, $args, $data);
            }
        }
        catch (ConnectException $e) {
            $this->errorHandling($e, "API not working");
        }

        catch (ClientException $e){
            $this->errorHandling($e, "Wrong data from API");
        }

        echo "No such command with this input:)";
        return -1;
    }

    private function doSelectedTask(string $taskToStart, array $args, OfferCollectionInterface $data): int
    {
        $selectedCountStrategy = $this->strategiesFactory->getStrategy($taskToStart);
        $this->output->printCount($selectedCountStrategy, $args, $data);
        return 0;
    }

    private function errorHandling(Exception $e, string $message)
    {
        $this->log->error( $e->getMessage());
        $this->output->printErrorMessage($message);
    }
}
