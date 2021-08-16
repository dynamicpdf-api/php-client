
<?php

include_once('Element.php');
include_once('ElementType.php');

    class  ImageElement extends Element
    {
        public function __construct(?ImageResource $resource, ?string $placement, float $xOffset = 0, float $yOffset = 0)
        {
            if($resource != null)
            {
            //parent::__construct() ;
           $this->Resource = $resource;
           $this->ResourceName = $resource->ResourceName;
           $this->Placement = $placement;
           $this->XOffset = $xOffset;
           $this->YOffset = $yOffset;
            }
        }

        public static function CreateImageElement(string $resourceName, string $placement, float $xOffset = 0, float $yOffset = 0) 
        {
            $imageElement = new ImageElement(null, null);
            $imageElement->ResourceName = $resourceName;
            $imageElement->Placement = $placement;
            $imageElement->XOffset = $xOffset;
            $imageElement->YOffset = $yOffset;
            return $imageElement;
        }

        public   $Type  = ElementType::Image;
        public   $Resource;
      
        public  $ResourceName;
        public  $ScaleX;
        public  $ScaleY;
        public  $MaxHeight;
        public  $MaxWidth;

        //{"type":"image","resourceName":"d37ca3c8-96dc-4772-abf3-d6417be534f1.gif","placement":"topCenter","xOffset":0.0,"yOffset":0.0}]}

        public function GetjsonSerializeString()
        {
           $jsonArray=array();
           $jsonArray["type"]="image";

            if($this->ResourceName != null)
                $jsonArray['resourceName'] = $this->ResourceName;

            if($this->ScaleX != null)
                $jsonArray['scaleX'] = $this->ScaleX;

            if($this->ScaleY != null)
                $jsonArray['scaleY'] = $this->ScaleY;

            if($this->MaxHeight != null)
                $jsonArray['maxHeight'] = $this->MaxHeight;

            if($this->MaxWidth != null)
                $jsonArray['maxWidth'] = $this->MaxWidth;

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
