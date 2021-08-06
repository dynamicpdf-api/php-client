<?php
include_once('Resource.php');
include_once('ResourceType.php');

    class LayoutDataResource extends Resource
    {
        public function __construct(string $layoutData, string $layoutDataResourceName = null) 
        {
        
            if ($this->endsWith($layoutData,".json"))
            {
               
                $this->ResourcePath=$layoutData;
                $this->Data = Resource::GetUTF8FileData($layoutData);
               
            }
            else
            {
               
                $this->ResourcePath=null;
                $this->Data = $layoutData;
               
            }

            if ($layoutDataResourceName == null)
                $this->LayoutDataResourceName =  md5(uniqid(rand(), true)).".json";
            else
                $this->LayoutDataResourceName = $layoutDataResourceName;

                $this->MimeType = "application/json";
                $this->Type = ResourceType::LayoutData;
                $this->ResourceName=$this->LayoutDataResourceName ;
        }
       /* public function LayoutDataResource2(byte[] layoutData, string layoutDataResourceName = null) : base() 
        {
            Data = (byte[])layoutData;
            if ($this->LayoutDataResourceName == null)
            $this->LayoutDataResourceName = Guid.NewGuid().ToString() + ".json";
            else
            $this->LayoutDataResourceName = layoutDataResourceName;
        }*/

       /* public function LayoutDataResource(Stream $layoutData, string $layoutDataResourceName = null)  
        {
            parent::__construct();
            $Data = parent::GetSteamData($layoutData);
            if ($this->LayoutDataResourceName == null)
            $this->LayoutDataResourceName = bin2hex(openssl_random_pseudo_bytes(16)) + ".json";
            else
            $this->LayoutDataResourceName = $layoutDataResourceName;
        }*/
        public  function  FileExtension()
        {
            return ".json";
        }
        
        public  $FileExtension = ".json";
        public  $LayoutDataResourceName ;

        public function GetjsonSerializeString()
        {
           return null;
        }

        function endsWith( $Str1, $Str2 ) {

            $length = strlen( $Str2 );
            if( !$length ) {
                return true;
            }
            return strtolower(substr( $Str1, -$length ) )== strtolower($Str2);
        }
    }
?>
