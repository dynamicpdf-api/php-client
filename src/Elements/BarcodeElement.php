<?php
include_once('Element.php');
include_once('ElementPlacement.php');
    abstract class BarcodeElement extends Element
    {      
        //public BarcodeElement() { }
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)  
        {
            parent::__construct($value,  $placement,  $xOffset,  $yOffset);
            $this->Value=$value;
        }
        public   $Color = null;
        public   $XDimension; 
        public   $Value;
    }
?>
