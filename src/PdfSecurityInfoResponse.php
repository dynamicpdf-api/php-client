<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/JsonResponse.php';
include_once __DIR__ . '/PdfSecurityInfo.php';

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
    public function __construct(string $jsonContent)
    {
        parent::__construct($jsonContent);

        if ($jsonContent !== null) {
            $this->Content = new PdfSecurityInfo($this->JsonContent);
        }
    }

    /**
     *
     *  Gets or Sets a pdf security information content.
     *
     */
    public $Content;

}