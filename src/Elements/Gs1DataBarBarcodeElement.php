<?php
    include_once('TextBarcodeElement.php');
    include_once('ElementType.php');
    
    class Gs1DataBarBarcodeElement extends TextBarcodeElement
    {
        public function __construct(string $value, string $placement,float $height, string $type ,float $xOffset = 0, float $yOffset = 0) 
        { 
            parent::__construct($value, $placement, $xOffset, $yOffset);
             $this->Gs1DataBarType = $type; 
             $this->Height=$height;
        }
        
        public  $Type = ElementType::Gs1DataBarBarcode;
       
        public  $Gs1DataBarType;
        public $Height;
        public function GetjsonSerializeString()
        {
         $jsonArray=   array();
 
         $jsonArray["type"] ="gs1DataBarBarcode";
 
         if($this->Gs1DataBarType != null)
            $jsonArray['gs1DataBarType'] = $this->Gs1DataBarType;

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
