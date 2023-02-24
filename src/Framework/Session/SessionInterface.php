<?php

namespace App\Framework\Session;
/**
 * Basic function to get/set and delete any $_SESSION
 */
interface SessionInterface
{
    /**
     * @param string $key
     * @param $default
     * @return mixed
     */
    public function get(string $key, $default = null);
    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function set(string $key, $value);


    //supprime kley de session
    public function delete(string $key): void;
}