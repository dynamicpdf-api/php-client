<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './Dim2BarcodeElement.php';
include_once __DIR__ . './ElementType.php';

/**
 *
 * Represents a QR code barcode element.
 *
 * With some of the .Net runtimes (example: .Net Core 2.0), the Kanchi encoding will give the error "No
 * data is available for encoding 932. For information on defining a custom encoding, see the documentation
 * for the Encoding.RegisterProvider method.".
 *
 */
class QrCodeElement extends Dim2BarcodeElement
{

    /**
     *
     *  Initializes a new instance of the QrCodeElement class.
     *
     * @param  string|array $value The value of the QR code either as string or byte array.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $xOffset The X coordinate of the QR code.
     * @param  float $yOffset The Y coordinate of the QR code.
     */
    public function __construct($value, string $placement, float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
    }

    public $Type = ElementType::QrCode;

    /**
     *
     * Gets or sets FNC1 mode.
     *
     */
    public $Fnc1;

    /**
     *
     * Gets or sets the QR code version.
     *
     */
    public $Version;

    public function GetjsonSerializeString()
    {

        $jsonArray = array();

        $jsonArray["type"] = "qrCode";

        if ($this->Fnc1 != null) {
            $jsonArray['fnc1'] = $this->Fnc1;
        }

        if ($this->Version != null) {
            $jsonArray['version'] = $this->Version;
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
