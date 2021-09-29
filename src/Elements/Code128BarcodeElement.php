<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './Element.php';
include_once __DIR__ . './ElementType.php';
include_once __DIR__ . './TextBarcodeElement.php';

/**
 *
 * Represents a Code 128 barcode element.
 *
 * This class can be used to place a Code 128 barcode on a page.
 *
 */
class Code128BarcodeElement extends TextBarcodeElement
{

    /**
     *
     *  Initializes a new instance of the Code128BarcodeElement class.
     *
     * Code sets can be specified along with data, in order to do this ProcessTilde property needs to be set
     * to true. Example value: "~BHello ~AWORLD 1~C2345", where ~A, ~B and ~C representing code sets A, B and
     * C respectively. However if any inline code set has invalid characters it will be shifted to an appropriate
     * code set.
     *
     * @param  string $value The value of the barcode.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $height The height of the barcode.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     */
    public function __construct(string $value, string $placement, float $height, float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
        $this->Height = $height;
    }

    public $Type = ElementType::Code128Barcode;

    /**
     *
     * Gets or sets the height of the barcode.
     *
     */
    public $Height;

    /**
     *
     * Gets or sets a boolean representing if the barcode is a UCC / EAN Code 128 barcode.
     *
     * If true an FNC1 code will be the first character in the barcode.
     *
     */
    public $UccEan128 = false;

    /**
     *
     * Gets or Sets a boolean indicating whether to process the tilde character.
     *
     * If true checks for fnc1 (~1) character in the barcode Value and checks for the inline code sets if present
     * in the data to process. Example value: "~BHello ~AWORLD 1~C2345", where ~A, ~B and ~C representing code
     * sets A, B and C respectively. However if any inline code set has invalid characters it will be shifted
     * to an appropriate code set. "\" is used as an escape character to add ~.
     *
     */
    public $ProcessTilde = false;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "code128Barcode";

        if ($this->Height != null) {
            $jsonArray['height'] = $this->Height;
        }

        //if($this->UccEan128 != null)
        $jsonArray['uccEan128'] = $this->UccEan128;

        //if($this->ProcessTilde != null)
        $jsonArray['processTilde'] = $this->ProcessTilde;

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

        // if($this->OddPages != null)
        $jsonArray['oddPages'] = $this->OddPages;

        return $jsonArray;
    }
}
