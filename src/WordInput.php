<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/PageOrientation.php';
include_once __DIR__ . '/WordResource.php';
include_once __DIR__ . '/InputType.php';
include_once __DIR__ . '/UnitConverter.php';
include_once __DIR__ . '/PageSize.php';
include_once __DIR__ . '/Input.php';
include_once __DIR__ . '/OutputSize.php';
/**
 *
 * Represents a Word input.
 *
 */
class WordInput extends Input
{

    /** 
     * 
     * Initializes a new instance of the <see cref="WordInput"/> class.
     * 
     * param name="resource" The resource of type WordResource
     * param name="size"The page size of the output PDF.
     * param name="orientation"The page orientation of the output PDF.
     * param name="margins"The page margins of the output PDF.
     */
    public function __construct(WordResource $resource, PageSize $size = PageSize . Letter, PageOrientation $orientation = PageOrientation . Portrait, float $margins = null)
    {
        parent::__construct($resource);
        $this->SetPageSize($size);
        $this->SetPageOrientation($orientation);

        if ($margins != null) {
            $this->TopMargin = $margins;
            $this->BottomMargin = $margins;
            $this->RightMargin = $margins;
            $this->LeftMargin = $margins;
        }
    }


    public $_Type = InputType::Word;

    public $TextReplace;


    /**
     *   
     * Gets or sets the top margin.
     */
    public $TopMargin;

    /**
     * 
     * Gets or sets the left margin.
     */
    public $LeftMargin;

    /**
     * 
     * Gets or sets the bottom margin.
     */
    public $BottomMargin;

    /**
     * 
     * Gets or sets the right margin.
     */
    public $RightMargin;

    /**
     * 
     * Gets or sets the page width.
     */
    public $PageWidth;

    /**
     * 
     * Gets or sets the page height.
     */
    public $PageHeight;

    /**
     * 
     *  Gets or sets the <see cref="TextReplace"/> object List.
     */
    public $TextReplaceArray = [];


    /**
     * 
     * Gets or sets the page size.
     */
    public function SetPageSize(PageSize $value)
    {
        $this->_pageSize = $value;

        $outputSize = UnitConverter::getPaperSize($value);
        if ($this->GetPageOrientation() == PageOrientation::Portrait) {
            $this->PageHeight = $outputSize->Larger;
            $this->PageWidth = $outputSize->Smaller;
        } else {
            $this->PageHeight = $outputSize->Smaller;
            $this->PageWidth = $outputSize->Larger;
        }
    }
    public function GetPageSize(): PageSize
    {
        return $this->_pageSize;
    }
    /**
     * 
     * Gets or sets page orientation.
     */
    public function SetPageOrientation(PageOrientation $value)
    {

        $this->_pageOrientation = $value;

        if ($this->PageWidth > $this->PageHeight) {
            $smaller = $this->PageHeight;
            $larger = $this->PageWidth;
        } else {
            $smaller = $this->PageWidth;
            $larger = $this->PageHeight;
        }
        if ($this->_pageOrientation == PageOrientation::Portrait) {
            $this->PageHeight = $larger;
            $this->PageWidth = $smaller;
        } else {
            $this->PageHeight = $smaller;
            $this->PageWidth = $larger;
        }

    }
    public function GetPageOrientation(): PageOrientation
    {
        return $this->_pageOrientation;
    }
    private $_pageSize;
    private $_pageOrientation;
}