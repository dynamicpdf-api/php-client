<?php
require_once __DIR__ . './Response.php';

/**
 *
 * Represents the pdf response.
 *
 */
class PdfResponse extends Response
{

    /**
     *
     * Gets the content od pdf.
     *
     */
    public $Content;

    /**
     *
     *  Initializes a new instance of the PdfResponse class.
     *
     * @param  string $pdfContent The byte array of pdf content.
     */
    public function __construct(?string $pdfContent = null)
    {
        $this->Content = $pdfContent;
    }
}
