<?php
namespace DynamicPDF\Api;


include_once __DIR__ . './Resource.php';
include_once __DIR__ . './ResourceType.php';

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
     * @param  object|string $layout Serializable object data to create PDF report or the layout data JSON file path.
     * @param  string $layoutDataResourceName The name for layout data resource.
     */
    public function __construct($layout = null, string $layoutDataResourceName = null)
    {
        if (gettype($layout) == "object") {
            $this->Data = json_encode($layout);
        } else {
            $this->Data = Resource::GetFileData($layout);
        }
        if ($layoutDataResourceName == null) {
            $this->LayoutDataResourceName = md5(uniqid(rand(), true)) . ".json";
        } else {
            $this->LayoutDataResourceName = $layoutDataResourceName;
        }

        $this->MimeType = "application/json";
        $this->Type = ResourceType::LayoutData;
        $this->ResourceName = $this->LayoutDataResourceName;

    }

    public $Type = ResourceType::LayoutData;

    public function FileExtension()
    {
        return ".json";
    }

    public $FileExtension = ".json";

    public $MimeType = "application/json";

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
