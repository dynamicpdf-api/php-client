

<?php

include_once('Input.php');
include_once('ImageResource.php');
include_once('InputType.php');
include_once('Align.php');
include_once('VAlign.php');

     class ImageInput extends Input
    {

        public function __construct(?ImageResource $resource) 
        { 
            if($resource != null)
            parent::__construct($resource);
        }
       public static function CreateImageInput(string $cloudResourcePath)  
        { 
            $imageInput =new ImageInput(null);
            $imageInput->ResourceName = $cloudResourcePath;
            return $imageInput;
        }

            
       /// <summary>
        /// Gets or sets the scaleX of the image.
        /// </summary>
        public  $ScaleX;

        /// <summary>
        /// Gets or sets the scaleY of the image.
        /// </summary>
        public  $ScaleY;

        /// <summary>
        /// Gets or sets the top margin.
        /// </summary>
        public  $TopMargin;

        /// <summary>
        /// Gets or sets the left margin.
        /// </summary>
        public  $LeftMargin;

        /// <summary>
        /// Gets or sets the bottom margin.
        /// </summary>
        public  $BottomMargin;

        /// <summary>
        /// Gets or sets the right margin.
        /// </summary>
        public  $RightMargin;

        /// <summary>
        /// Gets or sets the page width.
        /// </summary>
        public  $PageWidth;

        /// <summary>
        /// Gets or sets the page height.
        /// </summary>
        public  $PageHeight;

        /// <summary>
        /// Gets or sets a boolean indicating whether to expand the image.
        /// </summary>
        public  $ExpandToFit;

        /// <summary>
        /// Gets or sets a boolean indicating whether to shrink the image.
        /// </summary>
        public  $ShrinkToFit;

        /// <summary>
        /// Gets or sets the horizontal alignment of the image.
        /// </summary>
        public $Align = Align::Center;

        /// <summary>
        /// Gets or sets the vertical alignment of the image.
        /// </summary>
        public $VAlign = VAlign::Center;

        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public  $StartPage;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
        public  $PageCount;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();

            $jsonArray["type"]= "image";

            if($this->ScaleX != null)
            $jsonArray['scaleX'] = $this->ScaleX;
           
           if($this->ScaleY != null)
            $jsonArray['scaleY'] = $this->ScaleY;
           
           if($this->TopMargin != null)
            $jsonArray['topMargin'] = $this->TopMargin;
           
           if($this->LeftMargin != null)
            $jsonArray['leftMargin'] = $this->LeftMargin;
           
           if($this->BottomMargin != null)
            $jsonArray['bottomMargin'] = $this->BottomMargin;
           
           if($this->RightMargin != null)
            $jsonArray['rightMargin'] = $this->RightMargin;
           
           if($this->PageWidth != null)
            $jsonArray['pageWidth'] = $this->PageWidth;
           
           if($this->PageHeight != null)
            $jsonArray['pageHeight'] = $this->PageHeight;
           
           if($this->ExpandToFit != null)
            $jsonArray['expandToFit'] = $this->ExpandToFit;
           
           if($this->ShrinkToFit != null)
            $jsonArray['shrinkToFit'] = $this->ShrinkToFit;
           
           if($this->Align != null)
            $jsonArray['align'] = $this->Align;;
           
           if($this->VAlign != null)
            $jsonArray['vAlign'] = $this->VAlign;
           
           if($this->StartPage != null)
            $jsonArray['startPage'] = $this->StartPage;
           
           if($this->PageCount != null)
            $jsonArray['pageCount'] = $this->PageCount;
           
           
           
           
            //---------------------------------------------------
            if($this->TemplateId != null)
                $jsonArray['templateId'] = $this->TemplateId;

            if($this->ResourceName != null)
                $jsonArray['resourceName'] = $this->ResourceName;

            if($this->Id != null)
                $jsonArray['id'] = $this->Id;
            
                return $jsonArray;
        }


        public   $Type =InputType::Image;
        // internal override InputResourceType InputResourceType { get; } = InputResourceType.Upload;

   

    }
?>
