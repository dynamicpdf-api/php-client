<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/PageZoom.php';
include_once __DIR__ . '/GoToAction.php';
include_once __DIR__ . '/Outline.php';
include_once __DIR__ . '/PdfInput.php';

class OutlineList
{

    public function __construct()
    {
        $this->_Outlines = array();
    }

    /**
     * Adds an Outline object to the outline list.
     *
     * @param string $text Text of the outline.
     * @param string|Input $input URL the action launches or any of the ImageInput, DlexInput, PdfInput or PageInput objects to create PDF or null.
     * @param int $pageOffset Page number to navigate.
     * @param PageZoom $pageZoom PageZoom to display the destination.
     * @return Outline The Outline object that is created.
     */
    public function Add(string $text, $input = null, int $pageOffset = 0, string $pageZoom = PageZoom::FitPage)
    {
        if (gettype($input) == "object") {
            $linkTo = new GoToAction($input);
            $linkTo->PageOffset = $pageOffset;
            $linkTo->PageZoom = $pageZoom;
            $outline = new Outline($text, $linkTo);
            array_push($this->_Outlines, $outline);
            return $outline;
        } else if (gettype($input) == "string") {
            $outline = new Outline($text, new UrlAction($input));
            array_push($this->_Outlines, $outline);
            return $outline;
        } else if ($input == null) {
            $outline = new Outline($text);
            array_push($this->_Outlines, $outline);
            return $outline;
        }
    }

    public function AddPdfOutlines(PdfInput $pdfInput)
    {
        array_push($this->_Outlines, new Outline($pdfInput));
    }

    public $_Outlines;

    public function GetJsonSerializeString()
    {
        $jsonArray = array();

        for ($i = 0; $i < count($this->_Outlines); $i++) {
            if ($this->_Outlines[$i] != null) {
                array_push($jsonArray, $this->_Outlines[$i]->GetJsonSerializeString());
            }
        }

        return $jsonArray;
    }

}
