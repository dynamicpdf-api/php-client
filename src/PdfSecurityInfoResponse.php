<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/JsonResponse.php';

/**
 *
 * Represents the pdf security information response.
 *
 */
class PdfSecurityInfoResponse extends JsonResponse
{
    /**
     *
     *  Initializes a new instance of the PdfSecurityInfoResponse class.
     *
     * @param  string $jsonContent The PdfSecurityInfo content of the response.
     */
    public function __construct(string $jsonContent = "")
    {
        parent::__construct($jsonContent);
        $this->Content = json_decode($jsonContent,true);
    }

    /**
     *
     *  Gets or Sets a pdf security information content.
     *
     */
    public $Content;

}