<?php
    require_once('Response.php');

    class PdfResponse  extends Response
    {
       
        public  $PdfContent;
        public function  SetPdfContent(mixed $value)
        {
            $this->PdfContent = $value;
        }
    }
