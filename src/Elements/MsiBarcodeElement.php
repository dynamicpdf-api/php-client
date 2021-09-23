<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './TextBarcodeElement.php';
include_once __DIR__ . './ElementType.php';

/**
 *
 * Represents a MSI Barcode element (also known as Modified Plessey).
 *
 */
class MsiBarcodeElement extends TextBarcodeElement
{

    /**
     *
     *  Initializes a new instance of the MsiBarcodeElement class.
     *
     * @param  string $value The value of the barcode.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $height The height of the barcode.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     */
    public function __construct(string $value, string $placement, float $height, float $xOffset = 0, float $yOffset = 0)
    {
        $this->Height = $height;
        parent::__construct($value, $placement, $xOffset, $yOffset);
    }

    public $Type = ElementType::MsiBarcode;

    /**
     *
     * Gets or sets a value specifying if the check digit should calculated.
     *
     */
    public $AppendCheckDigit;

    /**
     *
     * Gets or sets the height of the barcode.
     *
     */
    public $Height;
    public function GetjsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "msiBarcode";

        if ($this->AppendCheckDigit != null) {
            $jsonArray['appendCheckDigit'] = $this->AppendCheckDigit;
        }

        if ($this->Height != null) {
            $jsonArray['height'] = $this->Height;
        }

        //----------------TextBarcodeElement---------------------------------
        if ($this->FontName != null) {
            $jsonArray['font'] = $this->FontName;
        }

        if (($this->TextColor != null) && ($this->TextColor->ColorString != null)) {
            $jsonArray['textColor'] = $this->TextColor->ColorString;
        }

        if ($this->FontSize != null) {
            $jsonArray['fontSize'] = $this->FontSize;
        }

        if ($this->ShowText != "null") {
            $jsonArray['showText'] = $this->ShowText;
        }

        //----------------barcodeElement--------------------------------

        if (($this->Color != null) && ($this->Color->ColorString != null)) {
            $jsonArray['color'] = $this->Color->ColorString;
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

        //if($this->EvenPages != null)
        $jsonArray['evenPages'] = $this->EvenPages;

        //if($this->OddPages != null)
        $jsonArray['oddPages'] = $this->OddPages;

        return $jsonArray;
    }
}
