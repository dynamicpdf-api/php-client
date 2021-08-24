<?php
include_once('Element.php');
include_once('ElementPlacement.php');

    /// <summary>
    /// Base class from which barcode page elements are derived.
    /// </summary>
    abstract class BarcodeElement extends Element
    {      
        //public BarcodeElement() { }
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)  
        {
            parent::__construct($value,  $placement,  $xOffset,  $yOffset);
            $this->Value=$value;
        }

        /// <summary>
        /// Gets or sets the Color of the barcode.
        /// </summary>
        public   $Color = null;

        /// <summary>
        /// Gets or sets the XDimension of the barcode.
        /// </summary>
        public   $XDimension; 

        /// <summary>
        /// Gets or sets the value of the barcode.
        /// </summary>
        public   $Value;
    }
?>
