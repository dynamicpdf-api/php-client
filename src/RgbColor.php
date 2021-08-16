<?php
include_once('EndpointException.php');
include_once('Color.php');

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
       
        /// <summary>
        /// Initializes a new instance of the <see cref="RgbColor"/> class.
        /// </summary>
        /// <param name="red">The red intensity.</param>
        /// <param name="green">The green intensity.</param>
        /// <param name="blue">The blue intensity.</param>
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

        
        
       

        /// <summary>Gets the color red.</summary>
        public static function Red()  { return new RgbColor("Red"); } 
        /// <summary>Gets the color blue.</summary>
        public static function Blue()  { return new RgbColor("Blue");  } 
        /// <summary>Gets the color green.</summary>
        public static function Green()  { return new RgbColor("Green"); } 
        /// <summary>Gets the color black.</summary>
        public static function Black()  { return new RgbColor("Black"); } 

        /// <summary>Gets the color silver.</summary>
        public static function Silver()  { return new RgbColor("Silver"); } 

        /// <summary>Gets the color dark gray.</summary>
        public static function DarkGray()  { return new RgbColor("DarkGray"); } 

        /// <summary>Gets the color gray.</summary>
        public static function Gray()  { return new RgbColor("Gray"); } 

        /// <summary>Gets the color dim gray.</summary>
        public static function DimGray()  { return new RgbColor("DimGray"); } 

        /// <summary>Gets the color white.</summary>
        public static function White()  { return new RgbColor("White"); } 

        /// <summary>Gets the color lime.</summary>
        public static function Lime()  { return new RgbColor("Lime"); } 

        /// <summary>Gets the color aqua.</summary>
        public static function Aqua()  { return new RgbColor("Aqua"); } 

        /// <summary>Gets the color purple.</summary>
        public static function Purple()  { return new RgbColor("Purple"); } 

        /// <summary>Gets the color cyan.</summary>
        public static function Cyan()  { return new RgbColor("Cyan"); } 

        /// <summary>Gets the color magenta.</summary>
        public static function Magenta()  { return new RgbColor("Magenta"); } 

        /// <summary>Gets the color yellow.</summary>
        public static function Yellow()  { return new RgbColor("Yellow"); } 

        /// <summary>Gets the color alice blue.</summary>
        public static function AliceBlue()  { return new RgbColor("AliceBlue"); } 

        /// <summary>Gets the color antique white.</summary>
        public static function AntiqueWhite()  { return new RgbColor("AntiqueWhite"); } 

        /// <summary>Gets the color aquamarine.</summary>
        public static function Aquamarine()  { return new RgbColor("Aquamarine"); } 

        /// <summary>Gets the color azure.</summary>
        public static function Azure()  { return new RgbColor("Azure"); } 
        
        /// <summary>Gets the color beige.</summary>
        public static function Beige()  { return new RgbColor("Beige"); } 

        /// <summary>Gets the color bisque.</summary>
        public static function Bisque()  { return new RgbColor("Bisque"); } 

        /// <summary>Gets the color blanched almond.</summary>
        public static function BlanchedAlmond()  { return new RgbColor("BlanchedAlmond"); } 

        /// <summary>Gets the color blue violet.</summary>
        public static function BlueViolet()  { return new RgbColor("BlueViolet"); } 

        /// <summary>Gets the color brown.</summary>
        public static function Brown()  { return new RgbColor("Brown"); } 

        /// <summary>Gets the color burly wood.</summary>
        public static function BurlyWood()  { return new RgbColor("BurlyWood"); } 

        /// <summary>Gets the color cadet blue.</summary>
        public static function CadetBlue()  { return new RgbColor("CadetBlue"); } 

        /// <summary>Gets the color chartreuse.</summary>
        public static function Chartreuse()  { return new RgbColor("Chartreuse"); } 

        /// <summary>Gets the color chocolate.</summary>
        public static function Chocolate()  { return new RgbColor("Chocolate"); } 

        /// <summary>Gets the color coral.</summary>
        public static function Coral()  { return new RgbColor("Coral"); } 

        /// <summary>Gets the color cornflower blue.</summary>
        public static function CornflowerBlue()  { return new RgbColor("CornflowerBlue"); } 

        /// <summary>Gets the color cornsilk.</summary>
        public static function Cornsilk()  { return new RgbColor("Cornsilk"); } 

        /// <summary>Gets the color crimson.</summary>
        public static function Crimson()  { return new RgbColor("Crimson"); } 

        /// <summary>Gets the color dark blue.</summary>
        public static function DarkBlue()  { return new RgbColor("DarkBlue"); } 

        /// <summary>Gets the color dark cyan.</summary>
        public static function DarkCyan()  { return new RgbColor("DarkCyan"); } 

        /// <summary>Gets the color dark golden rod.</summary>
        public static function DarkGoldenRod()  { return new RgbColor("DarkGoldenRod"); } 

        /// <summary>Gets the color dark green.</summary>
        public static function DarkGreengreen()  { return new RgbColor("DarkGreen"); } 

        /// <summary>Gets the color dark khaki.</summary>
        public static function DarkKhaki()  { return new RgbColor("DarkKhaki"); } 

        /// <summary>Gets the color dark magenta.</summary>
        public static function DarkMagenta()  { return new RgbColor("DarkMagenta"); } 

        /// <summary>Gets the color dark olive green.</summary>
        public static function DarkOliveGreen()  { return new RgbColor("DarkOliveGreen"); } 

        /// <summary>Gets the color dark orange.</summary>
        public static function DarkOrange()  { return new RgbColor("DarkOrange"); } 

        /// <summary>Gets the color dark orchid.</summary>
        public static function DarkOrchid()  { return new RgbColor("DarkOrchid"); } 

        /// <summary>Gets the color dark red.</summary>
        public static function DarkRed()  { return new RgbColor("DarkRed"); } 

        /// <summary>Gets the color dark salmon.</summary>
        public static function DarkSalmon()  { return new RgbColor("DarkSalmon"); } 

        /// <summary>Gets the color dark sea green.</summary>
        public static function DarkSeaGreen()  { return new RgbColor("DarkSeaGreen"); } 

        /// <summary>Gets the color dark slate blue.</summary>
        public static function DarkSlateBlue()  { return new RgbColor("DarkSlateBlue"); } 

        /// <summary>Gets the color dark slate gray.</summary>
        public static function DarkSlateGray()  { return new RgbColor("DarkSlateGray"); } 

        /// <summary>Gets the color dark turquoise.</summary>
        public static function DarkTurquoise()  { return new RgbColor("DarkTurquoise"); } 

        /// <summary>Gets the color dark violet.</summary>
        public static function DarkViolet()  { return new RgbColor("DarkViolet"); } 

        /// <summary>Gets the color deep pink.</summary>
        public static function DeepPink()  { return new RgbColor("DeepPink"); } 

        /// <summary>Gets the color deep sky blue.</summary>
        public static function DeepSkyBlue()  { return new RgbColor("DeepSkyBlue"); } 

        /// <summary>Gets the color dodger blue.</summary>
        public static function DodgerBlue()  { return new RgbColor("DodgerBlue"); } 

        /// <summary>Gets the color feldspar.</summary>
        public static function Feldspar()  { return new RgbColor("Feldspar"); } 

        /// <summary>Gets the color fire brick.</summary>
        public static function FireBrick()  { return new RgbColor("FireBrick"); } 

        /// <summary>Gets the color floral white.</summary>
        public static function FloralWhite()  { return new RgbColor("FloralWhite"); } 

        /// <summary>Gets the color forest green.</summary>
        public static function ForestGreen()  { return new RgbColor("ForestGreen"); } 

        /// <summary>Gets the color fuchsia.</summary>
        public static function Fuchsia()  { return new RgbColor("Fuchsia"); } 

        /// <summary>Gets the color ghost white.</summary>
        public static function GhostWhite()  { return new RgbColor("GhostWhite"); } 

        /// <summary>Gets the color gold.</summary>
        public static function Gold()  { return new RgbColor("Gold"); } 

        /// <summary>Gets the color golden rod.</summary>
        public static function GoldenRod()  { return new RgbColor("GoldenRod"); } 

        /// <summary>Gets the color green yellow.</summary>
        public static function GreenYellow()  { return new RgbColor("GreenYellow"); } 

        /// <summary>Gets the color honey dew.</summary>
        public static function HoneyDew()  { return new RgbColor("HoneyDew"); } 

        /// <summary>Gets the color hot pink.</summary>
        public static function HotPink()  { return new RgbColor("HotPink"); } 

        /// <summary>Gets the color indian red.</summary>
        public static function IndianRed()  { return new RgbColor("IndianRed"); } 

        /// <summary>Gets the color indigo.</summary>
        public static function Indigo()  { return new RgbColor("Indigo"); } 

        /// <summary>Gets the color ivory.</summary>
        public static function Ivory()  { return new RgbColor("Ivory"); } 

        /// <summary>Gets the color khaki.</summary>
        public static function Khaki()  { return new RgbColor("Khaki"); } 

        /// <summary>Gets the color lavender.</summary>
        public static function Lavender()  { return new RgbColor("Lavender"); } 

        /// <summary>Gets the color lavender blush.</summary>
        public static function LavenderBlush()  { return new RgbColor("LavenderBlush"); } 

        /// <summary>Gets the color lawn Green.</summary>
        public static function LawnGreen()  { return new RgbColor("LawnGreen"); } 

        /// <summary>Gets the color lemon chiffon.</summary>
        public static function LemonChiffon()  { return new RgbColor("LemonChiffon"); } 

        /// <summary>Gets the color light blue.</summary>
        public static function LightBlue()  { return new RgbColor("LightBlue"); } 

        /// <summary>Gets the color light coral.</summary>
        public static function LightCoral()  { return new RgbColor("LightCoral"); } 

        /// <summary>Gets the color light cyan.</summary>
        public static function LightCyan()  { return new RgbColor("LightCyan"); } 

        /// <summary>Gets the color light golden rod yellow.</summary>
        public static function LightGoldenRodYellow()  { return new RgbColor("LightGoldenRodYellow"); } 

        /// <summary>Gets the color light grey.</summary>
        public static function LightGrey()  { return new RgbColor("LightGrey"); } 

        /// <summary>Gets the color light green.</summary>
        public static function LightGreen()  { return new RgbColor("LightGreen"); } 

        /// <summary>Gets the color light pink.</summary>
        public static function LightPink()  { return new RgbColor("LightPink"); } 

        /// <summary>Gets the color light salmon.</summary>
        public static function LightSalmon()  { return new RgbColor("LightSalmon"); } 

        /// <summary>Gets the color light sea green.</summary>
        public static function LightSeaGreen()  { return new RgbColor("LightSeaGreen"); } 

        /// <summary>Gets the color light sky blue.</summary>
        public static function LightSkyBlue()  { return new RgbColor("LightSkyBlue"); } 

        /// <summary>Gets the color light slate blue.</summary>
        public static function LightSlateBlue()  { return new RgbColor("LightSlateBlue"); } 
        /// <summary>Gets the color light slate gray.</summary>
        public static function LightSlateGray()  { return new RgbColor("LightSlateGray"); } 

        /// <summary>Gets the color light steel blue.</summary>
        public static function LightSteelBlue()  { return new RgbColor("LightSteelBlue"); } 

        /// <summary>Gets the color light yellow.</summary>
        public static function LightYellow()  { return new RgbColor("LightYellow"); } 

        /// <summary>Gets the color lime green.</summary>
        public static function LimeGreen()  { return new RgbColor("LimeGreen"); } 

        /// <summary>Gets the color linen.</summary>
        public static function Linen()  { return new RgbColor("Linen"); } 

        /// <summary>Gets the color maroon.</summary>
        public static function Maroon()  { return new RgbColor("Maroon"); } 

        /// <summary>Gets the color medium aqua marine.</summary>
        public static function MediumAquaMarine()  { return new RgbColor("MediumAquaMarine"); } 

        /// <summary>Gets the color medium blue.</summary>
        public static function MediumBlue()  { return new RgbColor("MediumBlue"); } 

        /// <summary>Gets the color medium orchid.</summary>
        public static function MediumOrchid()  { return new RgbColor("MediumOrchid"); } 

        /// <summary>Gets the color medium purple.</summary>
        public static function MediumPurple()  { return new RgbColor("MediumPurple"); } 

        /// <summary>Gets the color medium sea green.</summary>
        public static function MediumSeaGreen()  { return new RgbColor("MediumSeaGreen"); } 

        /// <summary>Gets the color medium slate blue.</summary>
        public static function MediumSlateBlue()  { return new RgbColor("MediumSlateBlue"); } 

        /// <summary>Gets the color medium spring green.</summary>
        public static function MediumSpringGreen()  { return new RgbColor("MediumSpringGreen"); } 

        /// <summary>Gets the color medium turquoise.</summary>
        public static function MediumTurquoise()  { return new RgbColor("MediumTurquoise"); } 

        /// <summary>Gets the color medium violet red.</summary>
        public static function MediumVioletRed()  { return new RgbColor("MediumVioletRed"); } 

        /// <summary>Gets the color midnight blue.</summary>
        public static function MidnightBlue()  { return new RgbColor("MidnightBlue"); } 

        /// <summary>Gets the color mint cream.</summary>
        public static function MintCream()  { return new RgbColor("MintCream"); } 
        /// <summary>Gets the color misty rose.</summary>
        public static function MistyRose()  { return new RgbColor("MistyRose"); } 
        /// <summary>Gets the color moccasin.</summary>
        public static function Moccasin()  { return new RgbColor("Moccasin"); } 

        /// <summary>Gets the color navajo white.</summary>
        public static function NavajoWhite()  { return new RgbColor("NavajoWhite"); } 

        /// <summary>Gets the color navy.</summary>
        public static function Navy()  { return new RgbColor("Navy"); } 

        /// <summary>Gets the color old lace.</summary>
        public static function OldLace()  { return new RgbColor("OldLace"); } 

        /// <summary>Gets the color olive.</summary>
        public static function Olive()  { return new RgbColor("Olive"); } 

        /// <summary>Gets the color olive drab.</summary>
        public static function OliveDrab()  { return new RgbColor("OliveDrab"); } 

        /// <summary>Gets the color gainsboro.</summary>
        public static function Gainsboro()  { return new RgbColor("Gainsboro"); } 

        /// <summary>Gets the color orange.</summary>
        public static function Orange()  { return new RgbColor("Orange"); } 

        /// <summary>Gets the color orange red.</summary>
        public static function OrangeRed()  { return new RgbColor("OrangeRed"); } 

        /// <summary>Gets the color orchid.</summary>
        public static function Orchid()  { return new RgbColor("Orchid"); } 

        /// <summary>Gets the color pale golden rod.</summary>
        public static function PaleGoldenRod()  { return new RgbColor("PaleGoldenRod"); } 

        /// <summary>Gets the color pale green.</summary>
        public static function PaleGreen()  { return new RgbColor("PaleGreen"); } 

        /// <summary>Gets the color pale turquoise.</summary>
        public static function PaleTurquoise()  { return new RgbColor("PaleTurquoise"); } 

        /// <summary>Gets the color pale violet red.</summary>
        public static function PaleVioletRed()  { return new RgbColor("PaleVioletRed"); } 

        /// <summary>Gets the color papaya whip.</summary>
        public static function PapayaWhip()  { return new RgbColor("PapayaWhip"); } 

        /// <summary>Gets the color peach puff.</summary>
        public static function PeachPuff()  { return new RgbColor("PeachPuff"); } 

        /// <summary>Gets the color peru.</summary>
        public static function Peru()  { return new RgbColor("Peru"); } 

        /// <summary>Gets the color pink.</summary>
        public static function Pink()  { return new RgbColor("Pink"); } 

        /// <summary>Gets the color plum.</summary>
        public static function Plum()  { return new RgbColor("Plum"); } 

        /// <summary>Gets the color powder blue.</summary>
        public static function PowderBlue()  { return new RgbColor("PowderBlue"); } 

        /// <summary>Gets the color rosy brown.</summary>
        public static function RosyBrown()  { return new RgbColor("RosyBrown"); } 

        /// <summary>Gets the color royal blue.</summary>
        public static function RoyalBlue()  { return new RgbColor("RoyalBlue"); } 

        /// <summary>Gets the color saddle brown.</summary>
        public static function SaddleBrown()  { return new RgbColor("SaddleBrown"); } 

        /// <summary>Gets the color salmon.</summary>
        public static function Salmon()  { return new RgbColor("Salmon"); } 

        /// <summary>Gets the color sandy brown.</summary>
        public static function SandyBrown()  { return new RgbColor("SandyBrown"); } 

        /// <summary>Gets the color sea green.</summary>
        public static function SeaGreen()  { return new RgbColor("SeaGreen"); } 

        /// <summary>Gets the color sea shell.</summary>
        public static function SeaShell()  { return new RgbColor("SeaShell"); } 

        /// <summary>Gets the color sienna.</summary>
        public static function Sienna()  { return new RgbColor("Sienna"); } 

        /// <summary>Gets the color sky blue.</summary>
        public static function SkyBlue()  { return new RgbColor("SkyBlue"); } 

        /// <summary>Gets the color slate blue.</summary>
        public static function SlateBlue()  { return new RgbColor("SlateBlue"); } 

        /// <summary>Gets the color slate gray.</summary>
        public static function SlateGray()  { return new RgbColor("SlateGray"); } 

        /// <summary>Gets the color snow.</summary>
        public static function Snow()  { return new RgbColor("Snow"); } 

        /// <summary>Gets the color spring green.</summary>
        public static function SpringGreen()  { return new RgbColor("SpringGreen"); } 

        /// <summary>Gets the color steel blue.</summary>
        public static function SteelBlue()  { return new RgbColor("SteelBlue"); } 

        /// <summary>Gets the color Tan.</summary>
        public static function tan()  { return new RgbColor("Tan"); } 

        /// <summary>Gets the color teal.</summary>
        public static function Teal()  { return new RgbColor("Teal"); } 

        /// <summary>Gets the color thistle.</summary>
        public static function Thistle()  { return new RgbColor("Thistle"); } 

        /// <summary>Gets the color tomato.</summary>
        public static function Tomato()  { return new RgbColor("Tomato"); } 

        /// <summary>Gets the color turquoise.</summary>
        public static function Turquoise()  { return new RgbColor("Turquoise"); } 
        /// <summary>Gets the color violet.</summary>
        public static function Violet()  { return new RgbColor("Violet"); } 

        /// <summary>Gets the color violet red.</summary>
        public static function VioletRed()  { return new RgbColor("VioletRed"); } 

        /// <summary>Gets the color wheat.</summary>
        public static function Wheat()  { return new RgbColor("Wheat"); } 

        /// <summary>Gets the color white smoke.</summary>
        public static function WhiteSmoke()  { return new RgbColor("WhiteSmoke"); } 

        /// <summary>Gets the color yellow green.</summary>
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
