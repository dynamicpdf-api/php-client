<?php


    /**
    *
    * Represents a style of line.
    *
    */
    class LineStyle
    {
        

        /**
        *
        *  Initializes a new instance of the LineStyle class. 
        *
        * @param  ?array $dashArray The array specifying the line style.
        * @param  float $dashPhase The phase of the line style.
        */
        public function __construct( $line, float $dashPhase = 0)
        {
            if(gettype($line) == "array")
            {
             $strLineStyle = "[";
            for ( $i = 0; $i < count($line); $i++)
            {
                 $val = $line[$i];
                if ($i == count($line) - 1)
                    $strLineStyle = $strLineStyle.sprintf("%.2f", $val);
                else
                    $strLineStyle = $strLineStyle.sprintf("%.2f", $val).",";
            }
            $strLineStyle = $strLineStyle."]";
            if($dashPhase != 0)
            {
                $strLineStyle = $strLineStyle.sprintf("%.2f", $dashPhase);
            }
            $this->LineStyleString = $strLineStyle;
            }
            else
            {
                $this->LineStyleString = $line; 
            }
        }


        public  $LineStyleString;

        /**
        *
        * Gets a solid line.
        *
        */
        public static function Solid() { return new LineStyle("solid");} 


        /**
        *
        * Gets a dotted line.
        *
        */
        public static function Dots() { return new LineStyle("dots");}


        /**
        *
        * Gets a line with small dashes.
        *
        */
        public static function DashSmall() { return  new LineStyle("dashSmall");}


        /**
        *
        * Gets a dashed line.
        *
        */
        public static function Dash() { return   new LineStyle("dash"); }


        /**
        *
        * Gets a line with large dashes.
        *
        */
        public static function DashLarge() { return   new LineStyle("dashLarge"); }


        /**
        *
        * Gets a invisible line.
        *
        */
        public static function None() { return   new LineStyle("none");}

        public function GetjsonSerializeString()
        {
            
        }
    }
?>

