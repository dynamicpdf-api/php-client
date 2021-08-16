<?php

include_once('BarcodeElement.php');

    abstract class TextBarcodeElement extends BarcodeElement
    {
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }
        
        public  $TextColor  = null;
        
        public $FontName;
        public  $FontSize; 
        public  $ShowText = "null";
        public $Resource;
        public  function Font(Font $value)
         {
            $this->TextFont = $value;
            $this->FontName = $this->TextFont->Name;
            $this->Resource = $this->TextFont->Resource;
         }
        public function GetFont()
        {
            return  $this->font;
        }
        

      
    }
?>
