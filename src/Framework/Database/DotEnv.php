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

    /**
     * @throws Exception
     */
    public function load(): void
    {
        if (!is_readable($this->path)) {
            throw new \LogicException('');
        }

        $lines = file($this->path, FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            //TODO ENV
            //add new ENV in $-SERVER
            //!array_key_exists(putenv(sprintf('%s=%s', $name, $value));

//            if(
//                !array_key_exists($key,$_SERVER) &&
//                !array_key_exists();
//            {
//                $_ENV[$key] = $value;
//                $_SERVER[$key] = $value;
//            }

            $data = [];
            $dns = null;
            $username = null;
            $password = null;
            foreach ($data as $item => $value) {
                if ($item === 'DATABASE_DNS') {
                    $dns = $value;
                }
                if ($item === 'DATABASE_USER') {
                    $username = $value;
                }
                if ($item === 'DATABASE_PASSWORD') {
                    $password = $value;
                }
            }
            if ($dns && $username && $password !== null) {
                $this->credentials = ['dns' => $dns, '$username' => $username, 'password' => $password];
            } else {
                throw new Exception(".ENV not complet");
            }
        }
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }
}