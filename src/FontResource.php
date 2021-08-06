<?php
include_once('Resource.php');
include_once('ResourceType.php');

     class FontResource extends Resource
    {
        public function __construct(string $filePath, string $resourceName = null) 
        { 
            parent::__construct($filePath,  $resourceName);
        }
       /* public function FontResource2(array $value, string $resourceName = null) 
        { 
            parent::__construct($value, $resourceName);
        }
        public function FontResource3(Stream $data, string $resourceName = null)  
        { 
            parent::__construct( $data, $resourceName);
        }*/

        public   $Type  = ResourceType::Font;
       //internal override string ResourcePath ;
       
     
        


        public  function FileExtension() : string
        {
            $fileHeader =  substr($this->Data,0,4);
            $byteArray=array();
            for($i = 0; $i < strlen($fileHeader); $i++)
            {
                $byteArray[$i] =ord($fileHeader[$i]);
            }

            if ($byteArray[0] == 0x4f && $byteArray[1] == 0x54 && $byteArray[2] == 0x54 && $byteArray[3] == 0x4f)
            {
                $this->MimeType = "font/otf";
                return ".otf";
            }
            else if ($byteArray[0] == 0x00 && $byteArray[1] == 0x01 && $byteArray[2] == 0x00 && $byteArray[3] == 0x00)
            {
                $this->MimeType = "font/ttf";
                return ".ttf";
            }
            else
            {
                throw new EndPointException("Unsupported font");
            }

            
        }
        public function GetjsonSerializeString()
        {
//"fonts":[{"name":"f934f893-9f27-4c37-889b-b7036b4e4297","resourceName":"f3926706-aafc-4091-a6f4-5155d0d9fa81.ttf"}]

            $inputjson=array();
            $inputjson['name']=$this->Name;
            $inputjson['resourceName']==$this->ResourceName;
           
            return $inputjson;

       /* return    array (
            "type"=>"image",
            "align"=>1,
            "vAlign"=>1,
            "resourceName"=>$this->ResourceName);*/

        }
    }
?>
