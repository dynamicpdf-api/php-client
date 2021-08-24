
<?php

include_once('Element.php');
include_once('ElementType.php');

    /// <summary>
    /// Represents an image element.
    /// </summary>
    /// <remarks>This class can be used to place images on a page.</remarks>
    class  ImageElement extends Element
    {

                /// <summary>
        /// Initializes a new instance of the <see cref="ImageElement"/> class.
        /// </summary>
        /// <param name="resource"><see cref="ImageResource"/> object containing the image resource.</param>
        /// <param name="placement">The placement of the image on the page.</param>
        /// <param name="xOffset">X coordinate of the image.</param>
        /// <param name="yOffset">Y coordinate of the image.</param>
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

                /// <summary>
        /// Initializes a new instance of the <see cref="ImageElement"/> class.
        /// </summary>
        /// <param name="resourceName">The name of the image resource.</param>
        /// <param name="placement">The placement of the image on the page.</param>
        /// <param name="xOffset">X coordinate of the image.</param>
        /// <param name="yOffset">Y coordinate of the image.</param>
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

        /// <summary>
        /// Gets or sets the horizontal scale of the image.
        /// </summary>
        public  $ScaleX;

        /// <summary>
        /// Gets or sets the vertical scale of the image.
        /// </summary>
        public  $ScaleY;

        /// <summary>
        /// Gets or sets the maximum height of the image.
        /// </summary>
        public  $MaxHeight;

        /// <summary>
        /// Gets or sets the maximum width of the image.
        /// </summary>
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
