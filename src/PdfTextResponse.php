<?php
include_once('JsonResponse.php');


    /// <summary>
    /// Represents the pdf text response.
    /// </summary>
    class PdfTextResponse extends JsonResponse
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PdfTextResponse"/> class.
        /// </summary>
        //public PdfTextResponse() : base() { }

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfResponse"/> class.
        /// </summary>
        /// <param name="jsonContent">The json content</param>
        public function __construct(string $jsonContent) 
        {
            parent::__construct($jsonContent);
            $this->Content = json_decode($jsonContent);
        }

        /// <summary>
        /// Gets the collection of PdfContent.
        /// </summary>
        public $Content = array();

    }
?>
