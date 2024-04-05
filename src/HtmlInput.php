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
class HtmlInput extends ConverterInput
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
        parent::__construct($resource, $pageSize, $orientation, $margin);

        if ($basePath != null) {
            $this->BasePath = $basePath;
        } 
    }

    public $_Type = InputType::Html;

    /**
     *
     *  Gets or sets the BasePath Option.
     *
     */
    public $BasePath;

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