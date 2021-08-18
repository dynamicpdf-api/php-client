<?php
include_once('Resource.php');
include_once('ResourceType.php');
include_once('EndPointException.php');

     class ImageResource extends Resource
    {
        public function __construct(string $filePath, string $resourceName = null)  
        { 
            parent::__construct($filePath, $resourceName);
            $this->Type = ResourceType::Image;
        }
      /*  public function __construct(array $value, string $resourceName = null) 
        { 
            parent::__construct($value,  $resourceName);
        }
        public function __construct(Stream $data, string $resourceName = null) 
        { 
            parent::__construct($data,  $resourceName);
        }*/

        
        //public   $MimeType; 

       // internal override string ResourcePath { get; set;}

       public  function  FileExtension()
        {
            
          
              //  $fileHeader =  array(16);
                $fileHeader =  substr($this->Data,0,16);
                $byteArray=array();
                for($i = 0; $i < strlen($fileHeader); $i++)
                {
                    $byteArray[$i] =ord($fileHeader[$i]);
                }
               
                if (ImageResource::IsPngImage($byteArray))
                {
                    $this->MimeType = "image/png";
                    return ".png";
                }
                else if (ImageResource::IsJpegImage($byteArray))
                {
                    $this->MimeType = "image/jpeg";
                    return ".jpeg";
                }
                else if (ImageResource::IsGifImage($byteArray))
                {
                    $this->MimeType = "image/gif";
                    return ".gif";
                }
                else if (ImageResource::IsTiffImage($byteArray))
                {
                    $this->MimeType = "image/tiff";
                    return ".tiff";
                }
                else if (ImageResource::IsJpeg2000Image($byteArray))
                {
                    $this->MimeType = "image/jpeg";
                    return ".jpeg";
                }
                else if(ImageResource::IsValidBitmapImage($byteArray))
                {
                    $this->MimeType = "image/bmp";
                    return ".bmp";
                }
                else
                {
                    //print_r ($fileHeader);
                    throw new EndPointException("Not supported image type or invalid image.");
                }
            
        }

        private static function IsJpeg2000Image(array $header)
        {
            return ($header[0] == 0x00 && $header[1] == 0x00 && $header[2] == 0x00 && $header[3] == 0x0C && $header[4] == 0x6A &&
                $header[5] == 0x50 && ($header[6] == 0x1A || $header[6] == 0x20) && ($header[7] == 0x1A || $header[7] == 0x20) &&
                $header[8] == 0x0D && $header[9] == 0x0A && $header[10] == 0x87 && $header[11] == 0x0A) ||
                ($header[0] == 0xFF && $header[1] == 0x4F && $header[2] == 0xFF && $header[3] == 0x51 && $header[6] == 0x00 && $header[7] == 0x00);
        }

        private static function IsPngImage(array $header)
        {
            return $header[0] == 0x89 && $header[1] == 0x50 && $header[2] == 0x4E && $header[3] == 0x47 &&
                $header[4] == 0x0D && $header[5] == 0x0A && $header[6] == 0x1A && $header[7] == 0x0A;
        }
        private static function IsTiffImage(array $header)
        {
            return ($header[0] == 0x49 && $header[1] == 0x49 && $header[2] == 0x2A && $header[3] == 0x00) ||
                ($header[0] == 0x4D && $header[1] == 0x4D && $header[2] == 0x00 && $header[3] == 0x2A);
        }
        private static function IsGifImage(array $header)
        {
            return $header[0] == 0x47 && $header[1] == 0x49 && $header[2] == 0x46 && $header[3] == 0x38 && ($header[4] == 0x37 || 
            $header[4] == 0x39) && $header[5] == 0x61;
        }
        private static function IsJpegImage(array $header)
        {
            return $header[0] == 0xFF && $header[1] == 0xD8 && $header[2] == 0xFF;
        }
        private static function IsValidBitmapImage(array $header)
        {
            return $header[0] == 0x42 && $header[1] == 0x4D;
        }
        public function GetjsonSerializeString()
        {


            $inputjson=array();
            $inputjson['type']="image";
            $inputjson['align']=1;
            $inputjson['vAlign']=1;
 
            $inputjson['resourceName']=$this->ResourceName;
            return $inputjson;

       /* return    array (
            "type"=>"image",
            "align"=>1,
            "vAlign"=>1,
            "resourceName"=>$this->ResourceName);*/

        }

    }

     ?>
