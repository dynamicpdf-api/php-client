<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/Action.php';
include_once __DIR__ . '/Input.php';
include_once __DIR__ . '/PageZoom.php';

/**
 *
 * Represents a goto action in a PDF document that navigates to a specific page using page number and zoom
 * options.
 *
 */
class GoToAction extends Action
{

    /**
     *
     * Initializes a new instance of the GoToAction class using an input to create the PDF, page number, and
     * a zoom option.
     *
     * @param  Input $input Any of the ImageInput, DlexInput, PdfInput or PageInput objects to create PDF.
     * @param  int $pageOffset Page number to navigate.
     * @param  string $pageZoom PageZoom to display the destination.
     */
    public function __construct($input, int $pageOffset = 0, string $pageZoom = PageZoom::FitPage)
    {
        $this->_Input = $input;
        $this->_InputID = $input->Id;
        $this->PageOffset = $pageOffset;
        $this->PageZoom = $pageZoom;
    }

    public $_Input;

    public $_InputID;

    /**
     *
     * Gets or sets page Offset.
     *
     */
    public $PageOffset;

    /**
     *
     *  Gets or sets PageZoom to display the destination.
     *
     */
    public $PageZoom;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        if ($this->_Input != null) {
            $jsonArray['input'] = $this->_Input->GetJsonSerializeString();
        }

        if ($this->_InputID != null) {
            $jsonArray['inputID'] = $this->_InputID;
        }

        if ($this->PageOffset != null) {
            $jsonArray['pageOffset'] = $this->PageOffset;
        }

        if ($this->PageZoom != null) {
            $jsonArray['pageZoom'] = $this->PageZoom;
        }

        return $jsonArray;
    }
}
