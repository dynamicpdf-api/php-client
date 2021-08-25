<?php
include_once('EndpointException.php');
include_once('Color.php');


    /**
    *
    * Represents an RGB color.
    *
    */
    class RgbColor extends Color
    {
        //private string colorString;
        private  $red;
        private  $green;
        private  $blue;

        
        public function __construct(string $colorString =null) 
        { 
            $this->ColorString = $colorString; 
        }
       

        /**
        *
        *  Initializes a new instance of the RgbColor class. 
        *
        * @param  float $red The red intensity.
        * @param  float $green The green intensity.
        * @param  float $blue The blue intensity.
        */
        public  static function CreateRgbColor(float $red, float $green, float $blue)
        {
           
            if ($red < 0.0 || $red > 1.0 || $green < 0.0 || $green > 1.0 || $blue < 0.0 || $blue > 1.0)
            {
                throw new EndpointException("RGB values must be from 0.0 to 1.0.");
            }
            $color =new RgbColor();
            $color->red = $red;
            $color->green = $green;
            $color->blue = $blue;
            $color->ColorString ="rgb(".$red.",".$green.",".$blue.")";
            return $color;
        }

        
        
       


        /**
        *
        * Gets the color red.
        *
        */
        public static function Red()  { return new RgbColor("Red"); } 

        /**
        *
        * Gets the color blue.
        *
        */
        public static function Blue()  { return new RgbColor("Blue");  } 

        /**
        *
        * Gets the color green.
        *
        */
        public static function Green()  { return new RgbColor("Green"); } 

        /**
        *
        * Gets the color black.
        *
        */
        public static function Black()  { return new RgbColor("Black"); } 


        /**
        *
        * Gets the color silver.
        *
        */
        public static function Silver()  { return new RgbColor("Silver"); } 


        /**
        *
        * Gets the color dark gray.
        *
        */
        public static function DarkGray()  { return new RgbColor("DarkGray"); } 


        /**
        *
        * Gets the color gray.
        *
        */
        public static function Gray()  { return new RgbColor("Gray"); } 


        /**
        *
        * Gets the color dim gray.
        *
        */
        public static function DimGray()  { return new RgbColor("DimGray"); } 


        /**
        *
        * Gets the color white.
        *
        */
        public static function White()  { return new RgbColor("White"); } 


        /**
        *
        * Gets the color lime.
        *
        */
        public static function Lime()  { return new RgbColor("Lime"); } 


        /**
        *
        * Gets the color aqua.
        *
        */
        public static function Aqua()  { return new RgbColor("Aqua"); } 


        /**
        *
        * Gets the color purple.
        *
        */
        public static function Purple()  { return new RgbColor("Purple"); } 


        /**
        *
        * Gets the color cyan.
        *
        */
        public static function Cyan()  { return new RgbColor("Cyan"); } 


        /**
        *
        * Gets the color magenta.
        *
        */
        public static function Magenta()  { return new RgbColor("Magenta"); } 


        /**
        *
        * Gets the color yellow.
        *
        */
        public static function Yellow()  { return new RgbColor("Yellow"); } 


        /**
        *
        * Gets the color alice blue.
        *
        */
        public static function AliceBlue()  { return new RgbColor("AliceBlue"); } 


        /**
        *
        * Gets the color antique white.
        *
        */
        public static function AntiqueWhite()  { return new RgbColor("AntiqueWhite"); } 


        /**
        *
        * Gets the color aquamarine.
        *
        */
        public static function Aquamarine()  { return new RgbColor("Aquamarine"); } 


        /**
        *
        * Gets the color azure.
        *
        */
        public static function Azure()  { return new RgbColor("Azure"); } 
        

        /**
        *
        * Gets the color beige.
        *
        */
        public static function Beige()  { return new RgbColor("Beige"); } 


        /**
        *
        * Gets the color bisque.
        *
        */
        public static function Bisque()  { return new RgbColor("Bisque"); } 


        /**
        *
        * Gets the color blanched almond.
        *
        */
        public static function BlanchedAlmond()  { return new RgbColor("BlanchedAlmond"); } 


        /**
        *
        * Gets the color blue violet.
        *
        */
        public static function BlueViolet()  { return new RgbColor("BlueViolet"); } 


        /**
        *
        * Gets the color brown.
        *
        */
        public static function Brown()  { return new RgbColor("Brown"); } 


        /**
        *
        * Gets the color burly wood.
        *
        */
        public static function BurlyWood()  { return new RgbColor("BurlyWood"); } 


        /**
        *
        * Gets the color cadet blue.
        *
        */
        public static function CadetBlue()  { return new RgbColor("CadetBlue"); } 


        /**
        *
        * Gets the color chartreuse.
        *
        */
        public static function Chartreuse()  { return new RgbColor("Chartreuse"); } 


        /**
        *
        * Gets the color chocolate.
        *
        */
        public static function Chocolate()  { return new RgbColor("Chocolate"); } 


        /**
        *
        * Gets the color coral.
        *
        */
        public static function Coral()  { return new RgbColor("Coral"); } 


        /**
        *
        * Gets the color cornflower blue.
        *
        */
        public static function CornflowerBlue()  { return new RgbColor("CornflowerBlue"); } 


        /**
        *
        * Gets the color cornsilk.
        *
        */
        public static function Cornsilk()  { return new RgbColor("Cornsilk"); } 


        /**
        *
        * Gets the color crimson.
        *
        */
        public static function Crimson()  { return new RgbColor("Crimson"); } 


        /**
        *
        * Gets the color dark blue.
        *
        */
        public static function DarkBlue()  { return new RgbColor("DarkBlue"); } 


        /**
        *
        * Gets the color dark cyan.
        *
        */
        public static function DarkCyan()  { return new RgbColor("DarkCyan"); } 


        /**
        *
        * Gets the color dark golden rod.
        *
        */
        public static function DarkGoldenRod()  { return new RgbColor("DarkGoldenRod"); } 


        /**
        *
        * Gets the color dark green.
        *
        */
        public static function DarkGreengreen()  { return new RgbColor("DarkGreen"); } 


        /**
        *
        * Gets the color dark khaki.
        *
        */
        public static function DarkKhaki()  { return new RgbColor("DarkKhaki"); } 


        /**
        *
        * Gets the color dark magenta.
        *
        */
        public static function DarkMagenta()  { return new RgbColor("DarkMagenta"); } 


        /**
        *
        * Gets the color dark olive green.
        *
        */
        public static function DarkOliveGreen()  { return new RgbColor("DarkOliveGreen"); } 


        /**
        *
        * Gets the color dark orange.
        *
        */
        public static function DarkOrange()  { return new RgbColor("DarkOrange"); } 


        /**
        *
        * Gets the color dark orchid.
        *
        */
        public static function DarkOrchid()  { return new RgbColor("DarkOrchid"); } 


        /**
        *
        * Gets the color dark red.
        *
        */
        public static function DarkRed()  { return new RgbColor("DarkRed"); } 


        /**
        *
        * Gets the color dark salmon.
        *
        */
        public static function DarkSalmon()  { return new RgbColor("DarkSalmon"); } 


        /**
        *
        * Gets the color dark sea green.
        *
        */
        public static function DarkSeaGreen()  { return new RgbColor("DarkSeaGreen"); } 


        /**
        *
        * Gets the color dark slate blue.
        *
        */
        public static function DarkSlateBlue()  { return new RgbColor("DarkSlateBlue"); } 


        /**
        *
        * Gets the color dark slate gray.
        *
        */
        public static function DarkSlateGray()  { return new RgbColor("DarkSlateGray"); } 


        /**
        *
        * Gets the color dark turquoise.
        *
        */
        public static function DarkTurquoise()  { return new RgbColor("DarkTurquoise"); } 


        /**
        *
        * Gets the color dark violet.
        *
        */
        public static function DarkViolet()  { return new RgbColor("DarkViolet"); } 


        /**
        *
        * Gets the color deep pink.
        *
        */
        public static function DeepPink()  { return new RgbColor("DeepPink"); } 


        /**
        *
        * Gets the color deep sky blue.
        *
        */
        public static function DeepSkyBlue()  { return new RgbColor("DeepSkyBlue"); } 


        /**
        *
        * Gets the color dodger blue.
        *
        */
        public static function DodgerBlue()  { return new RgbColor("DodgerBlue"); } 


        /**
        *
        * Gets the color feldspar.
        *
        */
        public static function Feldspar()  { return new RgbColor("Feldspar"); } 


        /**
        *
        * Gets the color fire brick.
        *
        */
        public static function FireBrick()  { return new RgbColor("FireBrick"); } 


        /**
        *
        * Gets the color floral white.
        *
        */
        public static function FloralWhite()  { return new RgbColor("FloralWhite"); } 


        /**
        *
        * Gets the color forest green.
        *
        */
        public static function ForestGreen()  { return new RgbColor("ForestGreen"); } 


        /**
        *
        * Gets the color fuchsia.
        *
        */
        public static function Fuchsia()  { return new RgbColor("Fuchsia"); } 


        /**
        *
        * Gets the color ghost white.
        *
        */
        public static function GhostWhite()  { return new RgbColor("GhostWhite"); } 


        /**
        *
        * Gets the color gold.
        *
        */
        public static function Gold()  { return new RgbColor("Gold"); } 


        /**
        *
        * Gets the color golden rod.
        *
        */
        public static function GoldenRod()  { return new RgbColor("GoldenRod"); } 


        /**
        *
        * Gets the color green yellow.
        *
        */
        public static function GreenYellow()  { return new RgbColor("GreenYellow"); } 


        /**
        *
        * Gets the color honey dew.
        *
        */
        public static function HoneyDew()  { return new RgbColor("HoneyDew"); } 


        /**
        *
        * Gets the color hot pink.
        *
        */
        public static function HotPink()  { return new RgbColor("HotPink"); } 


        /**
        *
        * Gets the color indian red.
        *
        */
        public static function IndianRed()  { return new RgbColor("IndianRed"); } 


        /**
        *
        * Gets the color indigo.
        *
        */
        public static function Indigo()  { return new RgbColor("Indigo"); } 


        /**
        *
        * Gets the color ivory.
        *
        */
        public static function Ivory()  { return new RgbColor("Ivory"); } 


        /**
        *
        * Gets the color khaki.
        *
        */
        public static function Khaki()  { return new RgbColor("Khaki"); } 


        /**
        *
        * Gets the color lavender.
        *
        */
        public static function Lavender()  { return new RgbColor("Lavender"); } 


        /**
        *
        * Gets the color lavender blush.
        *
        */
        public static function LavenderBlush()  { return new RgbColor("LavenderBlush"); } 


        /**
        *
        * Gets the color lawn Green.
        *
        */
        public static function LawnGreen()  { return new RgbColor("LawnGreen"); } 


        /**
        *
        * Gets the color lemon chiffon.
        *
        */
        public static function LemonChiffon()  { return new RgbColor("LemonChiffon"); } 


        /**
        *
        * Gets the color light blue.
        *
        */
        public static function LightBlue()  { return new RgbColor("LightBlue"); } 


        /**
        *
        * Gets the color light coral.
        *
        */
        public static function LightCoral()  { return new RgbColor("LightCoral"); } 


        /**
        *
        * Gets the color light cyan.
        *
        */
        public static function LightCyan()  { return new RgbColor("LightCyan"); } 


        /**
        *
        * Gets the color light golden rod yellow.
        *
        */
        public static function LightGoldenRodYellow()  { return new RgbColor("LightGoldenRodYellow"); } 


        /**
        *
        * Gets the color light grey.
        *
        */
        public static function LightGrey()  { return new RgbColor("LightGrey"); } 


        /**
        *
        * Gets the color light green.
        *
        */
        public static function LightGreen()  { return new RgbColor("LightGreen"); } 


        /**
        *
        * Gets the color light pink.
        *
        */
        public static function LightPink()  { return new RgbColor("LightPink"); } 


        /**
        *
        * Gets the color light salmon.
        *
        */
        public static function LightSalmon()  { return new RgbColor("LightSalmon"); } 


        /**
        *
        * Gets the color light sea green.
        *
        */
        public static function LightSeaGreen()  { return new RgbColor("LightSeaGreen"); } 


        /**
        *
        * Gets the color light sky blue.
        *
        */
        public static function LightSkyBlue()  { return new RgbColor("LightSkyBlue"); } 


        /**
        *
        * Gets the color light slate blue.
        *
        */
        public static function LightSlateBlue()  { return new RgbColor("LightSlateBlue"); } 

        /**
        *
        * Gets the color light slate gray.
        *
        */
        public static function LightSlateGray()  { return new RgbColor("LightSlateGray"); } 


        /**
        *
        * Gets the color light steel blue.
        *
        */
        public static function LightSteelBlue()  { return new RgbColor("LightSteelBlue"); } 


        /**
        *
        * Gets the color light yellow.
        *
        */
        public static function LightYellow()  { return new RgbColor("LightYellow"); } 


        /**
        *
        * Gets the color lime green.
        *
        */
        public static function LimeGreen()  { return new RgbColor("LimeGreen"); } 


        /**
        *
        * Gets the color linen.
        *
        */
        public static function Linen()  { return new RgbColor("Linen"); } 


        /**
        *
        * Gets the color maroon.
        *
        */
        public static function Maroon()  { return new RgbColor("Maroon"); } 


        /**
        *
        * Gets the color medium aqua marine.
        *
        */
        public static function MediumAquaMarine()  { return new RgbColor("MediumAquaMarine"); } 


        /**
        *
        * Gets the color medium blue.
        *
        */
        public static function MediumBlue()  { return new RgbColor("MediumBlue"); } 


        /**
        *
        * Gets the color medium orchid.
        *
        */
        public static function MediumOrchid()  { return new RgbColor("MediumOrchid"); } 


        /**
        *
        * Gets the color medium purple.
        *
        */
        public static function MediumPurple()  { return new RgbColor("MediumPurple"); } 


        /**
        *
        * Gets the color medium sea green.
        *
        */
        public static function MediumSeaGreen()  { return new RgbColor("MediumSeaGreen"); } 


        /**
        *
        * Gets the color medium slate blue.
        *
        */
        public static function MediumSlateBlue()  { return new RgbColor("MediumSlateBlue"); } 


        /**
        *
        * Gets the color medium spring green.
        *
        */
        public static function MediumSpringGreen()  { return new RgbColor("MediumSpringGreen"); } 


        /**
        *
        * Gets the color medium turquoise.
        *
        */
        public static function MediumTurquoise()  { return new RgbColor("MediumTurquoise"); } 


        /**
        *
        * Gets the color medium violet red.
        *
        */
        public static function MediumVioletRed()  { return new RgbColor("MediumVioletRed"); } 


        /**
        *
        * Gets the color midnight blue.
        *
        */
        public static function MidnightBlue()  { return new RgbColor("MidnightBlue"); } 


        /**
        *
        * Gets the color mint cream.
        *
        */
        public static function MintCream()  { return new RgbColor("MintCream"); } 

        /**
        *
        * Gets the color misty rose.
        *
        */
        public static function MistyRose()  { return new RgbColor("MistyRose"); } 

        /**
        *
        * Gets the color moccasin.
        *
        */
        public static function Moccasin()  { return new RgbColor("Moccasin"); } 


        /**
        *
        * Gets the color navajo white.
        *
        */
        public static function NavajoWhite()  { return new RgbColor("NavajoWhite"); } 


        /**
        *
        * Gets the color navy.
        *
        */
        public static function Navy()  { return new RgbColor("Navy"); } 


        /**
        *
        * Gets the color old lace.
        *
        */
        public static function OldLace()  { return new RgbColor("OldLace"); } 


        /**
        *
        * Gets the color olive.
        *
        */
        public static function Olive()  { return new RgbColor("Olive"); } 


        /**
        *
        * Gets the color olive drab.
        *
        */
        public static function OliveDrab()  { return new RgbColor("OliveDrab"); } 


        /**
        *
        * Gets the color gainsboro.
        *
        */
        public static function Gainsboro()  { return new RgbColor("Gainsboro"); } 


        /**
        *
        * Gets the color orange.
        *
        */
        public static function Orange()  { return new RgbColor("Orange"); } 


        /**
        *
        * Gets the color orange red.
        *
        */
        public static function OrangeRed()  { return new RgbColor("OrangeRed"); } 


        /**
        *
        * Gets the color orchid.
        *
        */
        public static function Orchid()  { return new RgbColor("Orchid"); } 


        /**
        *
        * Gets the color pale golden rod.
        *
        */
        public static function PaleGoldenRod()  { return new RgbColor("PaleGoldenRod"); } 


        /**
        *
        * Gets the color pale green.
        *
        */
        public static function PaleGreen()  { return new RgbColor("PaleGreen"); } 


        /**
        *
        * Gets the color pale turquoise.
        *
        */
        public static function PaleTurquoise()  { return new RgbColor("PaleTurquoise"); } 


        /**
        *
        * Gets the color pale violet red.
        *
        */
        public static function PaleVioletRed()  { return new RgbColor("PaleVioletRed"); } 


        /**
        *
        * Gets the color papaya whip.
        *
        */
        public static function PapayaWhip()  { return new RgbColor("PapayaWhip"); } 


        /**
        *
        * Gets the color peach puff.
        *
        */
        public static function PeachPuff()  { return new RgbColor("PeachPuff"); } 


        /**
        *
        * Gets the color peru.
        *
        */
        public static function Peru()  { return new RgbColor("Peru"); } 


        /**
        *
        * Gets the color pink.
        *
        */
        public static function Pink()  { return new RgbColor("Pink"); } 


        /**
        *
        * Gets the color plum.
        *
        */
        public static function Plum()  { return new RgbColor("Plum"); } 


        /**
        *
        * Gets the color powder blue.
        *
        */
        public static function PowderBlue()  { return new RgbColor("PowderBlue"); } 


        /**
        *
        * Gets the color rosy brown.
        *
        */
        public static function RosyBrown()  { return new RgbColor("RosyBrown"); } 


        /**
        *
        * Gets the color royal blue.
        *
        */
        public static function RoyalBlue()  { return new RgbColor("RoyalBlue"); } 


        /**
        *
        * Gets the color saddle brown.
        *
        */
        public static function SaddleBrown()  { return new RgbColor("SaddleBrown"); } 


        /**
        *
        * Gets the color salmon.
        *
        */
        public static function Salmon()  { return new RgbColor("Salmon"); } 


        /**
        *
        * Gets the color sandy brown.
        *
        */
        public static function SandyBrown()  { return new RgbColor("SandyBrown"); } 


        /**
        *
        * Gets the color sea green.
        *
        */
        public static function SeaGreen()  { return new RgbColor("SeaGreen"); } 


        /**
        *
        * Gets the color sea shell.
        *
        */
        public static function SeaShell()  { return new RgbColor("SeaShell"); } 


        /**
        *
        * Gets the color sienna.
        *
        */
        public static function Sienna()  { return new RgbColor("Sienna"); } 


        /**
        *
        * Gets the color sky blue.
        *
        */
        public static function SkyBlue()  { return new RgbColor("SkyBlue"); } 


        /**
        *
        * Gets the color slate blue.
        *
        */
        public static function SlateBlue()  { return new RgbColor("SlateBlue"); } 


        /**
        *
        * Gets the color slate gray.
        *
        */
        public static function SlateGray()  { return new RgbColor("SlateGray"); } 


        /**
        *
        * Gets the color snow.
        *
        */
        public static function Snow()  { return new RgbColor("Snow"); } 


        /**
        *
        * Gets the color spring green.
        *
        */
        public static function SpringGreen()  { return new RgbColor("SpringGreen"); } 


        /**
        *
        * Gets the color steel blue.
        *
        */
        public static function SteelBlue()  { return new RgbColor("SteelBlue"); } 


        /**
        *
        * Gets the color Tan.
        *
        */
        public static function tan()  { return new RgbColor("Tan"); } 


        /**
        *
        * Gets the color teal.
        *
        */
        public static function Teal()  { return new RgbColor("Teal"); } 


        /**
        *
        * Gets the color thistle.
        *
        */
        public static function Thistle()  { return new RgbColor("Thistle"); } 


        /**
        *
        * Gets the color tomato.
        *
        */
        public static function Tomato()  { return new RgbColor("Tomato"); } 


        /**
        *
        * Gets the color turquoise.
        *
        */
        public static function Turquoise()  { return new RgbColor("Turquoise"); } 

        /**
        *
        * Gets the color violet.
        *
        */
        public static function Violet()  { return new RgbColor("Violet"); } 


        /**
        *
        * Gets the color violet red.
        *
        */
        public static function VioletRed()  { return new RgbColor("VioletRed"); } 


        /**
        *
        * Gets the color wheat.
        *
        */
        public static function Wheat()  { return new RgbColor("Wheat"); } 


        /**
        *
        * Gets the color white smoke.
        *
        */
        public static function WhiteSmoke()  { return new RgbColor("WhiteSmoke"); } 


        /**
        *
        * Gets the color yellow green.
        *
        */
        public static function YellowGreen()  { return new RgbColor("YellowGreen"); } 
        public function GetjsonSerializeString()
        {
            //$jsonArray=array();
           
            if ($this->ColorString != null)
                return $this->ColorString;
            else
                return "rgb(".$this->red.",".$this->green.",".$this->blue.")";

        }

    }
?>

