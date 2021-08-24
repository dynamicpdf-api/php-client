<?php
    
    include_once('Resource.php');
    include_once('ResourceType.php');
    
    /// <summary>
    /// Represents a pdf resource.
    /// </summary>
    class PdfResource extends Resource
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PdfResource"/> class.
        /// </summary>
        /// <param name="filePath">The pdf file path.</param>
        /// <param name="resourceName">The name of the resource.</param>
        public function __construct(string $filePath, ?string $resourceName= null)  
        { 
            parent::__construct($filePath,  $resourceName);
            $this->MimeType= "application/pdf";
         }

          /// <summary>
        /// Initializes a new instance of the <see cref="PdfResource"/> class.
        /// </summary>
        /// <param name="value">The byte array of the pdf file.</param>
        /// <param name="resourceName">The name of the resource.</param>
        /*public function __construct(array $value, ?string $resourceName = null) 
         { 
            parent::__construct($value,  $resourceName);
         }

           /// <summary>
        /// Initializes a new instance of the <see cref="PdfResource"/> class.
        /// </summary>
        /// <param name="data">The stream of the pdf file.</param>
        /// <param name="resourceName">The name of the resource.</param>
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
