<?php

/**
 * Description of HoneyPot
 * 
 * The abstract server class get the data and logger write the data in log file
 *
 * @author      Samet Tarim
 * @copyright   (c) 2021, Samet Tarim
 * @package     honeypot
 * @subpackage  simple
 * @version     1.0.0
 * @since       1.0
 * @link        https://www.prod3v3loper.com/
 */
class HoneyPot {

    /**
     * 
     */
    public function logging() {

        $content = "";
        $content .= "[" . date("d.m.Y - H:i:s", time()) . "] " . PHP_EOL;
        $content .= "IP: " . Server::getIP() . PHP_EOL;
        $content .= "AGENT: " . Server::getAgent() . PHP_EOL;
        $content .= "HOST: " . Server::getHost() . PHP_EOL;
        $content .= PHP_EOL;
        
        $this->write($content);
    }

    /**
     * 
     * @param string $filename
     * @param string $content
     */
    protected function write($content = '', $filename = '') {

        $filename = $filename != '' ? $filename : 'honey.log';

        if (!$handle = fopen($filename, "a")) {
            //        print "Can not open file $filename";
            exit;
        }
        if (fwrite($handle, $content) === FALSE) {
            //        print "Can not write in file $filename";
            exit;
        }
        fclose($handle);

        // Set file rights and only owner can read and edit others not
        chmod($filename, 0600);
    }

}