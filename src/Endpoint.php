<?php
abstract class Endpoint
{
    protected  $enableLogging = false;
  
    //private array $resources;

    function __construct()
    {
    }

    //internal Endpoint(List<EndPointResource> resources)
    //{
    //    this.resources = resources;
    //}
    public static  $DefaultBaseUrl;

    public static  $DefaultApiKey;

    public   $BaseUrl="";

    public   $ApiKey="";


         public function  Init()
        {
            $authorization = Endpoint::$DefaultApiKey;
            $headr = array();
            $headr[] = 'Authorization:Bearer '.$authorization;
            //echo(Endpoint::$DefaultBaseUrl."/".$this->EndpointName."\n");
            $this->Client = curl_init( Endpoint::$DefaultBaseUrl."/".$this->EndpointName);
            //curl_setopt($this->Client, CURLOPT_HTTPHEADER, $headr );
            curl_setopt($this->Client, CURLOPT_VERBOSE, false);
            curl_setopt($this->Client, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($this->Client, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->Client, CURLOPT_SAFE_UPLOAD, true);
           //curl_setopt($this->Client, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($this->Client, CURLOPT_POST, true);
            curl_setopt($this->Client, CURLOPT_RETURNTRANSFER, false);
            return $this->Client;
        }

    public   $EndpointName;


    public  $Resources=array();

 

    public $Client;
}
?>