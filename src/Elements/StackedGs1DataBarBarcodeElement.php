<?php
    
    include_once('TextBarcodeElement.php');
    include_once('ElementType.php');
    
    class StackedGs1DataBarBarcodeElement extends TextBarcodeElement
    {
        
        public function __construct(string $value, string $placement, string $stackedGs1DataBarType, float $rowHeight,float $xOffset=0 , float $yOffset=0 )
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
            $this->StackedGs1DataBarType = $stackedGs1DataBarType; 
            $this->RowHeight = $rowHeight; 
        }
        
        
        public  $Type = ElementType::StackedGs1DataBarBarcode;
       
        public $StackedGs1DataBarType;
        public  $ExpandedStackedSegmentCount;
        public  $RowHeight;
        
        public function GetjsonSerializeString()
        {
         $jsonArray=   array();
 
         $jsonArray["type"] ="stackedGs1DataBarBarcode";
 
         if($this->StackedGs1DataBarType != null)
         $jsonArray['stackedGs1DataBarType'] = $this->StackedGs1DataBarType;
        
        if($this->ExpandedStackedSegmentCount != null)
         $jsonArray['expandedStackedSegmentCount'] = $this->ExpandedStackedSegmentCount;
        
        if($this->RowHeight != null)
         $jsonArray['rowHeight'] = $this->RowHeight;
        
        
         
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
