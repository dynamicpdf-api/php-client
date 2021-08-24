<?php
//
include_once('Element.php');
include_once('ElementType.php');
include_once('TextBarcodeElement.php');


   /// <summary>
    /// Represents a Code 128 barcode element.
    /// </summary>
    /// <remarks>This class can be used to place a Code 128 barcode on a page.</remarks>
    class Code128BarcodeElement extends TextBarcodeElement
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="Code128BarcodeElement"/> class.
        /// </summary>
        /// <param name="value">The value of the barcode.</param>
        /// <param name="placement">The placement of the barcode on the page.</param>
        /// <param name="height">The height of the barcode.</param>
        /// <param name="xOffset">The X coordinate of the barcode.</param>
        /// <param name="yOffset">The Y coordinate of the barcode.</param>        
        /// <remarks>Code sets can be specified along with data, in order to do this <see cref="ProcessTilde"/> property needs to be set to <b>true</b>.
        /// Example value: "~BHello ~AWORLD 1~C2345", where ~A, ~B and ~C representing code sets A, B and C respectively.
        /// However if any inline code set has invalid characters it will be shifted to an appropriate code set.</remarks>
        public function __construct(string $value, string $placement, float $height, float $xOffset = 0, float $yOffset = 0) 
        { 
            parent::__construct($value, $placement, $xOffset, $yOffset) ;
            $this->Height = $height;
        }

        public  $Type = ElementType::Code128Barcode;

          /// <summary>
        /// Gets or sets the height of the barcode.
        /// </summary>
        public  $Height;

        /// <summary>
        /// Gets or sets a boolean representing if the barcode is a UCC / EAN Code 128 barcode.
        /// </summary>
        /// <remarks>If <b>true</b> an FNC1 code will be the first character in the barcode.</remarks>
        public  $UccEan128 = false;

         /// <summary>
        /// Gets or Sets a boolean indicating whether to process the tilde character.
        /// </summary>
        /// <remarks>If <b>true</b> checks for fnc1 (~1) character in the barcode Value and checks for the inline code sets if present in the data to process.
        /// Example value: "~BHello ~AWORLD 1~C2345", where ~A, ~B and ~C representing code sets A, B and C respectively.
        /// However if any inline code set has invalid characters it will be shifted to an appropriate code set.
        /// "\" is used as an escape character to add ~.</remarks>
        public  $ProcessTilde = false;

        public function GetjsonSerializeString()
        {
         $jsonArray=   array();
 
         $jsonArray["type"] ="code128Barcode";
 
         if($this->Height != null)
            $jsonArray['height'] = $this->Height;

        //if($this->UccEan128 != null)
            $jsonArray['uccEan128'] = $this->UccEan128;

        //if($this->ProcessTilde != null)
            $jsonArray['processTilde'] = $this->ProcessTilde;


         
         //----------------TextBarcodeElement---------------------------------
         if($this->FontName != null)
         $jsonArray['font'] = $this->FontName;

         if(($this->TextColor != null)&&($this->TextColor->ColorString != null))
         $jsonArray['textColor'] = $this->TextColor->ColorString;
        
        if($this->FontSize != null)
         $jsonArray['fontSize'] = $this->FontSize;
        
         if($this->ShowText != "null")
         $jsonArray['showText'] = $this->ShowText;
        
     
         //----------------barcodeElement--------------------------------
 
         if(($this->Color != null)&&($this->Color->ColorString != null))
             $jsonArray['color'] = $this->Color->ColorString;
    
         if($this->XDimension != null)
             $jsonArray['xDimension'] = $this->XDimension;
    
         if($this->Value != null)
             $jsonArray['value'] = $this->Value;
    
    
         // ------------element---------------------
                
         if($this->Placement != null)
             $jsonArray['placement'] = ($this->Placement);
    
         if($this->XOffset != null)
             $jsonArray['xOffset'] = $this->XOffset;
    
         if($this->YOffset != null)
             $jsonArray['yOffset'] = $this->YOffset;
    
         //if($this->EvenPages != null)
             $jsonArray['evenPages'] = $this->EvenPages;
    
        // if($this->OddPages != null)
             $jsonArray['oddPages'] = $this->OddPages;
    
         return $jsonArray;
        }
    }
?>
