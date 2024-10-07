<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/Resource.php';
include_once __DIR__ . '/ResourceType.php';
include_once __DIR__ . '/EndPointException.php';

/**
 *
 *  Represents an image resource used to create an ImageInput object to create PDF from images.
 *
 */
class ImageResource extends Resource
{

    /**
     *
     *  Initializes a new instance of the ImageResource class.
     *
     * @param  string|array|stream $file The image file path or the byte array of the image file or the stream of the image file.
     * @param  string $resourceName The name of the resource.
     */
    public function __construct($file, string $resourceName = null)
    {
        parent::__construct($file, $resourceName);
        $this->Type = ResourceType::Image;
    }

    public $_Type = ResourceType::Image;

    public $_MimeType;

    public function _FileExtension()
    {
        $fileHeader = substr($this->_Data, 0, 16);
        $byteArray = array();
        for ($i = 0; $i < strlen($fileHeader); $i++) {
            $byteArray[$i] = ord($fileHeader[$i]);
        }

        if (ImageResource::IsPngImage($byteArray)) {
            $this->_MimeType = "image/png";
            return ".png";
        } else if (ImageResource::IsJpegImage($byteArray)) {
            $this->_MimeType = "image/jpeg";
            return ".jpeg";
        } else if (ImageResource::IsGifImage($byteArray)) {
            $this->_MimeType = "image/gif";
            return ".gif";
        } else if (ImageResource::IsTiffImage($byteArray)) {
            $this->_MimeType = "image/tiff";
            return ".tiff";
        } else if (ImageResource::IsJpeg2000Image($byteArray)) {
            $this->_MimeType = "image/jpeg";
            return ".jpeg";
        } else if (ImageResource::IsValidBitmapImage($byteArray)) {
            $this->_MimeType = "image/bmp";
            return ".bmp";
        } else {
            
            throw new EndPointException("Not supported image type or invalid image.");
        }
    }

    static function IsJpeg2000Image(array $header)
    {
        return ($header[0] == 0x00 && $header[1] == 0x00 && $header[2] == 0x00 && $header[3] == 0x0C && $header[4] == 0x6A &&
            $header[5] == 0x50 && ($header[6] == 0x1A || $header[6] == 0x20) && ($header[7] == 0x1A || $header[7] == 0x20) &&
            $header[8] == 0x0D && $header[9] == 0x0A && $header[10] == 0x87 && $header[11] == 0x0A) ||
            ($header[0] == 0xFF && $header[1] == 0x4F && $header[2] == 0xFF && $header[3] == 0x51 && $header[6] == 0x00 && $header[7] == 0x00);
    }

    static function IsPngImage(array $header)
    {
        return $header[0] == 0x89 && $header[1] == 0x50 && $header[2] == 0x4E && $header[3] == 0x47 &&
            $header[4] == 0x0D && $header[5] == 0x0A && $header[6] == 0x1A && $header[7] == 0x0A;
    }
    static function IsTiffImage(array $header)
    {
        return ($header[0] == 0x49 && $header[1] == 0x49 && $header[2] == 0x2A && $header[3] == 0x00) ||
            ($header[0] == 0x4D && $header[1] == 0x4D && $header[2] == 0x00 && $header[3] == 0x2A);
    }
    static function IsGifImage(array $header)
    {
        return $header[0] == 0x47 && $header[1] == 0x49 && $header[2] == 0x46 && $header[3] == 0x38 && ($header[4] == 0x37 ||
            $header[4] == 0x39) && $header[5] == 0x61;
    }
    static function IsJpegImage(array $header)
    {
        return $header[0] == 0xFF && $header[1] == 0xD8 && $header[2] == 0xFF;
    }
    static function IsValidBitmapImage(array $header)
    {
        return $header[0] == 0x42 && $header[1] == 0x4D;
    }
    public function GetJsonSerializeString()
    {

        $inputjson = array();
        $inputjson['type'] = "image";
        $inputjson['align'] = 1;
        $inputjson['vAlign'] = 1;

        $inputjson['resourceName'] = $this->ResourceName;
        return $inputjson;

        
    }
}
