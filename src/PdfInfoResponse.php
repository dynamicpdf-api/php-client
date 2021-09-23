<?php
namespace DynamicPDF\Api;


include_once __DIR__ . './JsonResponse.php';

/**
 *
 * Represents the pdf inforamtion response.
 *
 */
class PdfInfoResponse extends JsonResponse
{

    /**
     *
     *  Initializes a new instance of the PdfInfoResponse class.
     *
     * @param  string $jsonContent The json of pdf information.
     */
    public function __construct(?string $jsonContent = null)
    {
        if ($jsonContent != null) {
            parent::__construct($jsonContent);
            $this->Content = json_decode($jsonContent);
        }
    }

    /**
     *
     * Gets the pdf information content.
     *
     */
    public $Content = array();

}
