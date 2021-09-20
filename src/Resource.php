<?php

include_once(__DIR__.'./ResourceType.php');
include_once(__DIR__.'./EndPointException.php');

abstract class Resource
{
   
    public function __construct( $file =null, ?string $resourceName= null)
    {
        if($file != null)
        {
        if (gettype($file) == "array") 
        {
            $this->Data = implode(array_map("chr", $file));
        } 
        else if (gettype($file) == "string")
        {
            if(file_exists($file))
            {
                $this->FilePath  = $file;
                $this->Data = Resource::GetFileData($file);
            }
            else
            {
                throw new EndpointException($file." : File does not exist.");
            }

        } 
        else 
        {
            $this->Data =  stream_get_contents($file, -1);
        }

        if ($resourceName == null)
            $this->ResourceName = md5(uniqid(rand(), true)) . $this->FileExtension(); // bin2hex(decbin(rand(0,65536))).$this->FileExtension();
        else
            $this->ResourceName = $resourceName;

        $this->MimeType = "";
    }
       
    }

   

    public  $Data;


    /**
     *
     * Gets or sets the resource name.
     *
     */
    public  $ResourceName;
    public  $Name;
    public  $Type;
    public  $MimeType = "";

    public  $FilePath;
    
    public  static function  GetUTF8FileData(string $filePath)
    {
        $data = Resource::GetFileData($filePath);
        return utf8_encode($data);
    }


    abstract function FileExtension();

    public static function   GetFileData(string $filePath)
    {
        $length = filesize($filePath);
        $file = fopen($filePath, "r");
        $array =  fread($file, $length);
        fclose($file);
        return $array;
    }
}
