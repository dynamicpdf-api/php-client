<?php
require_once('Input.php');
require_once('InputType.php');
require_once('MergeOptions.php');
require_once('PdfResource.php');
require_once('MergeOptions.php');


     /**
     *
     * Represents a pdf input.
     *
     */
     class PdfInput extends Input
    {


        /**
        *
        *  Initializes a new instance of the PdfInput class. 
        *
        * @param  ?PdfResource $resource The resource of type PdfResource.        *
        * @param  ?MergeOptions $options The merge options for the pdf.
        */
        public function __construct(?PdfResource $resource, ?MergeOptions $options =null) 
        {
            if($resource!= null)
                parent::__construct($resource);
            $this->MergeOptions = $options;
        }


        /**
        *
        *  Returns a PdfInput object containing the input pdf. 
        *
        * @param  string $cloudResourcePath The resource path in cloud resource manager.
        * @param  ?MergeOptions $options The merge options for the pdf.
        */
        public static function CreatePdfInput(string $cloudResourcePath, ?MergeOptions $options =null) 
        {
            $pdfInput =new PdfInput(null,null);
            $pdfInput->ResourceName = $resourceName;
            $pdfInput->MergeOptions = $options;
            return $pdfInput;
        }

        public   $Type= InputType::Pdf;


        /**
        *
        *  Gets or sets the merge options MergeOptions. 
        *
        */
        public  $MergeOptions ;


        /**
        *
        * Gets or sets the start page.
        *
        */
        public  $StartPage ;


        /**
        *
        * Gets or sets the page count.
        *
        */
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

