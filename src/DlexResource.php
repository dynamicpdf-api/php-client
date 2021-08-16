
<?php
require_once('Resource.php');
require_once('ResourceType.php');

    class DlexResource extends Resource
    {
        public function __construct(string $dlexPath, string  $resourceName = null)
        {
            parent::__construct($dlexPath, $resourceName); 
        }
       /* public function DlexResource2(array $value, string $resourceName = null)
        { 
            parent::__construct($value, $resourceName) ;
        }
        public function DlexResource3(Stream $data, string $resourceName = null) 
        { 
            parent::__construct($data, $resourceName);
        }        */

        public   $Type  = ResourceType::Dlex;
        public  function  FileExtension()
        {
            return ".dlex";
        }
        public   $MimeType  = "application/xml";

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
