<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/PageOrientation.php';
include_once __DIR__ . '/WordResource.php';
include_once __DIR__ . '/InputType.php';
include_once __DIR__ . '/UnitConverter.php';
include_once __DIR__ . '/PageSize.php';
include_once __DIR__ . '/Input.php';

/**
 *
 * Represents a Word input.
 *
 */
class WordInput extends Input
{

    /** 
     * 
     * Initializes a new instance of the WordInput class.
     * 
     * param name="resource" The resource of type WordResource
     * param name="size"The page size of the output PDF.
     * param name="orientation"The page orientation of the output PDF.
     * param name="margins"The page margins of the output PDF.
     */
    public function __construct(WordResource $resource, $size = PageSize::Letter, $orientation = PageOrientation::Portrait, float $margins = null)
    {
        $this->SetPageOrientation($orientation);
        $this->SetPageSize($size);

        parent::__construct($resource);

        if ($margins != null) {
            $this->TopMargin = $margins;
            $this->BottomMargin = $margins;
            $this->RightMargin = $margins;
            $this->LeftMargin = $margins;
        }
    }


    public $_Type = InputType::Word;

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
     *  Gets or sets the TextReplace object List.
     */
    public $TextReplaceArray = [];


    /**
     * 
     * Gets or sets the page size.
     */
    public function SetPageSize($value)
    {
        $this->_pageSize = $value;
        list($smaller, $larger) = UnitConverter::getPaperSize($value);
        if ($this->GetPageOrientation() == PageOrientation::Portrait) {
            $this->PageHeight = $larger;
            $this->PageWidth = $smaller;
        } else {
            $this->PageHeight = $smaller;
            $this->PageWidth = $larger;
        }
    }
    public function GetPageSize(): string
    {
        return $this->_pageSize;
    }
    /**
     * 
     * Gets or sets page orientation.
     */
    public function SetPageOrientation($value)
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
    public function GetPageOrientation(): string
    {
        return $this->_pageOrientation;
    }
    private $_pageSize;
    private $_pageOrientation;


    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "word";


        if ($this->TopMargin != null) {
            $jsonArray['topMargin'] = $this->TopMargin;
        }

        if ($this->LeftMargin != null) {
            $jsonArray['leftMargin'] = $this->LeftMargin;
        }

        if ($this->BottomMargin != null) {
            $jsonArray['bottomMargin'] = $this->BottomMargin;
        }

        if ($this->RightMargin != null) {
            $jsonArray['rightMargin'] = $this->RightMargin;
        }

        if ($this->PageWidth != null) {
            $jsonArray['pageWidth'] = $this->PageWidth;
        }

        if ($this->PageHeight != null) {
            $jsonArray['pageHeight'] = $this->PageHeight;
        }
        $TextReplaceJson = array();
        if (($this->TextReplaceArray != null) && (count($this->TextReplaceArray) > 0)) {
            foreach ($this->TextReplaceArray as $textreplace) {
                if ($textreplace != null) {
                    array_push($TextReplaceJson, $textreplace->GetJsonSerializeString());
                }
            }
        }

        if (($TextReplaceJson != null) && (count($TextReplaceJson) > 0)) {
            $jsonArray['textReplace'] = $TextReplaceJson;
        }
        //---------------------------------------------------
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