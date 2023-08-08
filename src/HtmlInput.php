<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/Input.php';
include_once __DIR__ . '/HtmlResource.php';
include_once __DIR__ . '/InputType.php';
include_once __DIR__ . '/UnitConverter.php';

/**
 *
 * Represents an html input.
 *
 */
class HtmlInput extends Input
{

    /**
     *
     * Initializes a new instance of the ImageInput class.
     *
     * @param  string|HtmlResource $resource The Html string or the HtmlResource object to create HtmlInput.
     * @param  string $basePath The basepath option for the url.
     * @param  string $pageSize The page size of the output PDF.
     * @param  string $orientation The page orientation of the output PDF.
     * @param  float $margin The page margins of the output PDF.
     */
    public function __construct($resource, string $basePath = null, $pageSize = PageSize::Letter, $orientation = PageOrientation::Portrait, $margin = null)
    {
        parent::__construct($resource);

        $this->SetPageSize($pageSize);
        $this->SetPageOrientation($orientation);

        if ($basePath != null) {
            $this->BasePath = $basePath;
        }

        if ($margin != null) {
            $this->TopMargin = $margin;
            $this->BottomMargin = $margin;
            $this->RightMargin = $margin;
            $this->LeftMargin = $margin;
        }

    }

    public $_Type = InputType::Html;

    /**
     *
     *  Gets or sets the BasePath Option.
     *
     */
    public $BasePath;

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

    /**
     *
     *  Gets or sets the Page Width.
     *
     */
    public $PageWidth;

    /**
     *
     *  Gets or sets the Page Height.
     *
     */
    public $PageHeight;

    /**
     *
     * Sets the page size.
     * @param string $value for Output Page.
     */
    public function SetPageSize($value)
    {
        $this->_pageSize = $value;
        $unitConverter = new UnitConverter();
        list($_smaller, $_larger) = $unitConverter->getPaperSize($value);

        if ($this->_pageOrientation == PageOrientation::Portrait) {
            $this->PageWidth = $_smaller;
            $this->PageHeight = $_larger;
        } else {
            $this->PageWidth = $_larger;
            $this->PageHeight = $_smaller;
        }
    }

    /**
     *
     * Gets the page size.
     */
    public function GetPageSize()
    {
        return $this->_pageSize;
    }

    /**
     *
     * Sets the page orientation.
     * @param string $value for the output Page.
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

    /**
     *
     * Gets the page orientation.
     */
    public function GetPageOrientation()
    {
        return $this->_pageOrientation;
    }

    private $_pageSize;
    private $_pageOrientation;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "html";

        if ($this->ResourceName != null) {
            $jsonArray['resourceName'] = $this->ResourceName;
        }

        if ($this->BasePath != null) {
            $jsonArray['basePath'] = $this->BasePath;
        }

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

        $jsonArray['id'] = $this->Id;

        return $jsonArray;
    }
}