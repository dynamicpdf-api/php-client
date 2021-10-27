<?php
namespace DynamicPDF\Api;

use JsonSerializable;

include_once __DIR__ . './Security.php';
include_once __DIR__ . './FormField.php';
include_once __DIR__ . './Font.php';

class PdfInstructions implements JsonSerializable
{
    public $_FormFields = array();
    public $_Templates = array();
    public $_Fonts = array();
    public $_Outlines ;
    public $_Inputs = array();

    public $_Author = "CeteSoftware";
    public $_Title = "";
    public $_Subject = "";
    public $_Creator = "DynamicPDF Cloud Api";
    public $_Keywords = "";
    public $_Security = null;
    public $_FlattenAllFormFields;
    public $_RetainSignatureFormFields;

    public function __construct()
    {
        $this->_Author = "CeteSoftware";
        $this->_Title = "";
        $this->_Subject = "";
        $this->_Creator = "DynamicPDF Cloud Api";
        $this->_Keywords = "";
    }
    public function jsonSerialize()
    {
        $inputJsonArray = array();

        foreach ($this->_Inputs as $input) {
            if($input != null){
            array_push($inputJsonArray, $input->GetJsonSerializeString());
            }
        }

        $fontsJson = array();
        foreach ($this->_Fonts as $font) {
            array_push($fontsJson, $font);
        }

        $templatesJson = array();
        foreach ($this->_Templates as $template) {
            if($template != null){
            array_push($templatesJson, $template->GetJsonSerializeString());
            }
        }

        $jsonArray = array();

        $jsonArray['templates'] = $templatesJson;
        $jsonArray['fonts'] = $fontsJson;
        $jsonArray['author'] = $this->_Author;
        $jsonArray['title'] = $this->_Title;

        if ($this->_Subject != null) {
            $jsonArray['subject'] = $this->_Subject;
        }

        if ($this->_Creator != null) {
            $jsonArray['creator'] = $this->_Creator;
        }

        if ($this->_Keywords != null) {
            $jsonArray['keywords'] = $this->_Keywords;
        }

        if ($this->_Security != null) {
            $jsonArray['security'] = $this->_Security->GetJsonSerializeString();
        }

        if ($this->_FlattenAllFormFields != null) {
            $jsonArray['flattenAllFormFields'] = $this->_FlattenAllFormFields;
        }

        if ($this->_RetainSignatureFormFields != null) {
            $jsonArray['retainSignatureFormFields'] = $this->_RetainSignatureFormFields;
        }

        $jsonArray['inputs'] = $inputJsonArray;
        $jsonArray['formFields'] = $this->_FormFields;

        if($this->_Outlines != null)
        $jsonArray['outlines'] = $this->_Outlines->GetJsonSerializeString();

        return $jsonArray;

    }
}
