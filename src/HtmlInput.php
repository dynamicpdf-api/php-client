<?php
namespace DynamicPDF\Api;

include_once __DIR__ . './Input.php';
include_once __DIR__ . './HtmlResource.php';
include_once __DIR__ . './InputType.php';
include_once __DIR__ . './UnitConverter.php';

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
     */
    public function __construct($resource, string $basePath = null, $pageSize = PageSize::Letter, $orientation = PageOrientation::Portrait, $margin = null)
    {
        $this->PageSize($pageSize,$orientation);
        
        if(gettype($resource) == "object"){
            array_push($this->_Resources, $resource);
            $this->_ResourceName = $resource->ResourceName;
        }
        else{
            $this->HtmlString = $resource;
        }
        
        if($basePath != null){
            $this->BasePath = $basePath;
        }

        if($margin != null){
            $this->TopMargin = $margin;
            $this->BottomMargin = $margin;
            $this->RightMargin = $margin;
            $this->LeftMargin = $margin;
        }

        $this->Id = md5(uniqid(rand(), true));
    }

    public $_Type = InputType::Html;

    public $_ResourceName;

    /**
     *
     *  Gets or sets the Html String input.
     *
     */
    public $HtmlString;

    /**
     *
     *  Gets or sets the BasePath Option.
     *
     */
    public $BasePath;

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

    private $_smaller;

    private $_larger;

    /**
     *
     * Sets the Page width and Height accourding to PageSize.
     * @param PageSize $pageSize for Output Page.
     * @param PageOrientation $pageOrientation for the output Page.
     */
    public function PageSize($pageSize, $pageOrientation)
    {
        $unitConverter = new UnitConverter();
        list($this->_smaller,$this->_larger) = $unitConverter->getPaperSize($pageSize);

        if($pageOrientation == PageOrientation::Portrait)
        {
            $this->PageWidth = $this->_smaller;
            $this->PageHeight = $this->_larger;
        }
        else{
            $this->PageWidth = $this->_larger;
            $this->PageHeight = $this->_smaller;
        }

    }

    

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "html";

        if ($this->_ResourceName != null) {
            $jsonArray['resourceName'] = $this->_ResourceName;
        }else{
            $jsonArray['htmlString'] = $this->HtmlString;
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