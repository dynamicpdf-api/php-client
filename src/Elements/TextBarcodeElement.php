<?php

include_once(__DIR__.'./BarcodeElement.php');


    /**
    *
    * Base class from which barcode page elements that display text are derived.
    *
    */
    abstract class TextBarcodeElement extends BarcodeElement
    {
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }
        

        /**
        *
        * Gets or sets the color of the text.
        *
        */
        public  $TextColor  = null;
        


        /**
        *
        * Gets or sets the font size to use when displaying the text.
        *
        */
        public  $FontSize; 


        /**
        *
        * Gets or sets a value indicating if the value should be placed as text below the barcode.
        *
        */
        public $ShowText = "null";
        public $Resource;
        public $TextFont;
        public $FontName;

        /**
        *
        * Gets or sets the font to use when displaying the text.
        *
        */
        public  function Font(Font $value)
         {
            $this->TextFont = $value;
            $this->FontName = $this->TextFont->Name;
            $this->Resource = $this->TextFont->Resource;
         }
        public function GetFont()
        {
            return  $this->TextFont;
        }
        

      
    }
?>

