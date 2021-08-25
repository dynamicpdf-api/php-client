<?php
    
    include_once('ResourceType.php');
    
    abstract class Resource
    {
        /*public function Resource() 
        { 

        }*/
        public function __construct(?string $filePath, ?string $resourceName)
        {
            $this->ResourcePath=$filePath;
            
            $this->Data = Resource::GetFileData($filePath);
            if ($resourceName == null)
                $this->ResourceName = md5(uniqid(rand(), true)).$this->FileExtension();// bin2hex(decbin(rand(0,65536))).$this->FileExtension();
            else
            $this->ResourceName = $resourceName;
           
            $this->MimeType= "";
           // $this->FileExtension();
        }

       /* public function Resource(byte[] value, string resourceName)
        {
            Data = value;
            if (resourceName == null)
            $this->ResourceName = Guid.NewGuid().ToString() + FileExtension;
            else
            $this->ResourceName = resourceName;
        }*/
        /*public function Resource(Stream $value, string $resourceName)
        {
            $Data = Resource::GetSteamData($value);
            if ($resourceName == null)
            $this->ResourceName = Guid.NewGuid().ToString() + FileExtension;
            else
            $this->ResourceName = $resourceName;
        }*/

        public  $Data;


        /**
        *
        * Gets or sets the resource name.
        *
        */
        public  $ResourceName;
        public  $Name;
        public  $Type ;
        public  $MimeType= "";

        public  $ResourcePath;
       /* public function static string GetSteamData(Stream $stream)
        {
            string $data = null;
            if (stream != null && stream.Length > 0)
            {
                data = new byte[stream.Length - stream.Position];
                stream.Read(data, (int)stream.Position, data.Length);
            }
            return data;
        }*/
        public  static function  GetUTF8FileData(string $filePath)
        {
            $data=Resource::GetFileData( $filePath);
            return utf8_encode ( $data );
        }


        abstract function FileExtension();

        public static function   GetFileData(string $filePath)
        {
           $length= filesize($filePath);
           $file = fopen($filePath, "r");
           $array=  fread ( $file, $length );
           fclose($file);
           return $array;
        }
    }
?>

