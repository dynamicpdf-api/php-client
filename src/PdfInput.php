<?php
namespace DynamicPDF\Api;


require_once __DIR__ . './Input.php';
require_once __DIR__ . './InputType.php';
require_once __DIR__ . './MergeOptions.php';
require_once __DIR__ . './PdfResource.php';
require_once __DIR__ . './MergeOptions.php';

/**
 *
 * Represents a pdf input.
 *
 */
class PdfInput extends Input
{

    /**
     *
     * Initializes a new instance of the PdfInput class.
     *
     * @param  string|PdfResource $resource The resource path in cloud resource manager or the resource of type PdfResource.
     * @param  ?MergeOptions $options The merge options for the pdf.
     */
    public function __construct($resource, ?MergeOptions $options = null)
    {
        parent::__construct($resource);
        $this->MergeOptions = $options;
    }

    public $Type = InputType::Pdf;

    /**
     *
     *  Gets or sets the merge options MergeOptions.
     *
     */
    public $MergeOptions;

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
        $template = $this->GetTemplate();
        $jsonArray = array();

        $jsonArray['type'] = "pdf";

        if ($this->MergeOptions != null) {
            $MergeOptionsArray = $this->MergeOptions->GetJsonSerializeString();
            if (count($MergeOptionsArray) > 0) {
                $jsonArray['mergeOptions'] = $MergeOptionsArray;
            }

        }

        if ($this->StartPage != null) {
            $jsonArray['startPage'] = $this->StartPage;
        }

        if ($this->PageCount != null) {
            $jsonArray['pageCount'] = $this->PageCount;
        }

        //---------------------------------------------------

        $jsonArray['templateId'] = $this->TemplateId;

        $jsonArray['resourceName'] = $this->ResourceName;

        $jsonArray['id'] = $this->Id;

        return $jsonArray;
    }
}
