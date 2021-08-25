<?php
    require_once('Response.php');


    /**
    *
    * Represents the pdf response.
    *
    */
    class PdfResponse  extends Response
    {
       

        /**
        *
        * Gets the content od pdf.
        *
        */
        public  $Content;


        /**
        *
        *  Initializes a new instance of the PdfResponse class. 
        *
        * @param  mixed $pdfContent The byte array of pdf content.
        */
        public function  __construct(mixed $pdfContent)
        {
            $this->Content = $value;
        }
    }

