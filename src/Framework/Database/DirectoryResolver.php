<?php

namespace App\Framework\Database;

/**
 * Generic functions about Directories
 * private function who are specifies
 */
class DirectoryResolver
{
    /**
     * @param string $dirPath
     * @param array $extensions
     * @return array
     */
    public static function getAllFilesInSubdirectories(string $dirPath, array $extensions = []): array
    {
        $resultFiles = [];
        $elements = scandir($dirPath);
        foreach ($elements as $element) {
            if (strpos($element, '.') === 0) {
                continue;
            }

            if (!empty($extensions)) {
                $result = self::withExtension($element, $dirPath, $extensions);
                if (!empty($result))
                    $resultFiles[] = $dirPath . DIRECTORY_SEPARATOR . $result;

            } else {
                $resultFiles[] = self::withoutExtension($element, $dirPath);
            }

            if (is_dir($dirPath . DIRECTORY_SEPARATOR . $element)) {
                $resultFiles = array_merge(
                    $resultFiles,
                    self::getAllFilesInSubdirectories($dirPath . DIRECTORY_SEPARATOR . $element, $extensions)
                );
            }
        }
        return $resultFiles;
    }

    /**
     * Use reflexion ?
     * @param array $listing
     * @return array
     */
    public static function getClassNameAndNamespace(array $listing): array
    {
        $ClassNameAndNamespace = [];
        foreach ($listing as $fileName) {
            $FileLgn = file($fileName, FILE_SKIP_EMPTY_LINES);
            $searchStr = 'namespace ';

            $nameSpace = null;
            foreach ($FileLgn as $line) {

                if (strpos($line, $searchStr) === 0) {
                    $nameSpace = trim((substr($line, strlen($searchStr))));
                    $string = substr($fileName, strripos($fileName, '\\') + 1);
                    $total = strlen($string);
                    $position = strpos($string, '.');
                    $sansextension = strlen(substr(substr($fileName,
                        strripos($fileName, '\\') + 1), 0, -$position));

                    $className = substr(substr($fileName, strripos($fileName,
                            '\\') + 1), 0, -$sansextension);

                    $ClassNameAndNamespace[$className] = substr($nameSpace, 0, -1);
                    break;
                }
            }
        }
        return $ClassNameAndNamespace;
    }

    private static function endsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);
        if (!$length) {
            return true;
        }
        return substr($haystack, -$length) === $needle;
    }

    private static function withExtension(string $element, string $dirPath, array $extensions)
    {
        $returnFiles = [];
        foreach ($extensions as $extension) {
            if (is_file($dirPath . DIRECTORY_SEPARATOR . $element) &&
                self::endsWith($element, $extension)) {
                $returnFiles = $element;
                break;
            }
        }
        return $returnFiles;
    }

    private static function withoutExtension(string $element, string $dirPath)
    {
        $returnFiles = [];
        if (is_file($dirPath . DIRECTORY_SEPARATOR . $element)) {
            $returnFiles = $element;
        }
        return $returnFiles;
    }
}