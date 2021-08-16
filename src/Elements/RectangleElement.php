<?php
include_once('Element.php');
include_once('ElementPlacement.php');
include_once('ElementType.php');

    class RectangleElement extends Element
    {
        public function __construct(string $placement, float $width, float $height)
        {
            $this->Placement = $placement;
            $this->Width = $width;
            $this->Height = $height;
        } 


        public   $Type  = ElementType::Rectangle;

        public  $Width = 0;
        public  $Height = 0;
        public  $BorderWidth = 0;
        public  $CornerRadius = 0;
        public  $BorderStyle= 0;
        public  $BorderColor = 0;
        public  $FillColor = 0;
        public function GetjsonSerializeString()
        {
            //"width":100.0,"height":50.0,"cornerRadius":0.0,"placement":"topCenter","xOffset":0.0,"yOffset":0.0
        $jsonArray=   array();
        $jsonArray["type"] ="rectangle";

        if($this->Width != null)
            $jsonArray["width"]=$this->Width;

        if($this->Height != null)
            $jsonArray["height"]=$this->Height;

        if($this->BorderWidth != null)
            $jsonArray["borderWidth"]=$this->BorderWidth;

        if($this->CornerRadius != null)
            $jsonArray["cornerRadius"]=$this->CornerRadius;

        if(($this->FillColor != null)&&($this->FillColor->ColorString != null))
            $jsonArray["fillColor"]=$this->FillColor->ColorString;

        if(($this->BorderStyle != null)&&($this->BorderStyle->LineStyleString != null))
            $jsonArray["borderStyle"]=$this->BorderStyle->LineStyleString;

        if(($this->BorderColor != null)&&($this->BorderColor->ColorString != null))
            $jsonArray["borderColor"]=$this->BorderColor->ColorString;


          // ---------------------------------
            
if($this->Placement != null)
$jsonArray['placement'] = $this->Placement;

if($this->XOffset != null)
$jsonArray['xOffset'] = $this->XOffset;

if($this->YOffset != null)
$jsonArray['yOffset'] = $this->YOffset;

if($this->EvenPages != null)
$jsonArray['evenPages'] = $this->EvenPages;

if($this->OddPages != null)
$jsonArray['oddPages'] = $this->OddPages;
           
        
        return $jsonArray;
        }
    }
?>
