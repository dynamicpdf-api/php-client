<?php

include_once('BarcodeElement.php');
include_once('ElementPlacement.php');

    abstract class Dim2BarcodeElement extends BarcodeElement
    {       
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)
        { 
              parent::__construct($value, $placement, $xOffset, $yOffset);
        }

       /* public Dim2BarcodeElement(byte[] value, ElementPlacement placement, float xOffset, float yOffset) 
        {
            Base64String = true;
            Value = Value = Convert.ToBase64String(value);
            Placement = placement;
            XOffset = xOffset;
            YOffset = yOffset;
        }*/
     
       
        public  $ValueType = ValueType::String;

       
    }
?>
