<?php
    require_once('Response.php');

    /// <summary>
    /// Represents the pdf response.
    /// </summary>
    class PdfResponse  extends Response
    {
       
          /// <summary>
        /// Gets the content od pdf.
        /// </summary>
        public  $Content;

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfResponse"/> class.
        /// </summary>
        /// <param name="pdfContent">The byte array of pdf content.</param>
        public function  __construct(mixed $pdfContent)
        {
            $this->Content = $value;
        }
    }
