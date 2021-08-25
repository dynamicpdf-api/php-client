<?php

include_once('Color.php');

    /**
    *
    * Represents a grayscale color.
    *
    */
    class Grayscale extends Color
    {
        private  $colorString;
        private  $grayLevel;

        public function __construct(string $colorString = null) { $this->ColorString = $colorString; }


        /**
        *
        *  Initializes a new instance of the  Grayscale class. 
        *
        * @param  float $grayLevel The gray level for the color.
        */
        public static function CreateGrayscale(float $grayLevel) 
        { 
            $grayscale = new Grayscale();
            $grayscale->grayLevel = $grayLevel;
            $grayscale->ColorString = "gray(".$grayLevel.")";
            return $grayscale;
         }


        /**
        *
        * Gets the color black.
        *
        */
        public static function Black() { return new Grayscale(0); } 


        /**
        *
        * Gets the color white.
        *
        */
        public static function White()  { return new Grayscale(1); } 
      

      /*  internal override string ColorString
        {
            get
            {
                if (colorString != null)
                    return colorString;
                else
                    return "gray(" + grayLevel.ToString()  + ")";
            }
            set
            {
                colorString = value;
            }
        }*/
    }
?>

