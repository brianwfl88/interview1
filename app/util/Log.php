<?php
namespace App\Util;

use Exception;

class Log
{
    const LOG_ERROR_FILE_FORMAT = "./logs/error_%s.txt";
    const ERROR_FORMAT = "[ERROR] - %s";
    const ERROR_EXCEPTION_FORMAT = "Error on line %s: %s\n%s";
    private $time;

    private function __construct()
    {
        $this->time = date('Y_m_d_h_i');
    }

    private static function write(string $message): void
    {
        $instance = new static;
        $fp = fopen(sprintf(self::LOG_ERROR_FILE_FORMAT, $instance->time), 'a');

        fwrite(
            $fp,
            $message . PHP_EOL . PHP_EOL
        );

        fclose($fp);
        $fp = null;
    }

    public static function formatFromException(Exception $e)
    {
        return sprintf(
            self::ERROR_EXCEPTION_FORMAT,
            $e->getLine(),
            $e->getMessage(),
            $e->getTraceAsString()
        );
    }

    public static function error(string $message): void
    {
        self::write(
            sprintf(
                self::ERROR_FORMAT,
                $message
            )
        );
    }
}
