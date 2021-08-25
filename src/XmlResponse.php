<?php
include_once('Response.php');


    /**
    *
    * Represents the xml response.
    *
    */
    class XmlResponse extends Response
    {

        /**
        *
        *  Initializes a new instance of the XmlResponse class. 
        *
        */
        //public XmlResponse() {  }


        /**
        *
        *  Initializes a new instance of the XmlResponse class. 
        *
        * @param  ?string $xmlContent The xml content of the response.
        */
        public function __construct(?string $xmlContent =null) 
        { 
            $this->Content = $xmlContent; 
        }


        /**
        *
        * Gets the xml content.
        *
        */
        public $Content;
 
    }
?>

