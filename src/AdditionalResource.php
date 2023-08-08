<?php
namespace DynamicPDF\Api;

class AdditionalResource extends Resource
{
    public function __construct($resource, string $resourceName)
    {
        parent::__construct($resource, $resourceName);
        $this->_Type = $this->GetResourceType($resource);
    }

    private function GetResourceType(string $resourcePath)
    {
        $type = ResourceType::Pdf;
        $fileExtension = pathinfo($resourcePath, PATHINFO_EXTENSION);
        switch ($fileExtension) {
            case ".pdf":
                $type = ResourceType::Pdf;
                break;
            case ".dlex":
                $type = ResourceType::Dlex;
                break;
            case ".json":
                $type = ResourceType::LayoutData;
                break;
            case ".ttf":
            case ".otf":
                $type = ResourceType::Font;
                break;
            case ".tiff":
            case ".tif":
            case ".png":
            case ".gif":
            case ".jpeg":
            case ".jpg":
            case ".bmp":
                $type = ResourceType::Image;
                break;
            case ".html":
                $type = ResourceType::Html;
                break;
        }
        return $type;
    }

    public $_Type = ResourceType::LayoutData;

    private function _FileExtension()
    {
        $fileHeader = substr($this->Data, 0, 16);
        $byteArray = array();
        for ($i = 0; $i < strlen($fileHeader); $i++) {
            $byteArray[$i] = ord($fileHeader[$i]);
        }
        switch ($this->_Type) {
            case ResourceType::Image:

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
                } else
                    throw new EndpointException("Not supported image type or invalid image.");
            case ResourceType::Pdf:
                $this->_MimeType = "application/pdf";
                return ".pdf";
            case ResourceType::LayoutData:
                $this->_MimeType = "application/json";
                return ".json";
            case ResourceType::Dlex:
                $this->_MimeType = "application/xml";
                return ".dlex";
            case ResourceType::Font:
                if ($byteArray[0] == 0x4f && $byteArray[1] == 0x54 && $byteArray[2] == 0x54 && $byteArray[3] == 0x4f) {
                    $this->_MimeType = "font/otf";
                    return ".otf";
                } else if ($byteArray[0] == 0x00 && $byteArray[1] == 0x01 && $byteArray[2] == 0x00 && $byteArray[3] == 0x00) {
                    $this->_MimeType = "font/ttf";
                    return ".ttf";
                } else {
                    throw new EndpointException("Unsupported font");
                }
            case ResourceType::Html:
                $this->_MimeType = "text/html";
                return ".html";

        }
        return null;


    }

    private $_MimeType = "";
}