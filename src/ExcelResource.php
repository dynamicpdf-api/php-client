<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/Resource.php';
include_once __DIR__ . '/ResourceType.php';
include_once __DIR__ . '/EndPointException.php';

/**
 *
 *  Represents an Excel resource used to create an ExcelInput object to create PDF from html file.
 *
 */
class ExcelResource extends Resource
{
    /**
     *
     *  Initializes a new instance of the HtmlResource class.
     *
     * @param  string|array|stream $file The excel file path or the byte array of the excel file or the stream of the excel file.
     */
    public function __construct($file, string $resourceName = null)
    {
        parent::__construct($file, $resourceName);
        if ($this->isNullOrWhiteSpace($resourceName) == false) {
            $this->_SetMimeType();
        } else if ($resourceName != null) {
            throw new EndpointException("Unsupported file type or invalid file extension.");
        }
        $this->_Type = ResourceType::Excel;
    }

    public $_Type = ResourceType::Excel;

    public $_MimeType;

    public function _FileExtension()
    {
        $fileHeader = substr($this->_Data, 0, 16);
        $byteArray = array();
        for ($i = 0; $i < strlen($fileHeader); $i++) {
            $byteArray[$i] = ord($fileHeader[$i]);
        }

        $inputFileExtension = "";
        if ($this->isNullOrWhiteSpace($this->ResourceName) == false) {
            if ($this->hasExtension(trim($this->ResourceName)) == true)
                $inputFileExtension = strtolower(pathinfo($this->ResourceName, PATHINFO_EXTENSION));
            else
                throw new EndpointException("Invalid resource name.");
        } else if ($this->isNullOrWhiteSpace($this->FilePath) == false) {
            if ($this->hasExtension(trim($this->FilePath)) == true)
                $inputFileExtension = strtolower(pathinfo($this->FilePath, PATHINFO_EXTENSION));
            else
                throw new EndpointException("Invalid file path specified.");
        } else
            throw new EndpointException("Invalid file path or resource name.");

        if ($inputFileExtension == "xls") {
            $_MimeType = "application/vnd.ms-excel";
            return ".xls";
        } else if ($inputFileExtension == "xlsx" && $byteArray[0] == 0x50 && $byteArray[1] == 0x4b) {
            $_MimeType = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            return ".xlsx";
        } else {
            throw new EndpointException("Unsupported file type or invalid file extension.");
        }
    }
    private function _SetMimeType()
    {
        $temb = $this->_FileExtension();
    }

    function isNullOrWhiteSpace($str)
    {
        return ($str === null || trim($str) === '');
    }

    function hasExtension($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        return !empty($extension);
    }

    public function GetJsonSerializeString()
    {
        $inputjson = array();
        $inputjson['type'] = "html";

        $inputjson['resourceName'] = $this->ResourceName;
        return $inputjson;
    }
}