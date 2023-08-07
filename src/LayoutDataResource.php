<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/Resource.php';
include_once __DIR__ . '/ResourceType.php';

/**
 *
 * Represents the Layout data resource used to create the PDF reports.
 *
 */
class LayoutDataResource extends Resource
{

    /**
     *
     * Initializes a new instance of the LayoutDataResource class using the layout data object and a resource
     * name.
     *
     * @param  array|string $layout Data to create PDF report as an array of JSON content or as a string of JSON file path.
     * @param  string $layoutDataResourceName The name for layout data resource.
     */
    public function __construct($layout = null, string $layoutDataResourceName = null)
    {
        if (gettype($layout) == "array") {
            $this->Data = implode($layout);
        } else if (gettype($layout) == "string") {
            if (pathinfo($layout, PATHINFO_EXTENSION) == "json") {
                $this->Data = Resource::_GetFileData($layout);
            } else {
                $this->Data = mb_convert_encoding($layout, 'UTF-8');
            }
        }

        if ($layoutDataResourceName == null) {
            $this->LayoutDataResourceName = md5(uniqid(rand(), true)) . ".json";
        } else {
            $this->LayoutDataResourceName = $layoutDataResourceName;
        }

        $this->_MimeType = "application/json";
        $this->_Type = ResourceType::LayoutData;
        $this->ResourceName = $this->LayoutDataResourceName;

    }

    public $_Type = ResourceType::LayoutData;

    public function _FileExtension()
    {
        return ".json";
    }



    public $_MimeType = "application/json";

    /**
     *
     * Gets or sets name of the layout data resource.
     *
     */
    public $LayoutDataResourceName;

    public function GetJsonSerializeString()
    {
        return null;
    }

}