<?php
include_once('Element.php');
include_once('ElementPlacement.php');
include_once('ElementType.php');

    class LineElement extends Element
    {
        public function __construct(string $placement, float $x2Offset, float $y2Offset)
        {
            $this->Placement = $placement;
            $this->X2Offset = $x2Offset;
            $this->Y2Offset = $y2Offset;
        }
        
        public   $Type = ElementType::Line;

        public  $Color = null;
        public  $X1Offset=0;
        public  $Y1Offset=0;
        public  $X2Offset=0;
        public  $Y2Offset=0;
        public  $Width=0;
        public  $LineStyle;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();
            $jsonArray["type"] ="line";

            if($this->Color != null)
            $jsonArray['color'] = $this->Color;
           
           if($this->X1Offset != null)
            $jsonArray['x1Offset'] = $this->X1Offset;
           
           if($this->Y1Offset != null)
            $jsonArray['y1Offset'] = $this->Y1Offset;
           
           if($this->X2Offset != null)
            $jsonArray['x2Offset'] = $this->X2Offset;
           
           if($this->Y2Offset != null)
            $jsonArray['y2Offset'] = $this->Y2Offset;
           
           if($this->Width != null)
            $jsonArray['width'] = $this->Width;
           
           if($this->LineStyle != null)
            $jsonArray['lineStyle'] = $this->LineStyle;
           
           
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
