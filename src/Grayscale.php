<?php

include_once __DIR__ . './Color.php';

/**
 *
 * Represents a grayscale color.
 *
 */
class Grayscale extends Color
{
    private $colorString;
    private $grayLevel;

    /**
     *
     *  Initializes a new instance of the  Grayscale class.
     *
     * @param  float $grayLevel The gray level for the color.
     */
    public function __construct(float $grayLevel = 0)
    {

        $this->grayLevel = $grayLevel;
        $this->ColorString = "gray(" . $grayLevel . ")";

    }

    public static function CreateGrayscale(string $colorString = null)
    {
        $grayscale = new Grayscale();
        $grayscale->ColorString = $colorString;
        return $grayscale;
    }

    /**
     *
     * Gets the color black.
     *
     */
    public static function Black()
    {return new Grayscale(0);}

    /**
     *
     * Gets the color white.
     *
     */
    public static function White()
    {return new Grayscale(1);}

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
