<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . '/TextBarcodeElement.php';
include_once __DIR__ . '/ElementPlacement.php';
include_once __DIR__ . '/ElementType.php';

/**
 *
 * Represents a Code 3 of 9 barcode element.
 *
 * This class can be used to place a Code 3 of 9 barcode on a page.
 *
 */
class Code39BarcodeElement extends TextBarcodeElement
{

    /**
     *
     *  Initializes a new instance of the Code39BarcodeElement class.
     *
     * @param  string $value The value of the barcode.
     * @param  float $height The height of the barcode.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     */
    public function __construct(string $value, float $height, string $placement = ElementPlacement::TopLeft, float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
        $this->Height = $height;
    }

    public $_Type = ElementType::Code39Barcode;

    /**
     *
     * Gets or sets the height of the barcode.
     *
     */
    public $Height;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "code39Barcode";

        if ($this->Height != null) {
            $jsonArray['height'] = $this->Height;
        }

        //----------------TextBarcodeElement---------------------------------
        if ($this->_FontName != null) {
            $jsonArray['font'] = $this->_FontName;
        }

        if (($this->TextColor != null) && ($this->TextColor->_ColorString != null)) {
            $jsonArray['textColor'] = $this->TextColor->_ColorString;
        }

        if ($this->FontSize != null) {
            $jsonArray['fontSize'] = $this->FontSize;
        }

        if ($this->ShowText !== null) {
            $jsonArray['showText'] = $this->ShowText;
        }

        //----------------barcodeElement--------------------------------

        if (($this->Color != null) && ($this->Color->_ColorString != null)) {
            $jsonArray['color'] = $this->Color->_ColorString;
        }

        if ($this->XDimension != null) {
            $jsonArray['xDimension'] = $this->XDimension;
        }

        if ($this->Value != null) {
            $jsonArray['value'] = $this->Value;
        }

        // ------------element---------------------

        if ($this->Placement != null) {
            $jsonArray['placement'] = ($this->Placement);
        }

        if ($this->XOffset != null) {
            $jsonArray['xOffset'] = $this->XOffset;
        }

        if ($this->YOffset != null) {
            $jsonArray['yOffset'] = $this->YOffset;
        }

        if($this->EvenPages !== null)
            $jsonArray['evenPages'] = $this->EvenPages;

        if($this->OddPages !== null)
            $jsonArray['oddPages'] = $this->OddPages;

        return $jsonArray;
    }
}
