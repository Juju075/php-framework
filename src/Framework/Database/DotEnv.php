<?php

namespace App\Framework\Database;

use Exception;

class DotEnv
{
    protected string $path;
    protected array $credentials;


    /**
     * @throws Exception
     */
    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new Exception();
        }
        $this->path = $path;
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }

    /**
     * @throws Exception
     */
    public function load(): self
    {
        if (!is_readable($this->path)) {
            throw new \LogicException('');
        }

        $lines = file($this->path, FILE_SKIP_EMPTY_LINES);

        $scrapped = [];
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $scrapped[$key] = $value;
        }

        $dns = null;
        $username = null;
        $password = null;
        foreach ($scrapped as $key => $value) {
            if ($key === 'DATABASE_DNS') {
                $dns = $value;
            }
            if ($key === 'DATABASE_USER') {
                $username = $value;
            }
            if ($key === 'DATABASE_PASSWORD') {
                $password = $value;
            }
        }
        if ($dns && $username && $password !== null) {
            $this->credentials = ['dns' => $dns, '$username' => $username, 'password' => $password];
        } else {
            throw new Exception(".ENV not complet");
        }
        return $this;
    }
}