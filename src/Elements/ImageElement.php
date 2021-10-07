<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './Element.php';
include_once __DIR__ . './ElementType.php';

/**
 *
 * Represents an image element.
 *
 * This class can be used to place images on a page.
 *
 */
class ImageElement extends Element
{

    /**
     *
     *  Initializes a new instance of the ImageElement class.
     *
     * @param  ImageResource|string $resource ImageResource object containing the image resource or the name of the image resource.
     * @param  ?string $placement The placement of the image on the page.
     * @param  float $xOffset X coordinate of the image.
     * @param  float $yOffset Y coordinate of the image.
     */
    public function __construct($resource, ?string $placement, float $xOffset = 0, float $yOffset = 0)
    {
        if (gettype($resource) == "object") {
            //parent::__construct() ;
            $this->_Resource = $resource;
            $this->_ResourceName = $resource->ResourceName;

        } else {
            $this->_ResourceName = $resource;
        }
        $this->Placement = $placement;
        $this->XOffset = $xOffset;
        $this->YOffset = $yOffset;
    }

    /**
     *
     *  Initializes a new instance of the ImageElement class.
     *
     * @param  string $resourceName The name of the image resource.
     * @param  string $placement The placement of the image on the page.
     * @param  float $xOffset X coordinate of the image.
     * @param  float $yOffset Y coordinate of the image.
     *
     * @return ImageElement returns ImageElement object.
     */
    public static function CreateImageElement(string $resourceName, string $placement, float $xOffset = 0, float $yOffset = 0)
    {
        $imageElement = new ImageElement(null, null);
        $imageElement->_ResourceName = $resourceName;
        $imageElement->Placement = $placement;
        $imageElement->XOffset = $xOffset;
        $imageElement->YOffset = $yOffset;
        return $imageElement;
    }

    public $_Type = ElementType::Image;
    public $_Resource;

    public $_ResourceName;

    /**
     *
     * Gets or sets the horizontal scale of the image.
     *
     */
    public $ScaleX;

    /**
     *
     * Gets or sets the vertical scale of the image.
     *
     */
    public $ScaleY;

    /**
     *
     * Gets or sets the maximum height of the image.
     *
     */
    public $MaxHeight;

    /**
     *
     * Gets or sets the maximum width of the image.
     *
     */
    public $MaxWidth;

    //{"type":"image","resourceName":"d37ca3c8-96dc-4772-abf3-d6417be534f1.gif","placement":"topCenter","xOffset":0.0,"yOffset":0.0}]}

    public function GetJsonSerializeString()
    {
        $jsonArray = array();
        $jsonArray["type"] = "image";

        if ($this->_ResourceName != null) {
            $jsonArray['resourceName'] = $this->_ResourceName;
        }

        if ($this->ScaleX != null) {
            $jsonArray['scaleX'] = $this->ScaleX;
        }

        if ($this->ScaleY != null) {
            $jsonArray['scaleY'] = $this->ScaleY;
        }

        if ($this->MaxHeight != null) {
            $jsonArray['maxHeight'] = $this->MaxHeight;
        }

        if ($this->MaxWidth != null) {
            $jsonArray['maxWidth'] = $this->MaxWidth;
        }

        // ---------------------------------

        if ($this->Placement != null) {
            $jsonArray['placement'] = $this->Placement;
        }

        if ($this->XOffset != null) {
            $jsonArray['xOffset'] = $this->XOffset;
        }

        if ($this->YOffset != null) {
            $jsonArray['yOffset'] = $this->YOffset;
        }

        if ($this->EvenPages != null) {
            $jsonArray['evenPages'] = $this->EvenPages;
        }

        if ($this->OddPages != null) {
            $jsonArray['oddPages'] = $this->OddPages;
        }

        return $jsonArray;
    }
}
