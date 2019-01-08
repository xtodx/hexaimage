<?php

    namespace xtodx\HexaImage;


    class HexaImage
    {
        /**
         * @param string $url image url
         * @param string $path image path
         * @return string
         * @throws \Exception
         */
        static function getImage($url, $path)
        {
            if (is_dir($path)) {
                $extensions = ["jpg", "png", "gif"];
                $image = array_pop(explode("/", $url));
                $extension = array_pop(explode(".", $image));
                if (in_array($extension, $extensions)) {
                    $imageData = file_get_contents($url);
                    if ($imageData) {
                        file_put_contents($path . $image, $imageData);
                        return $path . $image;
                    } else {
                        throw  new \Exception("HexaImage: Url {$url} does not exist");
                    }
                } else {
                    throw  new \Exception("HexaImage: File {$image} is not image");
                }
            } else {
                throw  new \Exception("HexaImage: Folder {$path} is not exist");
            }
        }


    }