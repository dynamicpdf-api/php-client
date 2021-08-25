<?php

include_once('RgbColor.php');


    /**
    *
    * Represents an RGB color created using the web hexadecimal convention.
    *
    */
    class WebColor extends RgbColor
    {

        /**
        *
        *  Initializes a new instance of the WebColor class. 
        *
        * @param  string $webHexString The hexadecimal string representing the color.
        */
        public function __construct(string $webHexString) { $this->ColorString = $webHexString;  } 

    }
?>

