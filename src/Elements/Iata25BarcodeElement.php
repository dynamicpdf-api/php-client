<?php
    include_once('TextBarcodeElement.php');
    include_once('ElementType.php');
    
    /// <summary>
    /// Represents an IATA 2 of 5 barcode element.
    /// </summary>
    /// <remarks>This class can be used to place an IATA 2 of 5 barcode on a page.</remarks>
    class Iata25BarcodeElement extends TextBarcodeElement
    {
                /// <summary>
        /// Initializes a new instance of the <see cref="Iata25BarcodeElement"/> class.
        /// </summary>
        /// <param name="value">The value of the barcode.</param>
        /// <param name="placement">The placement of the barcode on the page.</param>
        /// <param name="height">The height of the barcode.</param>
        /// <param name="xOffset">The X coordinate of the barcode.</param>
        /// <param name="yOffset">The Y coordinate of the barcode.</param>
        public function __construct(string $value, string $placement, float $height,float $xOffset = 0, float $yOffset = 0) 
        {
            $this->Height=$height;
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }
     
        public  $Type  = ElementType::Iata25Barcode;
        /// <summary>
        /// Gets or sets a value indicating if the check digit should be added to the value.
        /// </summary>
        public  $IncludeCheckDigit =false;
                /// <summary>
        /// Gets or sets the height of the barcode.
        /// </summary>
        public  $Height ;

        public function GetjsonSerializeString()
        {
         $jsonArray=   array();
 
         $jsonArray["type"] ="iata25Barcode";
 
         //if($this->IncludeCheckDigit != null)
            $jsonArray['includeCheckDigit'] = $this->IncludeCheckDigit;

         if($this->Height != null)
         $jsonArray['height'] = $this->Height;
         
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
    
         //if($this->OddPages != null)
             $jsonArray['oddPages'] = $this->OddPages;
    
         return $jsonArray;
        }
    }
?>
