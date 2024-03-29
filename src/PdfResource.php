<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/Resource.php';
include_once __DIR__ . '/ResourceType.php';

/**
 *
 * Represents a pdf resource.
 *
 */
class PdfResource extends Resource
{

    /**
     *
     *  Initializes a new instance of the PdfResource class.
     *
     * @param  string|array|stream $file The pdf file path or the byte array of the pdf file or the stream of the pdf file.
     * @param  ?string $resourceName The name of the resource.
     */
    public function __construct($file, ?string $resourceName = null)
    {
        parent::__construct($file, $resourceName);
        $this->_MimeType = "application/pdf";
    }

    public $_Type = ResourceType::Pdf;

    public function _FileExtension()
    {
        return ".pdf";
    }
    // public  ?string $ResourcePath ;

    public function GetJsonSerializeString()
    {
        $inputjson = array();
        $inputjson['type'] = $this->Type;

        $inputjson['resourceName'] = $this->ResourceName;
        return $inputjson;
    }

}
