<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . '/Element.php';
include_once __DIR__ . '/ElementPlacement.php';
include_once __DIR__ . '/ElementType.php';

/**
 *
 * Represents a line page element.
 *
 * This class can be used to place lines of different length, width, color and patterns on a page.
 *
 */
class LineElement extends Element
{

    /**
     *
     *  Initializes a new instance of the LineElement class.
     *
     * @param  float $x2Offset X2 coordinate of the line.
     * @param  float $y2Offset Y2 coordinate of the line.
     * @param  string $placement The placement of the line on the page.
     */
    public function __construct(float $x2Offset, float $y2Offset, string $placement = ElementPlacement::TopLeft)
    { 
        $this->Placement = $placement;
        $this->X2Offset = $x2Offset;
        $this->Y2Offset = $y2Offset;
    }

    public $_Type = ElementType::Line;

    /**
     *
     *  Gets or sets the Color object to use for the line.
     *
     */
    public $Color = null;

    /**
     *
     * Gets or sets the X2 coordinate of the line.
     *
     */
    public $X2Offset = 0;

    /**
     *
     * Gets or sets the Y2 coordinate of the line.
     *
     */
    public $Y2Offset = 0;

    /**
     *
     * Gets or sets the width of the line.
     *
     */
    public $Width = 0;

    /**
     *
     *  Gets or sets the LineStyle object to use for the style of the line.
     *
     */
    public $LineStyle;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();
        $jsonArray["type"] = "line";

        if (($this->Color != null) && ($this->Color->_ColorString != null)) {
            $jsonArray['color'] = $this->Color->_ColorString;
        }

        if ($this->X2Offset != null) {
            $jsonArray['x2Offset'] = $this->X2Offset;
        }

        if ($this->Y2Offset != null) {
            $jsonArray['y2Offset'] = $this->Y2Offset;
        }

        if ($this->Width != null) {
            $jsonArray['width'] = $this->Width;
        }

        if (($this->LineStyle != null) && ($this->LineStyle->_LineStyleString != null)) {
            $jsonArray['lineStyle'] = $this->LineStyle->_LineStyleString;
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

        if ($this->EvenPages !== null) {
            $jsonArray['evenPages'] = $this->EvenPages;
        }

        if ($this->OddPages !== null) {
            $jsonArray['oddPages'] = $this->OddPages;
        }

        return $jsonArray;

    }

}
