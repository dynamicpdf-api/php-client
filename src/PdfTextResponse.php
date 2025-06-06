<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/JsonResponse.php';

/**
 *
 * Represents the pdf text response.
 *
 */
class PdfTextResponse extends JsonResponse
{

    /**
     *
     *  Initializes a new instance of the PdfResponse class.
     *
     * @param  string $jsonContent The json content
     */
    public function __construct(string $jsonContent = "")
    {
        parent::__construct($jsonContent);
        $this->Content = json_decode($jsonContent, true);
    }

    /**
     *
     * Gets the collection of PdfContent.
     *
     */
    public $Content = array();
}
