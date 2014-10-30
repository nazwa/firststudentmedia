<?php

use Phalcon\Logger\Adapter\File as FileAdapter;
use Phalcon\Logger\Formatter\Json as JsonFormatter;

class mainTask extends \Phalcon\CLI\Task
{
    public function mainAction() {
        $logger = new FileAdapter(APPLICATION_PATH . "/../var/logs/cli_load.log", array(
            'mode' => 'w'
        ));
        $d = new DataController();

        $logger->log("Loading....");
        $load = print_r($d->load(), true);
        $logger->log("Looking for similar...");
        $similar = print_r($d->findSimilar(), true);

        $logger->log($load);
        $logger->log($similar);
    }


}