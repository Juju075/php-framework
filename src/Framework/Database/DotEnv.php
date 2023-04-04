<?php
namespace App\Framework\Database;

use Exception;

class DotEnv
{
    protected string $path;

    /**
     * @throws Exception
     */
    public function load(string $path): array
    {
        if (!file_exists($path)) {
            throw new Exception();
        }

        if (!is_readable($path)) {
            throw new \LogicException('');
        }

        $scrapped = [];
        $lines = file($path, FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $scrapped[$key] = $value;
        }

        $credentials = [];
        foreach ($scrapped as $key => $value) {
            if ($key === 'DATABASE_DNS') {
                $credentials[$key] = $value;
            }
            if ($key === 'DATABASE_USER') {
                $credentials[$key] = $value;
            }
            if ($key === 'DATABASE_PASSWORD') {
                $credentials[$key] = $value;
            }
        }
        return $credentials;
    }
}
