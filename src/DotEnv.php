<?php

namespace App;

use Exception;

class DotEnv
{
    protected string $path;

    /**
     * @throws Exception
     */
    public function __construct(string $path)
    {
        if(!file_exists($path)){
            throw new Exception();
        }
        $this->path = $path;
    }

    public function load():void
    {
        //Readable?
        if(!is_readable($this->path))
        {
            throw new \LogicException('');
        }

        $lines = file($this->path, FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            //# est un commentaire
            if(strpos(trim($line),'#') === 0){
                continue;
            }
            //cree un tableau de valeur
            list($key, $value) = explode('=',$line,2);
            $key = trim($key);
            $value= trim($value);

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
        }
    }
}