<?php
namespace DynamicPDF\Api;

require_once __DIR__ . './Resource.php';
require_once __DIR__ . './ResourceType.php';

/**
 *
 * Represents a Dlex resource object that is created using the DLEX file and a name.
 *
 */
class DlexResource extends Resource
{

    /**
     *
     * Initializes a new instance of the DlexResource class with DLEX file path and resource name as parameters.
     *
     * @param  string|array|stream $dlex The dlex file path or the byte array of the dlex file or the stream of the dlex file.
     * @param  string $resourceName The name of the resource.
     */
    public function __construct($dlex, string $resourceName = null)
    {
        parent::__construct($dlex, $resourceName);
    }

    public $Type = ResourceType::Dlex;
    public function FileExtension()
    {
        return ".dlex";
    }

    public $MimeType = "application/xml";

    /**
     *
     * Gets or sets name for layout data resource.
     *
     */
    public $LayoutDataResourceName;

    public function GetjsonSerializeString()
    {
        $inputjson = array();
        $inputjson['type'] = 'dlex';

        $inputjson['layoutDataResourceName'] = $this->LayoutDataResourceName;
        $inputjson['resourceName'] = $this->ResourceName;
        return $inputjson;
    }
}
