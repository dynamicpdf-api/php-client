<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/FontResource.php';
include_once __DIR__ . '/Font.php';

/**
 *
 * Represents font.
 *
 */
class Font
{

    /**
     *
     * Initializes a new instance of the Font class using the font name that is present in the cloud resource
     * manager.
     *
     * @param  string $cloudResourceName The font name present in the cloud resource manager.
     */
    public function __construct(?string $cloudResourceName = null)
    {
        $this->ResourceName = $cloudResourceName;
        $this->_Name = md5(uniqid(rand(), true));
    }

    public static function CreateFont(FontResource $fontResource = null, string $resourceName = null)
    {
        $font = new Font();
        $font->_Resource = $fontResource;
        $font->ResourceName = $resourceName;

        $font->_Name = md5(uniqid(rand(), true));
        return $font;
    }

    public $_Name;
    public $_Resource;

    /**
     *
     * Gets or sets a boolean indicating whether to embed the font.
     *
     */
    public $Embed;

    /**
     *
     * Gets or sets a boolean indicating whether to subset embed the font.
     *
     */
    public $Subset;

    /**
     *
     * Gets or sets a name for the font resource.
     *
     */
    public $ResourceName;

    /**
     *
     * Gets the Times Roman core font with Latin 1 encoding.
     *
     */
    public static function TimesRoman()
    {
        if (Font::$timesRoman == null) {
            Font::$timesRoman = new Font();
        }

        Font::$timesRoman->_Name = "timesRoman";
        return Font::$timesRoman;
    }

    /**
     *
     * Gets the Times Bold core font with Latin 1 encoding.
     *
     */
    public static function TimesBold()
    {
        if (Font::$timesBold == null) {
            Font::$timesBold = new Font();
        }

        Font::$timesBold->_Name = "timesBold";
        return Font::$timesBold;
    }

    /**
     *
     * Gets the Times Italic core font with Latin 1 encoding.
     *
     */
    public static function TimesItalic()
    {
        if (Font::$timesItalic == null) {
            Font::$timesItalic = new Font();
        }

        Font::$timesItalic->_Name = "timesItalic";
        return Font::$timesItalic;
    }

    /**
     *
     * Gets the Times Bold Italic core font with Latin 1 encoding.
     *
     */
    public static function TimesBoldItalic()
    {
        if (Font::$timesBoldItalic == null) {
            Font::$timesBoldItalic = new Font();
        }

        Font::$timesBoldItalic->_Name = "timesBoldItalic";
        return Font::$timesBoldItalic;
    }

    /**
     *
     * Gets the Helvetica core font with Latin 1 encoding.
     *
     */
    public static function Helvetica()
    {
        if (Font::$helvetica == null) {
            Font::$helvetica = new Font();
        }

        Font::$helvetica->_Name = "helvetica";
        return Font::$helvetica;
    }

    /**
     *
     * Gets the Helvetica Bold core font with Latin 1 encoding.
     *
     */
    public static function HelveticaBold()
    {
        if (Font::$helveticaBold == null) {
            Font::$helveticaBold = new Font();
        }

        Font::$helveticaBold->_Name = "helveticaBold";
        return Font::$helveticaBold;
    }

    /**
     *
     * Gets the Helvetica Oblique core font with Latin 1 encoding.
     *
     */
    public static function HelveticaOblique()
    {
        if (Font::$helveticaOblique == null) {
            Font::$helveticaOblique = new Font();
        }

        Font::$helveticaOblique->_Name = "helveticaOblique";
        return Font::$helveticaOblique;
    }

    /**
     *
     * Gets the Helvetica Bold Oblique core font with Latin 1 encoding.
     *
     */
    public static function HelveticaBoldOblique()
    {
        if (Font::$helveticaBoldOblique == null) {
            Font::$helveticaBoldOblique = new Font();
        }

        Font::$helveticaBoldOblique->_Name = "helveticaBoldOblique";
        return Font::$helveticaBoldOblique;
    }

    /**
     *
     * Gets the Courier core font with Latin 1 encoding.
     *
     */
    public static function Courier()
    {
        if (Font::$courier == null) {
            Font::$courier = new Font();
        }

        Font::$courier->_Name = "courier";
        return Font::$courier;
    }

    /**
     *
     * Gets the Courier Bold core font with Latin 1 encoding.
     *
     */
    public static function CourierBold()
    {
        if (Font::$courierBold == null) {
            Font::$courierBold = new Font();
        }

        Font::$courierBold->_Name = "courierBold";
        return Font::$courierBold;
    }

