<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/Endpoint.php';
include_once __DIR__ . '/PdfTextResponse.php';
include_once __DIR__ . '/TextOrder.php';
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
     * @param  string $textOrder The text extraction order.
     */
    public function __construct(PdfResource $resource, int $startPage = 1, int $pageCount = 0, string $textOrder = TextOrder::Stream )
    {
        parent::__construct();
        $this->resource = $resource;
        $this->StartPage = $startPage;
        $this->PageCount = $pageCount;
        $this->TextOrder = $textOrder;
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
     * Gets or sets the text extraction order.
     *
     */
    public $TextOrder = TextOrder::Stream;

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

        $params = array('startPage' => $this->StartPage, 'pageCount' => $this->PageCount, 'textOrder' => $this->TextOrder);
        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        $url = $endPointUrl . '?' . http_build_query($params);
        curl_setopt($client, CURLOPT_URL, $url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, 0);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        $retObject = new PdfTextResponse($outData);
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result == true && $retObject->StatusCode == 200) {
            $retObject->IsSuccessful = true;
            $retObject->JsonContent = $outData;
        } else{
            if ($retObject->StatusCode == 401)
                throw new EndpointException("Invalid Api Key specified");           
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        }

        curl_close($client);

        return $retObject;
    }
}
