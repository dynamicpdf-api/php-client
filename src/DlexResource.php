
<?php
require_once('Resource.php');
require_once('ResourceType.php');


    /**
    *
    * Represents a Dlex resource object that is created using the DLEX file and a name.
    *
    */
    class DlexResource extends Resource
    {

        /**
        *
        * Initializes a new instance of the DlexResource class with DLEX file path and resource name as parameters. 
        *
        * @param  string $dlexPath The dlex file path.
        * @param  string $resourceName The name of the resource.
        */
        public function __construct( $dlex, string  $resourceName = null)
        {
            parent::__construct($dlex, $resourceName); 
        }


       /**
       *
       * Initializes a new instance of the DlexResource class with byte data of the DLEX file and resource name 
       * as parameters. 
       *
       * @param  array $value The byte array of the dlex file.
       * @param  string $resourceName The name of the resource.
       */
       /* public function DlexResource2(array $value, string $resourceName = null)
        { 
            parent::__construct($value, $resourceName) ;
        }


        /**
        *
        * Initializes a new instance of the DlexResource class with stream of the DLEX file and resource name as 
        * parameters. 
        *
        * @param  Stream $data The stream of the dlex file.
        * @param  string $resourceName The name of the resource.
        */
        /*public function DlexResource3(Stream $data, string $resourceName = null) 
        { 
            parent::__construct($data, $resourceName);
        }        */

        public   $Type  = ResourceType::Dlex;
        public  function  FileExtension()
        {
            return ".dlex";
        }
        
        public   $MimeType  = "application/xml";


        /**
        *
        * Gets or sets name for layout data resource.
        *
        */
        public  $LayoutDataResourceName; 

        public function GetjsonSerializeString()
        {
            $inputjson=array();
            $inputjson['type']='dlex';

            $inputjson['layoutDataResourceName']=$this->LayoutDataResourceName;
            $inputjson['resourceName']=$this->ResourceName;
            return $inputjson;
        }
    }
?>

