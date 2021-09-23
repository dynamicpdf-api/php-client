<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './Dim2BarcodeElement.php';
include_once __DIR__ . './ElementPlacement.php';
include_once __DIR__ . './ElementType.php';

/**
 *
 * Represents a Data Matrix  barcode element.
 *
 * With some of the .Net runtimes (example: .Net Core 2.0), the ECI values 20, 28, 29 and 30 will give the
 * error "No data is available for encoding 'code page number'. For information on defining a custom encoding,
 * see the documentation for the Encoding.RegisterProvider method.".
 *
 */
class DataMatrixBarcodeElement extends Dim2BarcodeElement
{

    /**
     *
     *  Initializes a new instance of the DataMatrixBarcodeElement class.
     *
     * @param  string|array $value The value of the barcode either as string or as byte array.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     * @param  string $symbolSize The symbol size of the barcode.
     * @param  string $encodingType The encoding type of the barcode.
     * @param  string $functionCharacter The function character of the barcode.
     */
    public function __construct($value, string $placement, float $xOffset = 0, float $yOffset = 0, string $symbolSize = DataMatrixSymbolSize::Auto, string $encodingType = DataMatrixEncodingType::Auto, string $functionCharacter = DataMatrixFunctionCharacter::None)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
        $this->DataMatrixSymbolSize = $symbolSize;
        $this->DataMatrixEncodingType = $encodingType;
        $this->DataMatrixFunctionCharacter = $functionCharacter;
    }

    public $Type = ElementType::DataMatrixBarcode;

    /**
     *
     * Gets or sets whether to process tilde character.
     *
     * Setting true will check for ~ character and processes it for FNC1 or ECI characters. With some of the
     * .Net runtimes (example: .Net Core 2.0), the ECI values 20, 28, 29 and 30 will give the error "No data
     * is available for encoding 'code page number'. For information on defining a custom encoding, see the
     * documentation for the Encoding.RegisterProvider method.".
     *
     */
    public $ProcessTilde = false;
    public $DataMatrixSymbolSize;
    public $DataMatrixEncodingType;
    public $DataMatrixFunctionCharacter;

    public function GetjsonSerializeString()
    {

        $jsonArray = array();

        $jsonArray["type"] = "dataMatrixBarcode";

        //if($this->ProcessTilde != null)
        $jsonArray['processTilde'] = $this->ProcessTilde;

        if ($this->DataMatrixSymbolSize != null) {
            $jsonArray['dataMatrixSymbolSize'] = $this->DataMatrixSymbolSize;
        }

        if ($this->DataMatrixEncodingType != null) {
            $jsonArray['dataMatrixEncodingType'] = $this->DataMatrixEncodingType;
        }

        if ($this->DataMatrixFunctionCharacter != null) {
            $jsonArray['dataMatrixFunctionCharacter'] = $this->DataMatrixFunctionCharacter;
        }

        //--------------Dim2BarcodeElement------------------------------

        if ($this->ValueType != null) {
            $jsonArray['valueType'] = $this->ValueType;
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
