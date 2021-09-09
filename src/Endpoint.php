<?php


/**
*
* Represents the base class for endpoint and has settings for base url, api key and creates a rest request 
* object. 
*
*/
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


    /**
    *
    * Gets or sets default base url.
    *
    */
    public static  $DefaultBaseUrl = "https://api.dynamicpdf.com/v1.0";


    /**
    *
    * Gets or sets default api key.
    *
    */
    public static  $DefaultApiKey;


    /**
    *
    * Gets or sets base url for the api.
    *
    */
    public   $BaseUrl="";


    /**
    *
    * Gets or sets api key.
    *
    */
    public   $ApiKey="";


         public function  Init()
        {
            $authorization = Endpoint::$DefaultApiKey;
            $headr = array();
            $headr[] = 'Authorization:Bearer '.$authorization;
            $this->Client = curl_init( Endpoint::$DefaultBaseUrl."/".$this->EndpointName);
            curl_setopt($this->Client, CURLOPT_HTTPHEADER, $headr );
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
