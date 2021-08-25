<?php


    /**
    *
    * Represents a style of line.
    *
    */
    class LineStyle
    {
        //private static System.Globalization.NumberFormatInfo objFormatter = new System.Globalization.NumberFormatInfo();

       // internal LineStyle(string lineStyle) { LineStyleString = lineStyle; }


        /**
        *
        *  Initializes a new instance of the LineStyle class. 
        *
        * @param  ?array $dashArray The array specifying the line style.
        * @param  float $dashPhase The phase of the line style.
        */
        public function __construct(?array $dashArray, float $dashPhase = 0)
        {
            if($dashArray != null)
            {
             $strLineStyle = "[";
            for ( $i = 0; $i < count($dashArray); $i++)
            {
                 $val = $dashArray[$i];
                if ($i == count($dashArray) - 1)
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
        }

        public static function CreateLineStyle(string $lineStyle) 
        { 
            $lineStyleObj=new LineStyle(null);
            $lineStyleObj->LineStyleString = $lineStyle; 
            return $lineStyleObj;
        }

        public  $LineStyleString;

        /**
        *
        * Gets a solid line.
        *
        */
        public static function Solid() { return LineStyle::CreateLineStyle("solid");} 


        /**
        *
        * Gets a dotted line.
        *
        */
        public static function Dots() { return  LineStyle::CreateLineStyle("dots");}


        /**
        *
        * Gets a line with small dashes.
        *
        */
        public static function DashSmall() { return  LineStyle::CreateLineStyle("dashSmall");}


        /**
        *
        * Gets a dashed line.
        *
        */
        public static function Dash() { return  LineStyle::CreateLineStyle("dash"); }


        /**
        *
        * Gets a line with large dashes.
        *
        */
        public static function DashLarge() { return  LineStyle::CreateLineStyle("dashLarge"); }


        /**
        *
        * Gets a invisible line.
        *
        */
        public static function None() { return  LineStyle::CreateLineStyle("none");}

        public function GetjsonSerializeString()
        {
            
        }
    }
?>

