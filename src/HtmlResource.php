<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/Resource.php';
include_once __DIR__ . '/ResourceType.php';
include_once __DIR__ . '/EndPointException.php';

/**
 *
 *  Represents an Html resource used to create an HtmlInput object to create PDF from html file.
 *
 */
class HtmlResource extends Resource
{
    /**
     *
     * Initializes a new instance of the HtmlResource class.
     *
     * @param  string $filePath The image file path or the byte array of the image file or the stream of the image file.
     * @param string $resourceName The name of the resource.
     */
    public function __construct($file, string $resourceName = null)
    {
        parent::__construct();
        $this->_Data = mb_convert_encoding($file, "UTF-8");
        
        if ($resourceName == null) {
            $this->ResourceName = md5(uniqid(rand(), true)) . $this->_FileExtension();
        } else {
            $this->ResourceName = $resourceName;
        }
        $this->_Type = ResourceType::Html;
        $this->_MimeType = "text/html";
    }

    public $_Type = ResourceType::Html;

    public $_MimeType;

    public function _FileExtension()
    {
        return ".html";
    }

    public function GetJsonSerializeString()
    {
        $inputjson = array();
        $inputjson['type'] = "html";

        $inputjson['resourceName'] = $this->ResourceName;
        return $inputjson;
    }
}