<?php
include_once(__DIR__.'./Color.php');


    /**
    *
    * Represents a CMYK color.
    *
    */
    class CmykColor extends Color
    {
        private  $cyan = 0;
        private  $magenta = 0;
        private  $yellow = 0;
        private  $black = 0;

        /**
        *
        * Initializes a new instance of the CmykColor class. 
        *
        * Values must be between 0.0 and 1.0.
        *
        * @param  float $cyan The cyan intensity.
        * @param  float $magenta The magenta intensity.
        * @param  float $yellow The yellow intensity.
        * @param  float $black The black intensity.
        */
        public  function __construct(float $cyan = 0, float $magenta = 0, float $yellow = 0, float $black = 0)
        {
           
            if ($cyan < 0.0 || $cyan > 1.0 || $magenta < 0.0 || $magenta > 1.0 || $yellow < 0.0 || $yellow > 1.0 || $black < 0.0 || $black > 1.0)
            {
                throw new EndpointException("CMYK values must be from 0.0 to 1.0.");
            }

            $this->ColorString="cmyk(".$cyan.",".$magenta.",".$yellow.",".$black.")";
            $this->cyan = $cyan;
            $this->magenta = $magenta;
            $this->yellow = $yellow;
            $this->black = $black;
           
        }

        /**
        *
        * Gets the color black.
        *
        */
        public function Black() { return new CmykColor(1, 1, 1, 1); } 


        /**
        *
        * Gets the color white.
        *
        */
        public function White() { return new CmykColor(0, 0, 0, 0); } 
        
        public   $ColorString = null ;

    }
?>

