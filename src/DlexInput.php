<?php
namespace DynamicPDF\Api;


include_once __DIR__ . './Input.php';
include_once __DIR__ . './DlexResource.php';
include_once __DIR__ . './LayoutDataResource.php';
include_once __DIR__ . './InputType.php';

/**
 *
 * Represents a Dlex input.
 *
 */
class DlexInput extends Input
{

    /**
     *
     * Initializes a new instance of the DlexInput class by posting the DLEX file and the JSON data file from
     * the client to the API to create the PDF report.
     *
     * @param  string|DlexResource $dlex The DLEX file path present in the resource manager or the DlexResource file created as per the desired PDF report layout design.
     * @param  string|LayoutDataResource $layout The JSON data file path present in the resource manager used to create the PDF report or the LayoutDataResource file used to create the PDF report.
     */
    public function __construct($dlex, $layout)
    {
        if ((gettype($dlex) == "object") && (gettype($layout) == "object")) {
            $this->ResourceName = $dlex->ResourceName;
            $this->LayoutDataResourceName = $layout->LayoutDataResourceName;
            //$dlex->LayoutDataResourceName=$this->LayoutDataResourceName ;

            array_push($this->_Resources, $layout);
            array_push($this->_Resources, $dlex);
        } else if ((gettype($dlex) == "string") && (gettype($layout) == "object")) {
            $this->ResourceName = $dlex;
            $this->LayoutDataResourceName = $layout->LayoutDataResourceName;
            array_push($this->_Resources, $layout);
        } else if ((gettype($dlex) == "string") && (gettype($layout) == "string")) {
            //parent::__construct();
            $this->ResourceName = $dlex;
            $this->LayoutDataResourceName = $layout;
        }
    }

    public $_Type = InputType::Dlex;

    /**
     *
     * Gets or sets the name for layout data resource.
     *
     */
    public $LayoutDataResourceName;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();
        $jsonArray['type'] = 'dlex';
        $jsonArray['layoutDataResourceName'] = $this->LayoutDataResourceName;

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