    /**
     *
     * Gets the Courier Oblique core font with Latin 1 encoding.
     *
     */
    public static function CourierOblique()
    {
        if (Font::$courierOblique == null) {
            Font::$courierOblique = new Font();
        }

        Font::$courierOblique->_Name = "courierOblique";
        return Font::$courierOblique;
    }

    /**
     *
     * Gets the Courier Bold Oblique core font with Latin 1 encoding.
     *
     */
    public static function CourierBoldOblique()
    {
        if (Font::$courierBoldOblique == null) {
            Font::$courierBoldOblique = new Font();
        }

        Font::$courierBoldOblique->_Name = "courierBoldOblique";
        return Font::$courierBoldOblique;
    }

    /**
     *
     * Gets the Symbol core font.
     *
     */
    public static function Symbol()
    {if (Font::$symbol == null) {
        Font::$symbol = new Font();
    }

        Font::$symbol->_Name = "symbol";
        return Font::$symbol;

    }

    /**
     *
     * Gets the Zapf Dingbats core font.
     *
     */
    public static function ZapfDingbats()
    {
        if (Font::$zapfDingbats == null) {
            Font::$zapfDingbats = new Font();
        }

        Font::$zapfDingbats->_Name = "zapfDingbats";
        return Font::$zapfDingbats;
    }

    /**
     *
     *  Initializes a new instance of the Font class using the file path of the font and resource name.
     *
     * @param  string $filePath The file path of the font file.
     * @param  string $resourceName The resource name for the font.
     */
    public static function FromFile(string $filePath, string $resourceName = null)
    {
        $resource = new FontResource($filePath, $resourceName);
        $font = Font::CreateFont($resource, $resource->ResourceName);
        return $font;
    }

    public static function FromStream($stream, string $resourceName = null)
    {
        $resource = new FontResource($stream, $resourceName);
        return Font::CreateFont($resource, $resource->ResourceName);
    }

    private static function GetGoogleFontText(string $name, int $weight, bool $italic) :string
    {
        if($italic)
        return $name . ":" . $weight  . "italic" ;
        else
        return  $name . ":" . $weight  ;
    }

    /**  
    * Gets the font from the global storage.
    *  
    * @param string $fontName The name of the font from the global storage.
    * @return Font The font object. 
    */
    public static function Global(string $fontName)
    {            
        $font = new Font();
        $font->_Name = $fontName;
        return $font;
    }

       
    /**
    * Gets the font from the google.
    *  
    *  @param $fontName The name of the google font.
    *  @param bool|integer $bold The value can either be boolen or Font Weight ( int).
    *  @param $italic The italic property of the font.
    *  @return Font The font object. 
    */
    public static function Google(string $fontName, $bold = null , bool $italic = false):Font
    {
        $font = new Font();
        if((gettype($bold) == "boolean") && $bold == true)
        $font->_Name = Font::GetGoogleFontText($fontName, 700, $italic);
        else if(gettype($bold) == "integer")
        $font->_Name = Font::GetGoogleFontText($fontName, $bold, $italic);
        else if((gettype($bold) == "boolean") && $bold == false)
        $font->_Name = Font::GetGoogleFontText($fontName, 400, $italic);
        else $font->_Name = $fontName;
        return $font;
    }

        
    private static $timesRoman = null;
    private static $timesBold = null;
    private static $timesItalic = null;
    private static $timesBoldItalic = null;
    private static $helvetica = null;
    private static $helveticaBold = null;
    private static $helveticaOblique = null;
    private static $helveticaBoldOblique = null;
    private static $courier = null;
    private static $courierBold = null;
    private static $courierOblique = null;
    private static $courierBoldOblique = null;
    private static $symbol = null;
    private static $zapfDingbats = null;
    private $data = array();

    public function GetJsonSerializeString()
    {
        $jsonArray = array();
        if ($this->_Name != null) {
            $jsonArray["name"] = $this->_Name;
        }

        if ($this->Embed != null) {
            $jsonArray["embed"] = $this->Embed;
        }

        if ($this->Subset != null) {
            $jsonArray["subset"] = $this->Subset;
        }

        if ($this->ResourceName != null) {
            $jsonArray["resourceName"] = $this->ResourceName;
        }

        return $jsonArray;
    }

    
}
