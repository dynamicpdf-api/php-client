<?php
include_once('Element.php');
include_once('ElementPlacement.php');


    /**
    *
    * Base class from which barcode page elements are derived.
    *
    */
    abstract class BarcodeElement extends Element
    {      
        //public BarcodeElement() { }
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)  
        {
            parent::__construct($value,  $placement,  $xOffset,  $yOffset);
            $this->Value=$value;
        }


        /**
        *
        * Gets or sets the Color of the barcode.
        *
        */
        public   $Color = null;


        /**
        *
        * Gets or sets the XDimension of the barcode.
        *
        */
        public   $XDimension; 


        /**
        *
        * Gets or sets the value of the barcode.
        *
        */
        public   $Value;
    }
?>

