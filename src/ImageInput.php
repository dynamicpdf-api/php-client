

<?php

include_once('Input.php');
include_once('ImageResource.php');
include_once('InputType.php');
include_once('Align.php');
include_once('VAlign.php');

     class ImageInput extends Input
    {

        public function __construct(ImageResource $resource) 
        { 
            parent::__construct($resource);
        }
      /*  public function ImageInput2(string $cloudResourcePath)  
        { 
            parent::__construct($cloudResourcePath);
        }*/

            
 

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
            $jsonArray['align'] = $this->Align;
           
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
        public  $ScaleX;
        public  $ScaleY;
        public  $TopMargin;
        public  $LeftMargin;
        public  $BottomMargin;
        public  $RightMargin;
        public  $PageWidth;
        public  $PageHeight;
        public  $ExpandToFit;
        public  $ShrinkToFit;
        public  $Align = Align::Center;
        public  $VAlign = VAlign::Center;
        public  $StartPage;
        public  $PageCount;
   

    }
?>
