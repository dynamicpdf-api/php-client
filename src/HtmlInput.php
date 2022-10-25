<?php
namespace DynamicPDF\Api;

include_once __DIR__ . './Input.php';
include_once __DIR__ . './HtmlResource.php';
include_once __DIR__ . './InputType.php';

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
    public function __construct($resource, string $basePath = null)
    {
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

    public $_TopMargin;

    public $_BottomMargin;

    public $_RightMargin;

    public $_LeftMargin;

    private $_smaller;

    private $_larger;

    public function __call($member, $arguments) {
        $numberOfArguments = count($arguments);
  
        if (method_exists($this, $function = $member.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    
    /**
     *
     * Sets the margin for the Html output.
     * @param float $margin sets margin for all four sides.
     */
    private function margin($margin)
    {
        $this->_TopMargin = $margin;
        $this->_BottomMargin = $margin;
        $this->_RightMargin = $margin;
        $this->_LeftMargin = $margin;
    }

    /**
     *
     * Sets the margin for the Html output.
     * @param float $topBottom sets margin for Top and Bottom.
     * @param float $rightLeft sets margin for Right and Left
     */
    private function margin2($topBottom, $rightLeft)
    {
        $this->_TopMargin = $topBottom;
        $this->_BottomMargin = $topBottom;
        $this->_RightMargin = $rightLeft;
        $this->_LeftMargin = $rightLeft;
    }

    /**
     *
     * Sets the margin for the Html output.
     * @param float $topBottom sets margin for Top and Bottom side.
     * @param float $right sets margin for Right side.
     * @param float $left sets margin for Left side.
     */
    private function margin3($topBottom, $right, $left)
    {
        $this->_TopMargin = $topBottom;
        $this->_BottomMargin = $topBottom;
        $this->_RightMargin = $right;
        $this->_LeftMargin = $left;
    }

    /**
     *
     * Sets the margin for the Html output.
     * @param float $top sets margin for Top side.
     * @param float $bottom sets margin for Bottom side.
     * @param float $right sets margin for Right side.
     * @param float $left sets margin for Left side.
     */
    private function margin4($top, $bottom, $right, $left)
    {
        $this->_TopMargin = $top;
        $this->_BottomMargin = $bottom;
        $this->_RightMargin = $right;
        $this->_LeftMargin = $left;
    }

    /**
     *
     * Sets the Page width and Height accourding to PageSize.
     * @param PageSize $pageSize for Output Page.
     * @param PageOrientation $pageOrientation for the output Page.
     */
    public function PageSize($pageSize, $pageOrientation)
    {
        $this->getPaperSize($pageSize);

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

    private function getPaperSize($size)
    {
        switch ($size) {
            case PageSize::Letter:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(11);
                break;
            case PageSize::Legal:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(14);
                break;
            case PageSize::Executive:
                $this->_smaller = $this->InchesToPoints(7.25);
                $this->_larger = $this->InchesToPoints(10.5);
                break;
            case PageSize::Tabloid:
                $this->_smaller = $this->InchesToPoints(11);
                $this->_larger = $this->InchesToPoints(17);
                break;
            case PageSize::Envelope10:
                $this->_smaller = $this->InchesToPoints(4.125);
                $this->_larger = $this->InchesToPoints(9.5);
                break;
            case PageSize::EnvelopeMonarch:
                $this->_smaller = $this->InchesToPoints(3.875);
                $this->_larger = $this->InchesToPoints(7.5);
                break;
            case PageSize::Folio:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(13);
                break;
            case PageSize::Statement:
                $this->_smaller = $this->InchesToPoints(5.5);
                $this->_larger = $this->InchesToPoints(8.5);
                break;
            case PageSize::A4:
                $this->_smaller = $this->MillimetersToPoints(210);
                $this->_larger = $this->MillimetersToPoints(297);
                break;
            case PageSize::A5:
                $this->_smaller = $this->MillimetersToPoints(148);
                $this->_larger = $this->MillimetersToPoints(210);
                break;
            case PageSize::B4:
                $this->_smaller = $this->MillimetersToPoints(250);
                $this->_larger = $this->MillimetersToPoints(353);
                break;
            case PageSize::B5:
                $this->_smaller = $this->MillimetersToPoints(176);
                $this->_larger = $this->MillimetersToPoints(250);
                break;
            case PageSize::A3:
                $this->_smaller = $this->MillimetersToPoints(297);
                $this->_larger = $this->MillimetersToPoints(420);
                break;
            case PageSize::B3:
                $this->_smaller = $this->MillimetersToPoints(353);
                $this->_larger = $this->MillimetersToPoints(500);
                break;
            case PageSize::A6:
                $this->_smaller = $this->MillimetersToPoints(105);
                $this->_larger = $this->MillimetersToPoints(148);
                break;
            case PageSize::B5JIS:
                $this->_smaller = $this->MillimetersToPoints(182);
                $this->_larger = $this->MillimetersToPoints(257);
                break;
            case PageSize::EnvelopeDL:
                $this->_smaller = $this->MillimetersToPoints(110);
                $this->_larger = $this->MillimetersToPoints(220);
                break;
            case PageSize::EnvelopeC5:
                $this->_smaller = $this->MillimetersToPoints(162);
                $this->_larger = $this->MillimetersToPoints(229);
                break;
            case PageSize::EnvelopeB5:
                $this->_smaller = $this->MillimetersToPoints(176);
                $this->_larger = $this->MillimetersToPoints(250);
                break;
            case PageSize::PRC16K:
                $this->_smaller = $this->MillimetersToPoints(146);
                $this->_larger = $this->MillimetersToPoints(215);
                break;
            case PageSize::PRC32K:
                $this->_smaller = $this->MillimetersToPoints(97);
                $this->_larger = $this->MillimetersToPoints(151);
                break;
            case PageSize::Quatro:
                $this->_smaller = $this->MillimetersToPoints(215);
                $this->_larger = $this->MillimetersToPoints(275);
                break;
            case PageSize::DoublePostcard:
                $this->_smaller = $this->MillimetersToPoints(148.0);
                $this->_larger = $this->MillimetersToPoints(200.0);
                break;
            case PageSize::Postcard:
                $this->_smaller = $this->InchesToPoints(3.94);
                $this->_larger = $this->InchesToPoints(5.83);
                break;
            default:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(11);
        }
    }

    private function InchesToPoints($size)
    {
        return $size * 72.0;
    }

    private function MillimetersToPoints($size)
    {
        return $size * 2.8346456692913385826771653543307;
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

        if ($this->_TopMargin != null) {
            $jsonArray['topMargin'] = $this->_TopMargin;
        }

        if ($this->_BottomMargin != null) {
            $jsonArray['bottomMargin'] = $this->_BottomMargin;
        }

        if ($this->_RightMargin != null) {
            $jsonArray['rightMargin'] = $this->_RightMargin;
        }

        if ($this->_LeftMargin != null) {
            $jsonArray['leftMargin'] = $this->_LeftMargin;
        }

        $jsonArray['id'] = $this->Id;

        return $jsonArray;
    }
}