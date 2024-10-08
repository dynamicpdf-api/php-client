<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . '/Element.php';
include_once __DIR__ . '/ElementType.php';
include_once __DIR__ . '/AztecSymbolSize.php';
include_once __DIR__ . '/BarcodeElement.php';
include_once __DIR__ . '/Dim2BarcodeElement.php';

/**
 *
 * Represents an Aztec barcode element.
 *
 * With some of the .Net runtime (example: .Net Core 2.0) the ECI values 20, 28, 29 and 30 will give the
 * error "No data is available for encoding 'code page number'. For information on defining a custom encoding,
 * see the documentation for the Encoding.RegisterProvider method.".
 *
 */
class AztecBarcodeElement extends Dim2BarcodeElement
{

    /**
     *
     *  Initializes a new instance of the AztecBarcodeElement class.
     *
     * @param  string|array $value The value of the barcode either as string or byte array.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     */
    public function __construct($value, string $placement = ElementPlacement::TopLeft, float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
    }

    public $Type = ElementType::AztecBarcode;

    /**
     *
     * Gets or Sets a boolean indicating whether to process tilde symbol in the input.
     *
     * Setting true will check for ~ character and processes it for FNC1 or ECI characters. With some of the
     * .Net runtime (example: .Net Core 2.0), the ECI values 20, 28, 29 and 30 will give the error "No data
     * is available for encoding 'code page number'. For information on defining a custom encoding, see the
     * documentation for the Encoding.RegisterProvider method.".
     *
     */
    public ?bool $ProcessTilde = null;

    /**
     *
     *  Gets or Sets the barcode size, AztecSymbolSize.
     *
     */
    public $SymbolSize = AztecSymbolSize::Auto;

    /**
     *
     * Gets or Sets the error correction value.
     *
     * Error correction value may be between 5% to 95%.
     *
     */
    public $AztecErrorCorrection = 0;

    /**
     *
     * Gets or Sets a boolean representing if the barcode is a reader initialization symbol.
     *
     * Setting true will mark the symbol as reader initialization symbol and the size of the symbol should be
     * one of the following, R15xC15 Compact, R19xC19, R23xC23, R27xC27, R31xC31, R37xC37, R41xC41, R45xC45,
     * R49xC49, R53xC53, R57xC57, R61xC61, R67xC67, R71xC71, R75xC75, R79xC79, R83xC83, R87xC87, R91xC91, R95xC95,
     * R101xC101, R105xC105, R109xC109, however it is recommended to set Auto.
     *
     */
    public ?bool $ReaderInitializationSymbol = null;

    public function GetJsonSerializeString()
    {

        $jsonArray = array();

        $jsonArray["type"] = "aztecBarcode";

        if($this->ProcessTilde !== null)
            $jsonArray['processTilde'] = $this->ProcessTilde;

        if ($this->SymbolSize != null) {
            $jsonArray['symbolSize'] = $this->SymbolSize;
        }

        if ($this->AztecErrorCorrection != null) {
            $jsonArray['aztecErrorCorrection'] = $this->AztecErrorCorrection;
        }

        if($this->ReaderInitializationSymbol !== null)
            $jsonArray['readerInitializationSymbol'] = $this->ReaderInitializationSymbol;

        //--------------Dim2BarcodeElement------------------------------

        if ($this->_ValueType != null) {
            $jsonArray['valueType'] = $this->_ValueType;
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
