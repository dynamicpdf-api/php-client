<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/Endpoint.php';
include_once __DIR__ . '/PdfTextResponse.php';

/**
 *
 * Represents the pdf text endpoint.
 *
 */
class PdfText extends Endpoint
{
    private $resource;

    /**
     *
     *  Initializes a new instance of the PdfText class.
     *
     * @param  PdfResource $resource The image resource of type PdfResource.
     * @param  int $startPage The start page.
     * @param  int $pageCount The page count.
     */
    public function __construct(PdfResource $resource, int $startPage = 1, int $pageCount = 0)
    {
        parent::__construct();
        $this->resource = $resource;
        $this->StartPage = $startPage;
        $this->PageCount = $pageCount;
    }

    public $_EndpointName = "pdf-text";

    /**
     *
     * Gets or sets the start page.
     *
     */
    public $StartPage = 1;

    /**
     *
     * Gets or sets the page count.
     *
     */
    public $PageCount = 0;

    /**
     *
     * Process the pdf resource to get pdf's text.
     * @return PdfTextResponse Returns collection of PdfTextResponse.
     */
    public function Process(): PdfTextResponse
    {
        $client = parent::Init();

        $errCode = json_last_error();

        $headr = array();

        $headr[] = 'Content-Type: application/pdf';
        $headr[] = 'Authorization:Bearer ' . $this->ApiKey;
        curl_setopt($client, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($client, CURLOPT_POSTFIELDS, $this->resource->Data);

        $params = array('startPage' => $this->StartPage, 'pageCount' => $this->PageCount);
        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        $url = $endPointUrl . '?' . http_build_query($params);
        curl_setopt($client, CURLOPT_URL, $url);

        curl_setopt($client, CURLOPT_BINARYTRANSFER, 1);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        $retObject = new PdfTextResponse();
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result == true && $retObject->StatusCode == 200) {
            $retObject->IsSuccessful = true;
            $retObject->JsonContent = $retObject->Content = $outData;
        } else {
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        }

        curl_close($client);

        return $retObject;
    }
}
