<?php

namespace App\Framework\Form;

use Exception;

class FieldResolver
{
    public static function AttributesToString(array $attributes): string
    {
        $att = [];
        foreach ($attributes as $key => $value) {
            $att[] = sprintf('%s="%s"', $key, $value);
        }
        return implode(' ', $att);
    }

    public static function ValuesToClean(array $data): array
    {
        $dataClean = [];
        foreach ($data as $index => $value) {
            $dataClean[$index] = htmlspecialchars($value);
        }
        return $dataClean;
    }

    /**
     * @throws Exception
     */
    public static function imageProcessing(
        int   $maxSize = 1200,
        array $fileType = ['JPG', 'jpg', 'jpeg', 'gif', 'png']
    ): string
    {
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name']; //w extension
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        $fileName = explode('.', $name);
        $uniqName = uniqid($fileName[0]); //+ extension

        $file = null;
//        if(filesize($tmpName) >= $maxSize){
//            //addFlash
//            header('location: /create-post');
//        }
        if (in_array($fileName[1], $fileType)) {
            $file = strtolower($uniqName . "." . $fileName[1]);
        }

        //image rogne
        //thumbail version

        move_uploaded_file($tmpName, UPLOAD_IMAGE . $file);
        return $file;
    }
}


