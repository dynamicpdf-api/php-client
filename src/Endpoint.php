<?php
namespace DynamicPDF\Api;


/**
 *
 * Represents the base class for endpoint and has settings for base url, api key and creates a rest request
 * object.
 *
 */
abstract class Endpoint
{
    private $_endPointVersion = "v1.0";

    public function __construct()
    {
        $this->ApiKey = Endpoint::$DefaultApiKey;
        $this->BaseUrl = Endpoint::$DefaultBaseUrl;
    }

    public $_Client;

    public $_EndpointName;

    /**
     *
     * Gets or sets default base url.
     *
     */
    public static $DefaultBaseUrl = "https://api.dynamicpdf.com";

    /**
     *
     * Gets or sets default api key.
     *
     */
    public static $DefaultApiKey;

    /**
     *
     * Gets or sets base url for the api.
     *
     */
    public $BaseUrl = "https://api.dynamicpdf.com";

    /**
     *
     * Gets or sets api key.
     *
     */
    public $ApiKey;

    public function Init()
    {
        $authorization = $this->ApiKey;
        $headr = array();

        $headr[] = 'Authorization:Bearer ' . $authorization;
        $this->_Client = curl_init(Endpoint::$DefaultBaseUrl . "/" . $this->_EndpointName);
        curl_setopt($this->_Client, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($this->_Client, CURLOPT_VERBOSE, false);
        curl_setopt($this->_Client, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->_Client, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->_Client, CURLOPT_SAFE_UPLOAD, true);
        
        curl_setopt($this->_Client, CURLOPT_POST, true);
        curl_setopt($this->_Client, CURLOPT_RETURNTRANSFER, false);
        return $this->_Client;
    }

}
