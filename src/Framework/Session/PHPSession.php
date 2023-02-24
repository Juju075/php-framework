<?php

namespace App\Framework\Session;

class PHPSession implements SessionInterface
{

    /**
     * Ensure that session running
     */
    private function ensureStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * If this specific key exist in session return the session key
     * @param string $key
     * @param $defaultOrly
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    /**
     * Add value to key session
     * @param string $key
     * @param $value
     * @return mixed|void
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Delete session key
     * @param string $key
     * @return void
     */
    public function delete(string $key): void
    {
        $this->ensureStarted();
        unset($_SESSION[$key]);
    }
}