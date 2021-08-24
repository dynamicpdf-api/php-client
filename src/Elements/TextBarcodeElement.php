<?php

include_once('BarcodeElement.php');

    /// <summary>
    /// Base class from which barcode page elements that display text are derived.
    /// </summary>
    abstract class TextBarcodeElement extends BarcodeElement
    {
        public function __construct(string $value, string $placement, float $xOffset, float $yOffset)
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }
        
        /// <summary>
        /// Gets or sets the color of the text.
        /// </summary>
        public  $TextColor  = null;
        
        public $FontName;

        /// <summary>
        /// Gets or sets the font size to use when displaying the text.
        /// </summary>
        public  $FontSize; 

        /// <summary>
        /// Gets or sets a value indicating if the value should be placed as text below the barcode.
        /// </summary>
        public  $ShowText = "null";
        public $Resource;

        /// <summary>
        /// Gets or sets the font to use when displaying the text.
        /// </summary>
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
