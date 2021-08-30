<?php
    
    include_once('Resource.php');
    include_once('ResourceType.php');
    

    /**
    *
    * Represents a pdf resource.
    *
    */
    class PdfResource extends Resource
    {

        /**
        *
        *  Initializes a new instance of the PdfResource class. 
        *
        * @param  string $filePath The pdf file path.
        * @param  ?string $resourceName The name of the resource.
        */
        public function __construct( $file, ?string $resourceName= null)  
        { 
            parent::__construct($file,  $resourceName);
            $this->MimeType= "application/pdf";
        }

        public   $Type = ResourceType::Pdf;
        
        public  function  FileExtension()
        {
            return ".pdf";
        }
       // public  ?string $ResourcePath ;
       
       public function GetjsonSerializeString()
       {
           $inputjson=array();
           $inputjson['type']=$this->Type;

        

           $inputjson['resourceName']=$this->ResourceName;
           return $inputjson;
       }

    }
?>

