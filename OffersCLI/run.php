<?php declare(strict_types=1);
require "vendor/autoload.php";

use GuzzleHttp\Client;
use Loggers\LoggerAdapter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Readers\RemoteEndpointReader;
use Factories\StrategiesFactory;
use Outputs\CLIOutputs;
use Tasks\CLIOffersServices;

const APIURLPath = "http://localhost:8000/api/offers";
const LogPath = "./my-errors.log";

$strategiesFactory = new StrategiesFactory();
$log = new LoggerAdapter("errorsLogger");
$reader = new RemoteEndpointReader(new Client());
$output = new CLIOutputs();
$streamHandler = new StreamHandler(LogPath, Level::Error);

$task =  new CLIOffersServices($strategiesFactory, $reader, $output, $log, $streamHandler);
exit($task->doTask($argv, APIURLPath));



