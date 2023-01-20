<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . '/BarcodeElement.php';

use DynamicPDF\Api\Font;

/**
 *
 * Base class from which barcode page elements that display text are derived.
 *
 */
abstract class TextBarcodeElement extends BarcodeElement
{
    public function __construct(string $value, string $placement, float $xOffset, float $yOffset)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
    }

    /**
     *
     * Gets or sets the color of the text.
     *
     */
    public $TextColor = null;

    /**
     *
     * Gets or sets the font size to use when displaying the text.
     *
     */
    public $FontSize;

    /**
     *
     * Gets or sets a value indicating if the value should be placed as text below the barcode.
     *
     */
    public $ShowText = "null";
    public $_Resource;
    public $_TextFont;
    public $_FontName;

    /**
     *
     * Gets or sets the font to use when displaying the text.
     *
     */
    public function Font(Font $value)
    {
        $this->_TextFont = $value;
        $this->_FontName = $this->_TextFont->_Name;
        $this->_Resource = $this->_TextFont->_Resource;
    }
    public function GetFont()
    {
        return $this->_TextFont;
    }

}
