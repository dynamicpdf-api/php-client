<?php
include_once(__DIR__.'./Resource.php');
include_once(__DIR__.'./ResourceType.php');

     class FontResource extends Resource
    {
        public function __construct( $file, string $resourceName = null) 
        { 
            parent::__construct($file,  $resourceName);
        }

        public   $Type  = ResourceType::Font;

        public $MimeType;

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

            $inputjson=array();
            $inputjson['name']=$this->Name;
            $inputjson['resourceName']==$this->ResourceName;
           
            return $inputjson;

        }
    }
?>

