<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/Input.php';
include_once __DIR__ . '/ImageResource.php';
include_once __DIR__ . '/InputType.php';
include_once __DIR__ . '/Align.php';
include_once __DIR__ . '/VAlign.php';

/**
 *
 * Represents an image input.
 *
 */
class ImageInput extends Input
{

    /**
     *
     * Initializes a new instance of the ImageInput class.
     *
     * @param  string|ImageResource $resource The image file path present in cloud resource manager or the ImageResource object to create ImageInput.
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public $_Type = InputType::Image;

    /**
     *
     * Gets or sets the scaleX of the image.
     *
     */
    public $ScaleX;

    /**
     *
     * Gets or sets the scaleY of the image.
     *
     */
    public $ScaleY;

    /**
     *
     * Gets or sets the top margin.
     *
     */
    public $TopMargin;

    /**
     *
     * Gets or sets the left margin.
     *
     */
    public $LeftMargin;

    /**
     *
     * Gets or sets the bottom margin.
     *
     */
    public $BottomMargin;

    /**
     *
     * Gets or sets the right margin.
     *
     */
    public $RightMargin;

    /**
     *
     * Gets or sets the page width.
     *
     */
    public $PageWidth;

    /**
     *
     * Gets or sets the page height.
     *
     */
    public $PageHeight;

    /**
     *
     * Gets or sets a boolean indicating whether to expand the image.
     *
     */
    public ?bool $ExpandToFit = null;

    /**
     *
     * Gets or sets a boolean indicating whether to shrink the image.
     *
     */
    public ?bool $ShrinkToFit = null;

    /**
     *
     * Gets or sets the horizontal alignment of the image.
     *
     */
    public $Align = Align::Center;

    /**
     *
     * Gets or sets the vertical alignment of the image.
     *
     */
    public $VAlign = VAlign::Center;

    /**
     *
     * Gets or sets the start page.
     *
     */
    public $StartPage;

    /**
     *
     * Gets or sets the page count.
     *
     */
    public $PageCount;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        $jsonArray["type"] = "image";

        if ($this->ScaleX != null) {
            $jsonArray['scaleX'] = $this->ScaleX;
        }

        if ($this->ScaleY != null) {
            $jsonArray['scaleY'] = $this->ScaleY;
        }

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

        if ($this->ExpandToFit !== null) {
            $jsonArray['expandToFit'] = $this->ExpandToFit;
        }

        if ($this->ShrinkToFit !== null) {
            $jsonArray['shrinkToFit'] = $this->ShrinkToFit;
        }

        if ($this->Align != null) {
            $jsonArray['align'] = $this->Align;
        }

        if ($this->VAlign != null) {
            $jsonArray['vAlign'] = $this->VAlign;
        }

        if ($this->StartPage != null) {
            $jsonArray['startPage'] = $this->StartPage;
        }

        if ($this->PageCount != null) {
            $jsonArray['pageCount'] = $this->PageCount;
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
