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
        public function __construct(string $filePath, ?string $resourceName= null)  
        { 
            parent::__construct($filePath,  $resourceName);
            $this->MimeType= "application/pdf";
         }


        /**
        *
        *  Initializes a new instance of the PdfResource class. 
        *
        * @param  array $value The byte array of the pdf file.
        * @param  ?string $resourceName The name of the resource.
        */
        /*public function __construct(array $value, ?string $resourceName = null) 
         { 
            parent::__construct($value,  $resourceName);
         }


        /**
        *
        *  Initializes a new instance of the PdfResource class. 
        *
        * @param  Stream $data The stream of the pdf file.
        * @param  ?string $resourceName The name of the resource.
        */
        /*public function __construct(Stream $data, ?string $resourceName = null)
         { 
            parent::__construct($data,  $resourceName);
         }*/

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

