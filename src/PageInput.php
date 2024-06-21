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
     * @param  ?string|?float $size The size of the page or The width of the page.
     * @param  ?string|?float $orientation The orientation of the page or The height of the page.
     * @param  ?float $margins The margins of the page.
     */
    public function __construct($size = null, $orientation = null, $margins = null)
    {
        if ((gettype($size) == "string") && (gettype($orientation) == "string")) {
            if($size != null) 
                $this->SetPageSize($size);       
            if($orientation != null) 
                $this->SetPageOrientation($orientation); 

            if ($margins != null) {
                $this->TopMargin = $margins;
                $this->BottomMargin = $margins;
                $this->RightMargin = $margins;
                $this->LeftMargin = $margins;
            }
        }
        else if ((gettype($size) == "double" || gettype($size) == "integer")) {
            $this->PageWidth = $size;
            $this->PageHeight = $orientation;
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

    /**
     *
     * Sets the page size.
     * @param string $value for Output Page.
     */
    public function SetPageSize($value)
    {
        $this->_pageSize = $value;
        list($_smaller, $_larger) = UnitConverter::getPaperSize($value);

        if ($this->_pageOrientation == PageOrientation::Landscape) {
            $this->PageHeight = $_smaller;
            $this->PageWidth = $_larger;
        } else {
            $this->PageHeight = $_larger;
            $this->PageWidth = $_smaller;
        }
    }

    public function GetPageSize()
    {
        return $this->_pageSize;
    }

    /**
     *
     * Gets or sets page orientation.
     * @param string $value for the output Page.
     */
    public function SetPageOrientation($value)
    {

        $this->_pageOrientation = $value;

        if ($this->PageWidth != null && $this->PageHeight != null) {
            if ($this->PageWidth > $this->PageHeight) {
                $_smaller = $this->PageHeight;
                $_larger = $this->PageWidth;
            } else {
                $_smaller = $this->PageWidth;
                $_larger = $this->PageHeight;
            }
            if ($this->_pageOrientation == PageOrientation::Landscape) {
                $this->PageHeight = $_smaller;
                $this->PageWidth = $_larger;
            } else {
                $this->PageHeight = $_larger;
                $this->PageWidth = $_smaller;
            }
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
       
        if ($this->PageHeight != null) {
            $jsonArray['pageHeight'] = $this->PageHeight;
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
