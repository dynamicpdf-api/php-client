<?php

include_once('TextBarcodeElement.php');
include_once('ElementPlacement.php');
include_once('ElementType.php');

    class Code25BarcodeElement extends TextBarcodeElement
    {
        public function __construct(string $value, string $placement, float $height, float $xOffset = 0, float $yOffset = 0)
        {
            parent::__construct($value,  $placement,  $xOffset,  $yOffset);
            $this->Height = $height;
        }     
       
        public  $Type = ElementType::Code25Barcode;
        public  $Height ;
        public function GetjsonSerializeString()
        {
         $jsonArray=   array();
 
         $jsonArray["type"] ="code25Barcode";
 
         if($this->Height != null)
         $jsonArray['height'] = $this->Height;
         
         //----------------TextBarcodeElement---------------------------------
         if($this->TextColor != null)
         $jsonArray['textColor'] = $this->TextColor;
        
        if($this->FontSize != null)
         $jsonArray['fontSize'] = $this->FontSize;
        
        //if($this->ShowText != null)
         $jsonArray['showText'] = $this->ShowText;
        
     
         //----------------barcodeElement--------------------------------
 
         if($this->Color != null)
             $jsonArray['color'] = $this->Color;
    
         if($this->XDimension != null)
             $jsonArray['xDimension'] = $this->XDimension;
    
         if($this->Value != null)
             $jsonArray['value'] = $this->Value;
    
    
         // ------------element---------------------
                
         if($this->Placement != null)
             $jsonArray['placement'] = strtolower($this->Placement);
    
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
