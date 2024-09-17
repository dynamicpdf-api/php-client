<?php
namespace DynamicPDF\Api\Elements;

include_once __DIR__ . '/TextBarcodeElement.php';
include_once __DIR__ . '/ElementType.php';

/**
 *
 * Represents a StackedGS1DataBar barcode element.
 *
 * This class can be used to place a StackedGS1DataBar barcode on a page.
 *
 */
class StackedGs1DataBarBarcodeElement extends TextBarcodeElement
{

    /**
     *
     *  Initializes a new instance of the StackedGs1DataBarBarcodeElement class.
     *
     * @param  string $value The value of the barcode.
     * @param  string $stackedGs1DataBarType The StackedGS1DataBarType of the barcode.
     * @param  float $rowHeight The row height of the barcode.
     * @param  string $placement The placement of the barcode on the page.
     * @param  float $xOffset The X coordinate of the barcode.
     * @param  float $yOffset The Y coordinate of the barcode.
     */
    public function __construct(string $value, string $stackedGs1DataBarType, float $rowHeight, string $placement = ElementPlacement::TopLeft,float $xOffset = 0, float $yOffset = 0)
    {
        parent::__construct($value, $placement, $xOffset, $yOffset);
        $this->_StackedGs1DataBarType = $stackedGs1DataBarType;
        $this->RowHeight = $rowHeight;
    }

    public $_Type = ElementType::StackedGs1DataBarBarcode;

    public $_StackedGs1DataBarType;

    /**
     *
     * Gets or Sets the segment count of the Expanded Stacked barcode.
     *
     * This is used only for the ExpandedStacked Gs1DataBar type.
     *
     */
    public $ExpandedStackedSegmentCount;

    /**
     *
     * Gets or sets the row height of the barcode.
     *
     */
    public $RowHeight;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "stackedGs1DataBarBarcode";

        if ($this->_StackedGs1DataBarType != null) {
            $jsonArray['stackedGs1DataBarType'] = $this->_StackedGs1DataBarType;
        }

        if ($this->ExpandedStackedSegmentCount != null) {
            $jsonArray['expandedStackedSegmentCount'] = $this->ExpandedStackedSegmentCount;
        }

        if ($this->RowHeight != null) {
            $jsonArray['rowHeight'] = $this->RowHeight;
        }

        //----------------TextBarcodeElement---------------------------------
        if ($this->_FontName != null) {
            $jsonArray['font'] = $this->_FontName;
        }

        if (($this->TextColor != null) && ($this->TextColor->_ColorString != null)) {
            $jsonArray['textColor'] = $this->TextColor->_ColorString;
        }

        if ($this->FontSize != null) {
            $jsonArray['fontSize'] = $this->FontSize;
        }

        if ($this->ShowText !== null) {
            $jsonArray['showText'] = $this->ShowText;
        }

        //----------------barcodeElement--------------------------------

        if (($this->Color != null) && ($this->Color->_ColorString != null)) {
            $jsonArray['color'] = $this->Color->_ColorString;
        }

        if ($this->XDimension != null) {
            $jsonArray['xDimension'] = $this->XDimension;
        }

        if ($this->Value != null) {
            $jsonArray['value'] = $this->Value;
        }

        // ------------element---------------------

        if ($this->Placement != null) {
            $jsonArray['placement'] = ($this->Placement);
        }

        if ($this->XOffset != null) {
            $jsonArray['xOffset'] = $this->XOffset;
        }

        if ($this->YOffset != null) {
            $jsonArray['yOffset'] = $this->YOffset;
        }

        if($this->EvenPages !== null)
            $jsonArray['evenPages'] = $this->EvenPages;

        if($this->OddPages !== null)
            $jsonArray['oddPages'] = $this->OddPages;

        return $jsonArray;
    }
}
