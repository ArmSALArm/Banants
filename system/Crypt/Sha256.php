<?php
/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 19.06.2015
 * Time: 13:44
 */

namespace Crypt;

if(!defined('ROOT_PATH')){header('HTTP/1.0 404 Not Found'); die("<h1>404 Not Found</h1>The page that you have requested could not be found.");}

class Sha256 {

    private $_key = '';

    /**
     * Задаёт ключ с помощю которого будет происходить шифрование
     *
     * @access public
     * @return void
     */
    public function setKey($key) {
        $this->_key = hash('sha256', $key, TRUE);
    }

    /**
     * Генерирует хеш
     * @param $str
     * @return string
     */
    public function encrypt($str)
    {
        return hash_hmac('sha256', $str, $this->_key);
    }
}