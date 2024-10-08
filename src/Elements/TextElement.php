<?php
namespace DynamicPDF\Api\Elements;

use DynamicPDF\Api\Font;

include_once __DIR__ . '/Element.php';
include_once __DIR__ . '/ElementType.php';

/**
 *
 * Represents a text element.
 *
 * This class can be used to place text on a page.
 *
 */
class TextElement extends Element
{

    /**
     *
     *  Initializes a new instance of the TextElement class.
     *
     * @param  string $value Text to display in the text element.
     * @param  string $placement The placement of the text element on the page.
     * @param  float $xOffset X coordinate of the text element.
     * @param  float $yOffset Y coordinate of the text element.
     */
    public function __construct(string $value, string $placement = ElementPlacement::TopLeft, float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
        $this->Text = $value;
    }

    public $_Type = ElementType::Text;

    /**
     *
     *  Gets or sets the Color object to use for the text of the text element.
     *
     */
    public $Color = null;

    /**
     *
     * Gets or sets the font size for the text of the text element.
     *
     */
    public $FontSize;

    /**
     *
     * Gets or sets the text to display in the text element.
     *
     */
    public $Text;

    /**
     *
     *  Gets or sets the Font object used to specify the font of the text for the text element.
     *
     */
    public function Font(Font $value)
    {
        $this->_TextFont = $value;
        $this->_FontName = $this->_TextFont->_Name;
        $this->_Resource = $this->_TextFont->_Resource;
    }

    public $_Resource;
    public $_TextFont;
    public $_FontName;
    public function GetJsonSerializeString()
    {

        $jsonArray = array();

        $jsonArray["type"] = "text";

        if ($this->_FontName != null) {
            $jsonArray["font"] = $this->_FontName;
        }

        $jsonArray["text"] = $this->Text;

        if (($this->Color != null) && ($this->Color->_ColorString != null)) {
            $jsonArray["color"] = $this->Color->_ColorString;
        }

        if ($this->FontSize != null) {
            $jsonArray["fontSize"] = $this->FontSize;
        }

// ---------------------------------

        if ($this->Placement != null) {
            $jsonArray['placement'] = ($this->Placement);
        }

        if ($this->XOffset != null) {
            $jsonArray['xOffset'] = $this->XOffset;
        }

        if ($this->YOffset != null) {
            $jsonArray['yOffset'] = $this->YOffset;
        }

        if ($this->EvenPages !== null) {
            $jsonArray['evenPages'] = $this->EvenPages;
        }

        if ($this->OddPages !== null) {
            $jsonArray['oddPages'] = $this->OddPages;
        }

        return $jsonArray;
    }
}
