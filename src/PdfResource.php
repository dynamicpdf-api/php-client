<?php
    
    include_once('Resource.php');
    include_once('ResourceType.php');
    
    class PdfResource extends Resource
    {
        public function __construct(string $filePath, ?string $resourceName= null)  
        { 
            parent::__construct($filePath,  $resourceName);
            $this->MimeType= "application/pdf";
         }
        /*public function __construct(array $value, ?string $resourceName = null) 
         { 
            parent::__construct($value,  $resourceName);
         }
        public function __construct(Stream $data, ?string $resourceName = null)
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
