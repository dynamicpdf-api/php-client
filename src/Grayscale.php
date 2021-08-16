<?php

include_once('Color.php');
    /// <summary>
    /// Represents a grayscale color.
    /// </summary>
    class Grayscale extends Color
    {
        private  $colorString;
        private  $grayLevel;

        public function __construct(string $colorString = null) { $this->ColorString = $colorString; }

        /// <summary>
        /// Initializes a new instance of the  <see cref="Grayscale"/> class.
        /// </summary>
        /// <param name="grayLevel">The gray level for the color.</param>
        public static function CreateGrayscale(float $grayLevel) 
        { 
            $grayscale = new Grayscale();
            $grayscale->grayLevel = $grayLevel;
            $grayscale->ColorString = "gray(".$grayLevel.")";
            return $grayscale;
         }

        /// <summary>Gets the color black.</summary>
        public static function Black() { return new Grayscale(0); } 

        /// <summary>Gets the color white.</summary>
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
