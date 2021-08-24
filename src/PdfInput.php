<?php
require_once('Input.php');
require_once('InputType.php');
require_once('MergeOptions.php');
require_once('PdfResource.php');
require_once('MergeOptions.php');

/// <summary>
    /// Represents a pdf input.
    /// </summary>
     class PdfInput extends Input
    {

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInput"/> class.
        /// </summary>
        /// <param name="resource">The resource of type <see cref="PdfResource"/>.</param>
        /// <param name="options">The merge options for the pdf.</param>
        public function __construct(?PdfResource $resource, ?MergeOptions $options =null) 
        {
            if($resource!= null)
                parent::__construct($resource);
            $this->MergeOptions = $options;
        }

        /// <summary>
        /// Returns a <see cref="PdfInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="cloudResourcePath">The resource path in cloud resource manager.</param>
        /// <param name="options">The merge options for the pdf.</param>
        public static function CreatePdfInput(string $resourceName, ?MergeOptions $options =null) 
        {
            $pdfInput =new PdfInput(null,null);
            $pdfInput->ResourceName = $resourceName;
            $pdfInput->MergeOptions = $options;
            return $pdfInput;
        }

        public   $Type= InputType::Pdf;

        /// <summary>
        /// Gets or sets the merge options <see cref="MergeOptions"/>.
        /// </summary>
        public  $MergeOptions ;

        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public  $StartPage ;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
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
