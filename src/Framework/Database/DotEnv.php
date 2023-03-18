<?php
namespace App\Framework\Database;

use Exception;

class DotEnv
{
    protected string $path;
    protected array $credentials = [];

    /**
     * @throws Exception
     */
    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new Exception();
        }
        $this->path = $path;
        $this->load();
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }

    /**
     * @throws Exception
     */
    public function load(): void
    {
        if (!is_readable($this->path)) {
            throw new \LogicException('');
        }

        $scrapped = [];
        $lines = file($this->path, FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $scrapped[$key] = $value;
        }

        foreach ($scrapped as $key => $value) {
            if ($key === 'DATABASE_DNS') {
                $this->credentials[$key] = $value;
            }
            if ($key === 'DATABASE_USERNAME') {
                $this->credentials[$key] = $value;
            }
            if ($key === 'DATABASE_PASSWORD') {
                $this->credentials[$key] = $value;
            }
        }
    }
}
