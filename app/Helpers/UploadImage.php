<?php

namespace App\Helpers;
class UploadImage
{
    protected $image;
    protected $filename;
    protected $size;
    protected $extension;
    protected $uploadPath;
    protected $max_size;
    protected $new_width;
    protected $new_height;
    protected $destination_image;
    protected $watermark;
    protected $orig_image;

    public function __construct($input, $watermark = null)
    {
        $this->image = $input;
        $this->size = getimagesize($this->image);
        $this->extension = $this->image->extension();
        $this->filename = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $this->extension;
        $this->uploadPath = storage_path('app/public/upload');
        $this->watermark = $watermark ?? resource_path('assets/image/logo-small.png');
        $this->createImageFromFile();
    }

    protected function createImageFromFile()
    {
        switch ($this->extension) {
            case 'jpeg':
                $this->orig_image = imagecreatefromjpeg($this->image);
                break;

            case 'jpg':
                $this->orig_image = imagecreatefromjpeg($this->image);
                break;

            case 'png':
                $this->orig_image = imagecreatefrompng($this->image);
                break;

            case 'gif':
                $this->orig_image = imagecreatefromgif($this->image);
                break;
        }
    }

    public function handleUploadAndResize($max_size)
    {
        $this->max_size = $max_size;
        $this->addWaterMark();
        $this->handleResize();
        $this->handleUpload();
        return $this->filename;
    }

    public function handleUpload()
    {
        $path = $this->uploadPath . '/' . $this->filename;
        imagepng($this->orig_image, $path);
        return $this->filename;
    }

    public function handleResize()
    {
        $this->createBlankImage($this->max_size);
        $this->saveResizedImage();
        return 'resized-' . $this->filename;
    }

    protected function saveResizedImage()
    {
        $path = $this->uploadPath . '/resized-' . $this->filename;
        $this->copyResampled($this->orig_image);
        imagepng($this->destination_image, $path);
    }

    protected function addWatermark()
    {
        $watermark = imagecreatefrompng($this->watermark);
        imagealphablending($watermark, false);
        imagesavealpha($watermark, true);

        $img_w = imagesx($this->orig_image);
        $img_h = imagesy($this->orig_image);

        $wtrmrk_w = $img_w / 4;
        $wtrmrk_h = $wtrmrk_w * imagesy($watermark) / imagesx($watermark);
        imagecopyresampled($watermark, $watermark, 0, 0, 0, 0, $wtrmrk_w, $wtrmrk_h, imagesx($watermark), imagesy($watermark));

        $dst_x = $img_w - $wtrmrk_w;
        $dst_y = 0;
        imagecopy($this->orig_image, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);

        imagedestroy($watermark);
    }

    protected function copyResampled($orig_image)
    {
        return imagecopyresampled($this->destination_image, $orig_image, 0, 0, 0, 0, $this->new_width, $this->new_height, $this->size[0], $this->size[1]);
    }

    protected function createBlankImage($max_size)
    {
        if ($this->isPortrait()) {
            $this->new_height = $max_size;
            $this->new_width = $this->new_height * $this->getRatio();
        } else {
            $this->new_width = $max_size;
            $this->new_height = $this->new_width / $this->getRatio();
        }
        $this->destination_image = imagecreatetruecolor($this->new_width, $this->new_height);
    }

    public function isPortrait()
    {
        if ($this->getRatio() <= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getRatio()
    {
        $width = $this->size[0];
        $height = $this->size[1];
        return $width / $height;
    }
}