<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . './BarcodeElement.php';
include_once __DIR__ . './ElementPlacement.php';
include_once __DIR__ . './ValueType.php';

/**
 *
 * The base class for 2 dimensional barcode (Aztec, Pdf417, DataMatrixBarcode and QrCode).
 *
 */
abstract class Dim2BarcodeElement extends BarcodeElement
{
    public function __construct($value, string $placement, float $xOffset, float $yOffset)
    {
        if (gettype($value) == "string") {
            parent::__construct($value, $placement, $xOffset, $yOffset);
        } else {
            $this->_ValueType = ValueType::Base64EncodedBytes;
            $this->Value = base64_encode(implode(array_map("chr", $value)));
            $this->Placement = $placement;
            $this->XOffset = $xOffset;
            $this->YOffset = $yOffset;
        }
    }

   

    public $_ValueType = ValueType::String;

}
