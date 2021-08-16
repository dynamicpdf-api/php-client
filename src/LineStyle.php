<?php

    /// <summary>
    /// Represents a style of line.
    /// </summary>
    class LineStyle
    {
        //private static System.Globalization.NumberFormatInfo objFormatter = new System.Globalization.NumberFormatInfo();

       // internal LineStyle(string lineStyle) { LineStyleString = lineStyle; }

        /// <summary>
        /// Initializes a new instance of the <see cref="LineStyle"/> class.
        /// </summary>
        /// <param name="dashArray">The array specifying the line style.</param>
        /// <param name="dashPhase">The phase of the line style.</param>
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
        /// <summary>
        /// Gets a solid line.
        /// </summary>
        public static function Solid() { return LineStyle::CreateLineStyle("solid");} 

        /// <summary>
        /// Gets a dotted line.
        /// </summary>
        public static function Dots() { return  LineStyle::CreateLineStyle("dots");}

        /// <summary>
        /// Gets a line with small dashes.
        /// </summary>
        public static function DashSmall() { return  LineStyle::CreateLineStyle("dashSmall");}

        /// <summary>
        /// Gets a dashed line.
        /// </summary>
        public static function Dash() { return  LineStyle::CreateLineStyle("dash"); }

        /// <summary>
        /// Gets a line with large dashes. 
        /// </summary>
        public static function DashLarge() { return  LineStyle::CreateLineStyle("dashLarge"); }

        /// <summary>
        /// Gets a invisible line. 
        /// </summary>
        public static function None() { return  LineStyle::CreateLineStyle("none");}

        public function GetjsonSerializeString()
        {
            
        }
    }
?>
