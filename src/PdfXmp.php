<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/PdfResource.php';
include_once __DIR__ . '/Endpoint.php';
include_once __DIR__ . '/XmlResponse.php';

class PdfXmp extends Endpoint
{
    private $resource;

    /**
     *
     *  Initializes a new instance of the PdfInfo class.
     *
     * @param  PdfResource $resource The resource of type PdfResource.
     */
    public function __construct(PdfResource $resource)
    {
        parent::__construct();
        $this->resource = $resource;
        $this->_EndpointName = "pdf-xmp";
    }

    public $_EndpointName = "pdf-xmp";

    /**
     *
     * Process the pdf resource to get  pdf's xmp data.
     *
     * @return XmlResponse Returns collection of XmlResponse.
     */
    public function Process(): XmlResponse
    {
        $client = parent::Init();

        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        curl_setopt($client, CURLOPT_URL, $endPointUrl);

        $errCode = json_last_error();

        $headr = array();

        $headr[] = 'Content-Type: application/pdf';
        $headr[] = 'Authorization:Bearer ' . $this->ApiKey;
        curl_setopt($client, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($client, CURLOPT_POSTFIELDS, $this->resource->Data);

        //$params = array('startPage' => $this->StartPage,'pageCount' => $this->PageCount);
        //$url = Endpoint::$DefaultBaseUrl."/".$this->EndpointName . '?' . http_build_query($params);
        //curl_setopt($client, CURLOPT_URL, $url);

        curl_setopt($client, CURLOPT_BINARYTRANSFER, 1);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        $retObject = new XmlResponse();
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result == true && $retObject->StatusCode == 200) {
            $retObject->IsSuccessful = true;
            $retObject->Content = $outData;
        } else {
            if ($retObject->StatusCode == 401){
                throw new EndpointException("Invalid api key specified.");
            }
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        }

        curl_close($client);

        return $retObject;
    }
}
