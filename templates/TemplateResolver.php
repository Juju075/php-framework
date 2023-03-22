<?php

class TemplateResolver
{
        public static function createChildTemplateContent(string $path, string $content): void
        {
            var_dump($content);
            if(!file_exists($path))
            {
                fopen($path,'w');
                file_put_contents($path, $content);
            }
        }
}