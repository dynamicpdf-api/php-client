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

        
      
       

        /**
        *
        *  Initializes a new instance of the RgbColor class. 
        *
        * @param  float $red The red intensity.
        * @param  float $green The green intensity.
        * @param  float $blue The blue intensity.
        */
        public   function __construct(float $red = 0, float $green = 0, float $blue = 0)
        {
           
            if ($red < 0.0 || $red > 1.0 || $green < 0.0 || $green > 1.0 || $blue < 0.0 || $blue > 1.0)
            {
                throw new EndpointException("RGB values must be from 0.0 to 1.0.");
            }
           
            $this->red = $red;
            $this->green = $green;
            $this->blue = $blue;
            $this->ColorString ="rgb(".$red.",".$green.",".$blue.")";
           
        }

        
        public static function  CreateRgbColor(?string $colorString =null) 
        { 
            $rgbColor = new RgbColor();
            $rgbColor->ColorString = $colorString; 
            return $rgbColor;
        }
       
        public  $ColorString;


        /**
        *
        * Gets the color red.
        *
        */
        public static function Red()  { return RgbColor::CreateRgbColor("Red"); } 

        /**
        *
        * Gets the color blue.
        *
        */
        public static function Blue()  { return RgbColor::CreateRgbColor("Blue");  } 

        /**
        *
        * Gets the color green.
        *
        */
        public static function Green()  { return RgbColor::CreateRgbColor("Green"); } 

        /**
        *
        * Gets the color black.
        *
        */
        public static function Black()  { return RgbColor::CreateRgbColor("Black"); } 


        /**
        *
        * Gets the color silver.
        *
        */
        public static function Silver()  { return RgbColor::CreateRgbColor("Silver"); } 


        /**
        *
        * Gets the color dark gray.
        *
        */
        public static function DarkGray()  { return RgbColor::CreateRgbColor("DarkGray"); } 


        /**
        *
        * Gets the color gray.
        *
        */
        public static function Gray()  { return RgbColor::CreateRgbColor("Gray"); } 


        /**
        *
        * Gets the color dim gray.
        *
        */
        public static function DimGray()  { return RgbColor::CreateRgbColor("DimGray"); } 


        /**
        *
        * Gets the color white.
        *
        */
        public static function White()  { return RgbColor::CreateRgbColor("White"); } 


        /**
        *
        * Gets the color lime.
        *
        */
        public static function Lime()  { return RgbColor::CreateRgbColor("Lime"); } 


        /**
        *
        * Gets the color aqua.
        *
        */
        public static function Aqua()  { return RgbColor::CreateRgbColor("Aqua"); } 


        /**
        *
        * Gets the color purple.
        *
        */
        public static function Purple()  { return RgbColor::CreateRgbColor("Purple"); } 


        /**
        *
        * Gets the color cyan.
        *
        */
        public static function Cyan()  { return RgbColor::CreateRgbColor("Cyan"); } 


        /**
        *
        * Gets the color magenta.
        *
        */
        public static function Magenta()  { return RgbColor::CreateRgbColor("Magenta"); } 


        /**
        *
        * Gets the color yellow.
        *
        */
        public static function Yellow()  { return RgbColor::CreateRgbColor("Yellow"); } 


        /**
        *
        * Gets the color alice blue.
        *
        */
        public static function AliceBlue()  { return RgbColor::CreateRgbColor("AliceBlue"); } 


        /**
        *
        * Gets the color antique white.
        *
        */
        public static function AntiqueWhite()  { return RgbColor::CreateRgbColor("AntiqueWhite"); } 


        /**
        *
        * Gets the color aquamarine.
        *
        */
        public static function Aquamarine()  { return RgbColor::CreateRgbColor("Aquamarine"); } 


        /**
        *
        * Gets the color azure.
        *
        */
        public static function Azure()  { return RgbColor::CreateRgbColor("Azure"); } 
        

        /**
        *
        * Gets the color beige.
        *
        */
        public static function Beige()  { return RgbColor::CreateRgbColor("Beige"); } 


        /**
        *
        * Gets the color bisque.
        *
        */
        public static function Bisque()  { return RgbColor::CreateRgbColor("Bisque"); } 


        /**
        *
        * Gets the color blanched almond.
        *
        */
        public static function BlanchedAlmond()  { return RgbColor::CreateRgbColor("BlanchedAlmond"); } 


        /**
        *
        * Gets the color blue violet.
        *
        */
        public static function BlueViolet()  { return RgbColor::CreateRgbColor("BlueViolet"); } 


        /**
        *
        * Gets the color brown.
        *
        */
        public static function Brown()  { return RgbColor::CreateRgbColor("Brown"); } 


        /**
        *
        * Gets the color burly wood.
        *
        */
        public static function BurlyWood()  { return RgbColor::CreateRgbColor("BurlyWood"); } 


        /**
        *
        * Gets the color cadet blue.
        *
        */
        public static function CadetBlue()  { return RgbColor::CreateRgbColor("CadetBlue"); } 


        /**
        *
        * Gets the color chartreuse.
        *
        */
        public static function Chartreuse()  { return RgbColor::CreateRgbColor("Chartreuse"); } 


        /**
        *
        * Gets the color chocolate.
        *
        */
        public static function Chocolate()  { return RgbColor::CreateRgbColor("Chocolate"); } 


        /**
        *
        * Gets the color coral.
        *
        */
        public static function Coral()  { return RgbColor::CreateRgbColor("Coral"); } 


        /**
        *
        * Gets the color cornflower blue.
        *
        */
        public static function CornflowerBlue()  { return RgbColor::CreateRgbColor("CornflowerBlue"); } 


        /**
        *
        * Gets the color cornsilk.
        *
        */
        public static function Cornsilk()  { return RgbColor::CreateRgbColor("Cornsilk"); } 


        /**
        *
        * Gets the color crimson.
        *
        */
        public static function Crimson()  { return RgbColor::CreateRgbColor("Crimson"); } 


        /**
        *
        * Gets the color dark blue.
        *
        */
        public static function DarkBlue()  { return RgbColor::CreateRgbColor("DarkBlue"); } 


        /**
        *
        * Gets the color dark cyan.
        *
        */
        public static function DarkCyan()  { return RgbColor::CreateRgbColor("DarkCyan"); } 


        /**
        *
        * Gets the color dark golden rod.
        *
        */
        public static function DarkGoldenRod()  { return RgbColor::CreateRgbColor("DarkGoldenRod"); } 


        /**
        *
        * Gets the color dark green.
        *
        */
        public static function DarkGreengreen()  { return RgbColor::CreateRgbColor("DarkGreen"); } 


        /**
        *
        * Gets the color dark khaki.
        *
        */
        public static function DarkKhaki()  { return RgbColor::CreateRgbColor("DarkKhaki"); } 


        /**
        *
        * Gets the color dark magenta.
        *
        */
        public static function DarkMagenta()  { return RgbColor::CreateRgbColor("DarkMagenta"); } 


        /**
        *
        * Gets the color dark olive green.
        *
        */
        public static function DarkOliveGreen()  { return RgbColor::CreateRgbColor("DarkOliveGreen"); } 


        /**
        *
        * Gets the color dark orange.
        *
        */
        public static function DarkOrange()  { return RgbColor::CreateRgbColor("DarkOrange"); } 


        /**
        *
        * Gets the color dark orchid.
        *
        */
        public static function DarkOrchid()  { return RgbColor::CreateRgbColor("DarkOrchid"); } 


        /**
        *
        * Gets the color dark red.
        *
        */
        public static function DarkRed()  { return RgbColor::CreateRgbColor("DarkRed"); } 


        /**
        *
        * Gets the color dark salmon.
        *
        */
        public static function DarkSalmon()  { return RgbColor::CreateRgbColor("DarkSalmon"); } 


        /**
        *
        * Gets the color dark sea green.
        *
        */
        public static function DarkSeaGreen()  { return RgbColor::CreateRgbColor("DarkSeaGreen"); } 


        /**
        *
        * Gets the color dark slate blue.
        *
        */
        public static function DarkSlateBlue()  { return RgbColor::CreateRgbColor("DarkSlateBlue"); } 


        /**
        *
        * Gets the color dark slate gray.
        *
        */
        public static function DarkSlateGray()  { return RgbColor::CreateRgbColor("DarkSlateGray"); } 


        /**
        *
        * Gets the color dark turquoise.
        *
        */
        public static function DarkTurquoise()  { return RgbColor::CreateRgbColor("DarkTurquoise"); } 


        /**
        *
        * Gets the color dark violet.
        *
        */
        public static function DarkViolet()  { return RgbColor::CreateRgbColor("DarkViolet"); } 


        /**
        *
        * Gets the color deep pink.
        *
        */
        public static function DeepPink()  { return RgbColor::CreateRgbColor("DeepPink"); } 


        /**
        *
        * Gets the color deep sky blue.
        *
        */
        public static function DeepSkyBlue()  { return RgbColor::CreateRgbColor("DeepSkyBlue"); } 


        /**
        *
        * Gets the color dodger blue.
        *
        */
        public static function DodgerBlue()  { return RgbColor::CreateRgbColor("DodgerBlue"); } 


        /**
        *
        * Gets the color feldspar.
        *
        */
        public static function Feldspar()  { return RgbColor::CreateRgbColor("Feldspar"); } 


        /**
        *
        * Gets the color fire brick.
        *
        */
        public static function FireBrick()  { return RgbColor::CreateRgbColor("FireBrick"); } 


        /**
        *
        * Gets the color floral white.
        *
        */
        public static function FloralWhite()  { return RgbColor::CreateRgbColor("FloralWhite"); } 


        /**
        *
        * Gets the color forest green.
        *
        */
        public static function ForestGreen()  { return RgbColor::CreateRgbColor("ForestGreen"); } 


        /**
        *
        * Gets the color fuchsia.
        *
        */
        public static function Fuchsia()  { return RgbColor::CreateRgbColor("Fuchsia"); } 


        /**
        *
        * Gets the color ghost white.
        *
        */
        public static function GhostWhite()  { return RgbColor::CreateRgbColor("GhostWhite"); } 


        /**
        *
        * Gets the color gold.
        *
        */
        public static function Gold()  { return RgbColor::CreateRgbColor("Gold"); } 


        /**
        *
        * Gets the color golden rod.
        *
        */
        public static function GoldenRod()  { return RgbColor::CreateRgbColor("GoldenRod"); } 


        /**
        *
        * Gets the color green yellow.
        *
        */
        public static function GreenYellow()  { return RgbColor::CreateRgbColor("GreenYellow"); } 


        /**
        *
        * Gets the color honey dew.
        *
        */
        public static function HoneyDew()  { return RgbColor::CreateRgbColor("HoneyDew"); } 


        /**
        *
        * Gets the color hot pink.
        *
        */
        public static function HotPink()  { return RgbColor::CreateRgbColor("HotPink"); } 


        /**
        *
        * Gets the color indian red.
        *
        */
        public static function IndianRed()  { return RgbColor::CreateRgbColor("IndianRed"); } 


        /**
        *
        * Gets the color indigo.
        *
        */
        public static function Indigo()  { return RgbColor::CreateRgbColor("Indigo"); } 


        /**
        *
        * Gets the color ivory.
        *
        */
        public static function Ivory()  { return RgbColor::CreateRgbColor("Ivory"); } 


        /**
        *
        * Gets the color khaki.
        *
        */
        public static function Khaki()  { return RgbColor::CreateRgbColor("Khaki"); } 


        /**
        *
        * Gets the color lavender.
        *
        */
        public static function Lavender()  { return RgbColor::CreateRgbColor("Lavender"); } 


        /**
        *
        * Gets the color lavender blush.
        *
        */
        public static function LavenderBlush()  { return RgbColor::CreateRgbColor("LavenderBlush"); } 


        /**
        *
        * Gets the color lawn Green.
        *
        */
        public static function LawnGreen()  { return RgbColor::CreateRgbColor("LawnGreen"); } 


        /**
        *
        * Gets the color lemon chiffon.
        *
        */
        public static function LemonChiffon()  { return RgbColor::CreateRgbColor("LemonChiffon"); } 


        /**
        *
        * Gets the color light blue.
        *
        */
        public static function LightBlue()  { return RgbColor::CreateRgbColor("LightBlue"); } 


        /**
        *
        * Gets the color light coral.
        *
        */
        public static function LightCoral()  { return RgbColor::CreateRgbColor("LightCoral"); } 


        /**
        *
        * Gets the color light cyan.
        *
        */
        public static function LightCyan()  { return RgbColor::CreateRgbColor("LightCyan"); } 


        /**
        *
        * Gets the color light golden rod yellow.
        *
        */
        public static function LightGoldenRodYellow()  { return RgbColor::CreateRgbColor("LightGoldenRodYellow"); } 


        /**
        *
        * Gets the color light grey.
        *
        */
        public static function LightGrey()  { return RgbColor::CreateRgbColor("LightGrey"); } 


        /**
        *
        * Gets the color light green.
        *
        */
        public static function LightGreen()  { return RgbColor::CreateRgbColor("LightGreen"); } 


        /**
        *
        * Gets the color light pink.
        *
        */
        public static function LightPink()  { return RgbColor::CreateRgbColor("LightPink"); } 


        /**
        *
        * Gets the color light salmon.
        *
        */
        public static function LightSalmon()  { return RgbColor::CreateRgbColor("LightSalmon"); } 


        /**
        *
        * Gets the color light sea green.
        *
        */
        public static function LightSeaGreen()  { return RgbColor::CreateRgbColor("LightSeaGreen"); } 


        /**
        *
        * Gets the color light sky blue.
        *
        */
        public static function LightSkyBlue()  { return RgbColor::CreateRgbColor("LightSkyBlue"); } 


        /**
        *
        * Gets the color light slate blue.
        *
        */
        public static function LightSlateBlue()  { return RgbColor::CreateRgbColor("LightSlateBlue"); } 

        /**
        *
        * Gets the color light slate gray.
        *
        */
        public static function LightSlateGray()  { return RgbColor::CreateRgbColor("LightSlateGray"); } 


        /**
        *
        * Gets the color light steel blue.
        *
        */
        public static function LightSteelBlue()  { return RgbColor::CreateRgbColor("LightSteelBlue"); } 


        /**
        *
        * Gets the color light yellow.
        *
        */
        public static function LightYellow()  { return RgbColor::CreateRgbColor("LightYellow"); } 


        /**
        *
        * Gets the color lime green.
        *
        */
        public static function LimeGreen()  { return RgbColor::CreateRgbColor("LimeGreen"); } 


        /**
        *
        * Gets the color linen.
        *
        */
        public static function Linen()  { return RgbColor::CreateRgbColor("Linen"); } 


        /**
        *
        * Gets the color maroon.
        *
        */
        public static function Maroon()  { return RgbColor::CreateRgbColor("Maroon"); } 


        /**
        *
        * Gets the color medium aqua marine.
        *
        */
        public static function MediumAquaMarine()  { return RgbColor::CreateRgbColor("MediumAquaMarine"); } 


        /**
        *
        * Gets the color medium blue.
        *
        */
        public static function MediumBlue()  { return RgbColor::CreateRgbColor("MediumBlue"); } 


        /**
        *
        * Gets the color medium orchid.
        *
        */
        public static function MediumOrchid()  { return RgbColor::CreateRgbColor("MediumOrchid"); } 


        /**
        *
        * Gets the color medium purple.
        *
        */
        public static function MediumPurple()  { return RgbColor::CreateRgbColor("MediumPurple"); } 


        /**
        *
        * Gets the color medium sea green.
        *
        */
        public static function MediumSeaGreen()  { return RgbColor::CreateRgbColor("MediumSeaGreen"); } 


        /**
        *
        * Gets the color medium slate blue.
        *
        */
        public static function MediumSlateBlue()  { return RgbColor::CreateRgbColor("MediumSlateBlue"); } 


        /**
        *
        * Gets the color medium spring green.
        *
        */
        public static function MediumSpringGreen()  { return RgbColor::CreateRgbColor("MediumSpringGreen"); } 


        /**
        *
        * Gets the color medium turquoise.
        *
        */
        public static function MediumTurquoise()  { return RgbColor::CreateRgbColor("MediumTurquoise"); } 


        /**
        *
        * Gets the color medium violet red.
        *
        */
        public static function MediumVioletRed()  { return RgbColor::CreateRgbColor("MediumVioletRed"); } 


        /**
        *
        * Gets the color midnight blue.
        *
        */
        public static function MidnightBlue()  { return RgbColor::CreateRgbColor("MidnightBlue"); } 


        /**
        *
        * Gets the color mint cream.
        *
        */
        public static function MintCream()  { return RgbColor::CreateRgbColor("MintCream"); } 

        /**
        *
        * Gets the color misty rose.
        *
        */
        public static function MistyRose()  { return RgbColor::CreateRgbColor("MistyRose"); } 

        /**
        *
        * Gets the color moccasin.
        *
        */
        public static function Moccasin()  { return RgbColor::CreateRgbColor("Moccasin"); } 


        /**
        *
        * Gets the color navajo white.
        *
        */
        public static function NavajoWhite()  { return RgbColor::CreateRgbColor("NavajoWhite"); } 


        /**
        *
        * Gets the color navy.
        *
        */
        public static function Navy()  { return RgbColor::CreateRgbColor("Navy"); } 


        /**
        *
        * Gets the color old lace.
        *
        */
        public static function OldLace()  { return RgbColor::CreateRgbColor("OldLace"); } 


        /**
        *
        * Gets the color olive.
        *
        */
        public static function Olive()  { return RgbColor::CreateRgbColor("Olive"); } 


        /**
        *
        * Gets the color olive drab.
        *
        */
        public static function OliveDrab()  { return RgbColor::CreateRgbColor("OliveDrab"); } 


        /**
        *
        * Gets the color gainsboro.
        *
        */
        public static function Gainsboro()  { return RgbColor::CreateRgbColor("Gainsboro"); } 


        /**
        *
        * Gets the color orange.
        *
        */
        public static function Orange()  { return RgbColor::CreateRgbColor("Orange"); } 


        /**
        *
        * Gets the color orange red.
        *
        */
        public static function OrangeRed()  { return RgbColor::CreateRgbColor("OrangeRed"); } 


        /**
        *
        * Gets the color orchid.
        *
        */
        public static function Orchid()  { return RgbColor::CreateRgbColor("Orchid"); } 


        /**
        *
        * Gets the color pale golden rod.
        *
        */
        public static function PaleGoldenRod()  { return RgbColor::CreateRgbColor("PaleGoldenRod"); } 


        /**
        *
        * Gets the color pale green.
        *
        */
        public static function PaleGreen()  { return RgbColor::CreateRgbColor("PaleGreen"); } 


        /**
        *
        * Gets the color pale turquoise.
        *
        */
        public static function PaleTurquoise()  { return RgbColor::CreateRgbColor("PaleTurquoise"); } 


        /**
        *
        * Gets the color pale violet red.
        *
        */
        public static function PaleVioletRed()  { return RgbColor::CreateRgbColor("PaleVioletRed"); } 


        /**
        *
        * Gets the color papaya whip.
        *
        */
        public static function PapayaWhip()  { return RgbColor::CreateRgbColor("PapayaWhip"); } 


        /**
        *
        * Gets the color peach puff.
        *
        */
        public static function PeachPuff()  { return RgbColor::CreateRgbColor("PeachPuff"); } 


        /**
        *
        * Gets the color peru.
        *
        */
        public static function Peru()  { return RgbColor::CreateRgbColor("Peru"); } 


        /**
        *
        * Gets the color pink.
        *
        */
        public static function Pink()  { return RgbColor::CreateRgbColor("Pink"); } 


        /**
        *
        * Gets the color plum.
        *
        */
        public static function Plum()  { return RgbColor::CreateRgbColor("Plum"); } 


        /**
        *
        * Gets the color powder blue.
        *
        */
        public static function PowderBlue()  { return RgbColor::CreateRgbColor("PowderBlue"); } 


        /**
        *
        * Gets the color rosy brown.
        *
        */
        public static function RosyBrown()  { return RgbColor::CreateRgbColor("RosyBrown"); } 


        /**
        *
        * Gets the color royal blue.
        *
        */
        public static function RoyalBlue()  { return RgbColor::CreateRgbColor("RoyalBlue"); } 


        /**
        *
        * Gets the color saddle brown.
        *
        */
        public static function SaddleBrown()  { return RgbColor::CreateRgbColor("SaddleBrown"); } 


        /**
        *
        * Gets the color salmon.
        *
        */
        public static function Salmon()  { return RgbColor::CreateRgbColor("Salmon"); } 


        /**
        *
        * Gets the color sandy brown.
        *
        */
        public static function SandyBrown()  { return RgbColor::CreateRgbColor("SandyBrown"); } 


        /**
        *
        * Gets the color sea green.
        *
        */
        public static function SeaGreen()  { return RgbColor::CreateRgbColor("SeaGreen"); } 


        /**
        *
        * Gets the color sea shell.
        *
        */
        public static function SeaShell()  { return RgbColor::CreateRgbColor("SeaShell"); } 


        /**
        *
        * Gets the color sienna.
        *
        */
        public static function Sienna()  { return RgbColor::CreateRgbColor("Sienna"); } 


        /**
        *
        * Gets the color sky blue.
        *
        */
        public static function SkyBlue()  { return RgbColor::CreateRgbColor("SkyBlue"); } 


        /**
        *
        * Gets the color slate blue.
        *
        */
        public static function SlateBlue()  { return RgbColor::CreateRgbColor("SlateBlue"); } 


        /**
        *
        * Gets the color slate gray.
        *
        */
        public static function SlateGray()  { return RgbColor::CreateRgbColor("SlateGray"); } 


        /**
        *
        * Gets the color snow.
        *
        */
        public static function Snow()  { return RgbColor::CreateRgbColor("Snow"); } 


        /**
        *
        * Gets the color spring green.
        *
        */
        public static function SpringGreen()  { return RgbColor::CreateRgbColor("SpringGreen"); } 


        /**
        *
        * Gets the color steel blue.
        *
        */
        public static function SteelBlue()  { return RgbColor::CreateRgbColor("SteelBlue"); } 


        /**
        *
        * Gets the color Tan.
        *
        */
        public static function tan()  { return RgbColor::CreateRgbColor("Tan"); } 


        /**
        *
        * Gets the color teal.
        *
        */
        public static function Teal()  { return RgbColor::CreateRgbColor("Teal"); } 


        /**
        *
        * Gets the color thistle.
        *
        */
        public static function Thistle()  { return RgbColor::CreateRgbColor("Thistle"); } 


        /**
        *
        * Gets the color tomato.
        *
        */
        public static function Tomato()  { return RgbColor::CreateRgbColor("Tomato"); } 


        /**
        *
        * Gets the color turquoise.
        *
        */
        public static function Turquoise()  { return RgbColor::CreateRgbColor("Turquoise"); } 

        /**
        *
        * Gets the color violet.
        *
        */
        public static function Violet()  { return RgbColor::CreateRgbColor("Violet"); } 


        /**
        *
        * Gets the color violet red.
        *
        */
        public static function VioletRed()  { return RgbColor::CreateRgbColor("VioletRed"); } 


        /**
        *
        * Gets the color wheat.
        *
        */
        public static function Wheat()  { return RgbColor::CreateRgbColor("Wheat"); } 


        /**
        *
        * Gets the color white smoke.
        *
        */
        public static function WhiteSmoke()  { return RgbColor::CreateRgbColor("WhiteSmoke"); } 


        /**
        *
        * Gets the color yellow green.
        *
        */
        public static function YellowGreen()  { return RgbColor::CreateRgbColor("YellowGreen"); } 

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

