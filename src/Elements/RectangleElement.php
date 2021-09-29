<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './Element.php';
include_once __DIR__ . './ElementPlacement.php';
include_once __DIR__ . './ElementType.php';

/**
 *
 * Represents a rectangle page element.
 *
 * This class can be used to place rectangles of any size or color on a page.
 *
 */
class RectangleElement extends Element
{

    /**
     *
     *  Initializes a new instance of the RectangleElement class.
     *
     * @param  string $placement The placement of the rectangle on the page.
     * @param  float $width Width of the rectangle.
     * @param  float $height Height of the rectangle.
     */
    public function __construct(string $placement, float $width, float $height)
    {
        $this->Placement = $placement;
        $this->Width = $width;
        $this->Height = $height;
    }

    public $Type = ElementType::Rectangle;

    /**
     *
     * Gets or sets the width of the rectangle.
     *
     */
    public $Width = 0;

    /**
     *
     * Gets or sets the height of the rectangle.
     *
     */
    public $Height = 0;

    /**
     *
     * Gets or sets the border width of the rectangle.
     *
     * To force the borders not to appear set the border width to any value 0 or less.
     *
     */
    public $BorderWidth = 0;

    /**
     *
     * Gets or sets the corner radius of the rectangle.
     *
     */
    public $CornerRadius = 0;

    /**
     *
     *  Gets or sets the LineStyle object used to specify the border style of the rectangle.
     *
     */
    public $BorderStyle;

    /**
     *
     *  Gets or sets the Color object to use for the border of the rectangle.
     *
     */
    public $BorderColor;

    /**
     *
     *  Gets or sets the Color object to use for the fill of the rectangle.
     *
     * To force no color to appear in the rectangle (only borders) set the fill color to null (Nothing in Visual
     * Basic).
     *
     */
    public $FillColor;
    public function GetJsonSerializeString()
    {
        //"width":100.0,"height":50.0,"cornerRadius":0.0,"placement":"topCenter","xOffset":0.0,"yOffset":0.0
        $jsonArray = array();
        $jsonArray["type"] = "rectangle";

        if ($this->Width != null) {
            $jsonArray["width"] = $this->Width;
        }

        if ($this->Height != null) {
            $jsonArray["height"] = $this->Height;
        }

        if ($this->BorderWidth != null) {
            $jsonArray["borderWidth"] = $this->BorderWidth;
        }

        if ($this->CornerRadius != null) {
            $jsonArray["cornerRadius"] = $this->CornerRadius;
        }

        if (($this->FillColor != null) && ($this->FillColor->ColorString != null)) {
            $jsonArray["fillColor"] = $this->FillColor->ColorString;
        }

        if (($this->BorderStyle != null) && ($this->BorderStyle->LineStyleString != null)) {
            $jsonArray["borderStyle"] = $this->BorderStyle->LineStyleString;
        }

        if (($this->BorderColor != null) && ($this->BorderColor->ColorString != null)) {
            $jsonArray["borderColor"] = $this->BorderColor->ColorString;
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
