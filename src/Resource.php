<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/ResourceType.php';
include_once __DIR__ . '/EndPointException.php';

abstract class Resource
{

    public function __construct($file = null, ?string $resourceName = null)
    {
        if ($file != null) {
            if (gettype($file) == "array") {
                $this->_Data = implode(array_map("chr", $file));
            } else if (gettype($file) == "string") {
                if (file_exists($file)) {
                    $this->_FilePath = $file;
                    $this->_Data = Resource::_GetFileData($file);
                } else {
                    throw new EndpointException($file . " : File does not exist.");
                }
            } else {
                $this->_Data = stream_get_contents($file, -1);
            }

            if ($resourceName == null) {
                $this->ResourceName = md5(uniqid(rand(), true)) . $this->_FileExtension();
            }
            // bin2hex(decbin(rand(0,65536))).$this->FileExtension();
            else {
                $this->ResourceName = $resourceName;
            }

            $this->_MimeType = "";
        }
    }

    /**
     * Sets the resource.
     *
     * @param string $name 
     * @param mixed $value
     */
    public function __set(string $name, $value): void
    {
        switch ($name) {
            case "Data":
                $this->_Data = $value;
                break;
            case "FilePath":
                $this->_FilePath = $value;
                break;
        }
    }

    /**
     * Gets the resource.
     *
     * @param string $name
     */
    public function __get(string $name)
    {
        switch ($name) {
            case "Data":
                return $this->_Data;
            case "FilePath":
                return $this->_FilePath;
        }
    }

    public $_Data;

    /**
     *
     * Gets or sets the resource name.
     *
     */
    public $ResourceName;
    public $_Name;
    public $_Type;
    public $_MimeType = "";

    public $_FilePath;

    public static function _GetUTF8FileData(string $filePath)
    {
        $data = Resource::_GetFileData($filePath);
        return mb_convert_encoding($data, "UTF-8");
    }

    abstract public function _FileExtension();

    public static function _GetFileData(string $filePath)
    {
        $length = filesize($filePath);
        $file = fopen($filePath, "r");
        $data = fread($file, $length);
        fclose($file);
        return $data;
    }
}
