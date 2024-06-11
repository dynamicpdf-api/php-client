<?php
namespace DynamicPDF\Api;


require_once __DIR__ . '/InputType.php';
require_once __DIR__ . '/Resource.php';

/**
 *
 * Represents the base class for inputs.
 *
 */
abstract class ConverterInput extends Input
{
    private $_pageSize;
    private $_pageOrientation;

    public function __construct(Resource $resource, ?string $size, ?string $orientation, ?float $margins)
    {
        parent::__construct($resource);

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

        if ($this->_pageOrientation == PageOrientation::Landscape) {
            $this->PageWidth = $_larger;
            $this->PageHeight = $_smaller;
        } else {
            $this->PageWidth = $_smaller;
            $this->PageHeight = $_larger;
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

    /**
     *
     * Gets the page orientation.
     */
    public function GetPageOrientation()
    {
        return $this->_pageOrientation;
    }


    public function GetJsonSerializeString()
    {
        
    }
}
