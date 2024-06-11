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
class WordInput extends ConverterInput
{
    /** 
     * 
     * Initializes a new instance of the WordInput class.
     * 
     * @param  WordResource $resource The resource of type WordResource.
     * @param  string $size The page size of the output PDF.
     * @param  string $orientation The page orientation of the output PDF.
     * @param  float $margins The page margins of the output PDF.
     */
    public function __construct(WordResource $resource, ?string $size = null, ?string $orientation = null, ?float $margins = null)
    {
        parent::__construct($resource, $size, $orientation, $margins);
    }

    public $_Type = InputType::Word;

    /**
     * 
     *  Gets or sets the TextReplace object List.
     */
    public $TextReplaceArray = [];

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