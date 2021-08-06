<?php

include_once('Input.php');
include_once('DlexResource.php');
include_once('LayoutDataResource.php');
include_once('InputType.php');

    class DlexInput extends Input
    {
        public function __construct(DlexResource $dlexResource, LayoutDataResource $layoutData) 
        {
          // parent::__construct();
            $this->ResourceName = $dlexResource->ResourceName;
            $this->LayoutDataResourceName = $layoutData->LayoutDataResourceName;
            $dlexResource->LayoutDataResourceName=$this->LayoutDataResourceName ;
         
          
           array_push( $this->Resources,$layoutData);
           array_push( $this->Resources,$dlexResource);

        }
      /*  public function DlexInput2(string $cloudResourcePath, LayoutDataResource $layoutData) 
        {
            parent::__construct();
            $ResourceName = $cloudResourcePath;
            $this->LayoutDataResourceName = layoutData.ResourceName;
        }

        public function DlexInput3(string $cloudResourcePath, string $cloudLayoutDataPath) 
        {
            parent::__construct();
            $ResourceName = $cloudResourcePath;
            $this->LayoutDataResourceName = cloudLayoutDataPath;
        }*/

        public   $Type= InputType::Dlex;

        public  $LayoutDataResourceName;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();
            $jsonArray['type'] = 'dlex';
            $jsonArray['layoutDataResourceName'] = $this->LayoutDataResourceName;

            
            //---------------------------------------------------
            if($this->TemplateId != null)
                $jsonArray['templateId'] = $this->TemplateId;

            if($this->ResourceName != null)
                $jsonArray['resourceName'] = $this->ResourceName;

            if($this->Id != null)
                $jsonArray['id'] = $this->Id;
            
                return $jsonArray;
            
            return $jsonArray;
        }
    }
?>
