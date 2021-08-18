<?php

include_once('JsonResponse.php');

    /// <summary>
    /// Represents the pdf inforamtion response.
    /// </summary>
    class PdfInfoResponse extends JsonResponse
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInfoResponse"/> class.
        /// </summary>
       // public __construct()  { }

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInfoResponse"/> class.
        /// </summary>
        /// <param name="jsonContent">The json of pdf information.</param>
        public function __construct(string $jsonContent) 
        {
            parent::__construct($jsonContent);
            $this->Content = json_decode($jsonContent);
        }

        /// <summary>
        /// Gets the pdf information content.
        /// </summary>
        public $Content = array();


    }
?>
