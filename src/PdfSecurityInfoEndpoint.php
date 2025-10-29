<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/Endpoint.php';
include_once __DIR__ . '/PdfSecurityInfoResponse.php';

/**
 *
 * Represents the pdf security info endpoint.
 *
 */
class PdfSecurityInfoEndpoint extends Endpoint
{
    private $resource;

    /**
     *
     *  Initializes a new instance of the PdfSecurityInfo class.
     *
     * @param  PdfResource $resource The resource of type PdfResource.
     */
    public function __construct(PdfResource $resource)
    {
        parent::__construct();
        $this->resource = $resource;
        $this->_EndpointName = "pdf-security-info";
    }

    public $_EndpointName = "pdf-security-info";

    /**
     *
     * Process the pdf resource to get pdf's security information.
     * @return PdfSecurityInfoResponse Returns collection of PdfSecurityInfoResponse.
     */
    public function Process(): PdfSecurityInfoResponse
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

        curl_setopt($client, CURLOPT_RETURNTRANSFER, 0);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        $retObject = new PdfSecurityInfoResponse($outData);
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result == true && $retObject->StatusCode == 200) {
            $retObject->IsSuccessful = true;
            $retObject->JsonContent = $outData;
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