<?php

/// <summary>
/// Represents the base class for endpoint and has settings for base url, 
/// api key and creates a rest request object.
/// </summary>
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

    /// <summary>
    /// Gets or sets default base url.
    /// </summary>
    public static  $DefaultBaseUrl;

    /// <summary>
    /// Gets or sets default api key.
    /// </summary>
    public static  $DefaultApiKey;

    /// <summary>
    /// Gets or sets base url for the api.
    /// </summary>
    public   $BaseUrl="";

    /// <summary>
    /// Gets or sets api key.
    /// </summary>
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