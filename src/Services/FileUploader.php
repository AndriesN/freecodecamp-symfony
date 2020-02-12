<?php

namespace App\Services;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function uploadFile(UploadedFile $file){
        $filename = md5(uniqid()) . '.' . $file->guessClientExtension();

        //move and save the file on the hdd
        $file->move(
            $this->container->getParameter('uploads_dir'),
            $filename
        );

        return $filename;

    }

}