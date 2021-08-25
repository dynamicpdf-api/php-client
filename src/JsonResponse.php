<?php
include_once('Response.php');

    /**
    *
    * Represents the base class for json response.
    *
    */
    abstract class JsonResponse extends Response
    {
        //internal JsonResponse() { }
        public function __construct(string $jsonContent) 
        {
             $this->JsonContent = $jsonContent;
        }


        /**
        *
        * Gets the json content.
        *
        */
        public  $JsonContent;
    }
?>
