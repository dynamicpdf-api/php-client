<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/InputType.php';

/**
 *
 * Represents a page input.
 *
 */
class PageInput extends Input
{

    /**
     *
     *  Initializes a new instance of the PageInput class.
     *
     * @param  float $pageWidth The width of the page.
     * @param  float $pageHeight The height of the page.
     * @param  float $margin The margins of the page.
     */
    public function __construct(?float $pageWidth = null, ?float $pageHeight = null, ?float $margin = null)
    {
            $this->PageWidth = $pageWidth;
            $this->PageHeight = $pageHeight;
        
        if($margin != null){
            $this->TopMargin = $margin;
            $this->BottomMargin = $margin;
            $this->RightMargin = $margin;
            $this->LeftMargin = $margin;
        }

        $this->Id = md5(uniqid(rand(), true));
    }

    public $_Type = InputType::Page;

    /**
     *
     * Gets or sets the width of the page.
     *
     */
    public $PageWidth;

    /**
     *
     * Gets or sets the height of the page.
     *
     */
    public $PageHeight;

    /**
     *
     *  Gets or sets the Top Margin.
     *
     */
    public $TopMargin;

    /**
     *
     *  Gets or sets the Bottom Margin.
     *
     */
    public $BottomMargin;

    /**
     *
     *  Gets or sets the Right Margin.
     *
     */
    public $RightMargin;

    /**
     *
     *  Gets or sets the Left Margin.
     *
     */
    public $LeftMargin;

    public $Elements = array();

    private static $DefaultPageHeight = 792.0;
    private static $DefaultPagewidth = 612.0;


    /**
     *
     * Sets the page size.
     * @param PageSize $value for Output Page.
     */
    public function SetPageSize($value)
    {
        $this->_pageSize = $value;
        list($_smaller, $_larger) = UnitConverter::getPaperSize($value);

        if ($this->_pageOrientation == PageOrientation::Portrait) {
            $this->PageWidth = $_smaller;
            $this->PageHeight = $_larger;
        } else {
            $this->PageWidth = $_larger;
            $this->PageHeight = $_smaller;
        }
    }


    public function GetPageSize()
    {
        return $this->_pageSize;
    }

    /**
     *
     * Gets or sets page orientation.
     * @param PageOrientation $value for the output Page.
     */
    public function SetPageOrientation($value)
    {

        $this->_pageOrientation = $value;

        if ($this->PageWidth > $this->PageHeight) {
            $_smaller = $this->PageHeight;
            $_larger = $this->PageWidth;
        } else {
            $_smaller = $this->PageWidth;
            $_larger = $this->PageHeight;
        }
        if ($this->_pageOrientation == PageOrientation::Portrait) {
            $this->PageHeight = $_larger;
            $this->PageWidth = $_smaller;
        } else {
            $this->PageHeight = $_smaller;
            $this->PageWidth = $_larger;
        }

    }

    public function GetPageOrientation()
    {
        return $this->_pageOrientation;
    }

    private $_pageSize;
    private $_pageOrientation;


    /**
     *
     * Gets or sets the elements of the page.
     *
     * @return array Elements of the page.
     */
    public function GetElements()
    {
        return $this->Elements;
    }
    public function GetJsonSerializeString()
    {
        $jsonElement = array();
        foreach ($this->Elements as $element) {
            if ($element != null) {
                array_push($jsonElement, $element->GetJsonSerializeString());
            }
        }

        $jsonArray = array();

        $jsonArray["type"] = "page";

        if ($this->PageWidth != null) {
            $jsonArray['pageWidth'] = $this->PageWidth;
        }
        else{
            $jsonArray['pageWidth'] = PageInput::$DefaultPagewidth;
        }

        if ($this->PageHeight != null) {
            $jsonArray['pageHeight'] = $this->PageHeight;
        }
        else{
            $jsonArray['pageHeight'] = PageInput::$DefaultPageHeight;
        }
        
        if ($this->TopMargin != null) {
            $jsonArray['topMargin'] = $this->TopMargin;
        }

        if ($this->BottomMargin != null) {
            $jsonArray['bottomMargin'] = $this->BottomMargin;
        }

        if ($this->RightMargin != null) {
            $jsonArray['rightMargin'] = $this->RightMargin;
        }

        if ($this->LeftMargin != null) {
            $jsonArray['leftMargin'] = $this->LeftMargin;
        }

        $jsonArray['elements'] = $jsonElement;

        if ($this->_TemplateId != null) {
            $jsonArray['templateId'] = $this->_TemplateId;
        }

        if ($this->ResourceName != null) {
            $jsonArray['resourceName'] = $this->ResourceName;
        }

        if ($this->Id != null) {
            $jsonArray['id'] = $this->Id;
        }

        return $jsonArray;

    }
}
