<?php
require_once('Input.php');
require_once('InputType.php');
require_once('MergeOptions.php');
require_once('PdfResource.php');
require_once('MergeOptions.php');
     class PdfInput extends Input
    {
        public function __construct(PdfResource $resource, ?MergeOptions $options =null) 
        {
            parent::__construct($resource);
            $this->MergeOptions = $options;
        }
        /*public function __construct(string $resourceName) 
        {
            parent::__construct($resourceName,InputType::Pdf);

        }*/
        public   $Type= InputType::Pdf;
        public  $MergeOptions ;
        public  $StartPage ;
        public  $PageCount ;

        public function GetjsonSerializeString()
        {
            $template=$this->GetTemplate();
            $jsonArray=array();

   
           $jsonArray['type'] = "pdf";
          
           
         if($this->MergeOptions != null)
         {
            $MergeOptionsArray=$this->MergeOptions->GetjsonSerializeString();
            if(count( $MergeOptionsArray)>0)
                $jsonArray['mergeOptions'] =  $MergeOptionsArray;
         }
         

          if($this->StartPage != null)
           $jsonArray['startPage'] = $this->StartPage;
          
          if($this->PageCount != null)
           $jsonArray['pageCount'] = $this->PageCount;
                     
           
            //---------------------------------------------------
           
            $jsonArray[ 'templateId']= $this->TemplateId;
           
           
            $jsonArray['resourceName']= $this->ResourceName;

            
            $jsonArray['id']= $this->Id;

        return  $jsonArray;


        }
        
        

    }
?>
