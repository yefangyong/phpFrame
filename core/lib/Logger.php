<?php


namespace core\lib;

use Monolog\Handler\StreamHandler;
use \Monolog\Logger as Log;

class Logger extends log
{
    public function __construct($name, array $handlers = array(), array $processors = array())
    {
        parent::__construct($name, $handlers, $processors);
        $date = date("Ymd");
        $this->pushHandler(new StreamHandler(conf::get('OPTIONS','log')['PATH'] . '/'.$date . "/" . $name . ".log", Logger::INFO));
    }

    /**
     * @param $msg
     * @param $content
     * @param $level
     * 写入日志
     */
    public function setLog($msg, $content, $level = 'INFO')
    {
        if (!is_array($content)) {
            $content = (array)$content;
        }
        switch (strtoupper($level)) {
            case "DEBUG":
                $this->debug($msg, $content);
                break;
            case "INFO":
                $this->info($msg, $content);
                break;
            case "NOTICE":
                $this->notice($msg, $content);
                break;
            case "WARNING":
                $this->warning($msg, $content);
                break;
            case "ERROR":
                $this->error($msg, $content);
                break;
            case "CRITICAL":
                $this->critical($msg, $content);
                break;
            case "ALERT":
                $this->alert($msg, $content);
                break;
            case "EMERGENCY":
                $this->emergency($msg, $content);
                break;
            default:
                $this->debug($msg, $content);
        }
    }
}