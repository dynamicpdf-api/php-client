<?php

include_once('BarcodeElement.php');
include_once('ElementPlacement.php');
include_once('ValueType.php');


    /**
    *
    * The base class for 2 dimensional barcodes (Aztec, Pdf417, DataMatrixBarcode and QrCode).
    *
    */
    abstract class Dim2BarcodeElement extends BarcodeElement
    {       
        public function __construct( $value, string $placement, float $xOffset, float $yOffset)
        { 
            if(gettype($value)== "string")
            {
              parent::__construct($value, $placement, $xOffset, $yOffset);
            }
            else
            {
                $this->Base64String = true;
                $this->Value  = base64_encode(implode(array_map("chr", $value)));
                $this->Placement = $placement;
                $this->XOffset = $xOffset;
                $this->YOffset = $yOffset;
            }
        }

       /* public Dim2BarcodeElement(byte[] value, ElementPlacement placement, float xOffset, float yOffset) 
        {
          
        }*/
     
       
        public  $ValueType = ValueType::String;

       
    }
?>

