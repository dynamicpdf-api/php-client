<?php
include_once('Color.php');

    /// <summary>
    /// Represents a CMYK color.
    /// </summary>
    class CmykColor extends Color
    {
        private  $cyan = 0;
        private  $magenta = 0;
        private  $yellow = 0;
        private  $black = 0;
        

        public function __construct(?string $colorString =null) { $this->ColorString = $colorString; }

        /// <summary>
        /// Initializes a new instance of the <see cref="CmykColor"/> class.
        /// </summary>
        /// <param name="cyan">The cyan intensity.</param>
        /// <param name="magenta">The magenta intensity.</param>
        /// <param name="yellow">The yellow intensity.</param>
        /// <param name="black">The black intensity.</param>
        /// <remarks>Values must be between 0.0 and 1.0.</remarks>
        public static function CreateCmykColor(float $cyan, float $magenta, float $yellow, float $black)
        {
            $cmykColor = new CmykColor();
            if ($cyan < 0.0 || $cyan > 1.0 || $magenta < 0.0 || $magenta > 1.0 || $yellow < 0.0 || $yellow > 1.0 || $black < 0.0 || $black > 1.0)
            {
                throw new EndpointException("CMYK values must be from 0.0 to 1.0.");
            }

            $cmykColor->ColorString="cmyk(".$cyan.",".$magenta.",".$yellow.",".$black.")";
            $cmykColor->cyan = $cyan;
            $cmykColor->magenta = $magenta;
            $cmykColor->yellow = $yellow;
            $cmykColor->black = $black;
            return $cmykColor;
        }
        /// <summary>Gets the color black.</summary>
        public function Black() { return new CmykColor(1, 1, 1, 1); } 

        /// <summary>Gets the color white.</summary>
        public function White() { return new CmykColor(0, 0, 0, 0); } 
        
        /*internal override string ColorString
        {
            get
            {
                if (colorString != null)
                    return colorString;
                else
                    return "cmyk(" + cyan.ToString() + "," + magenta.ToString() + "," + yellow.ToString() + "," + black.ToString() + ")";
            }
            set
            {
                colorString = value;
            }
        }*/

    }
?>
