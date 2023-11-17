<?php

namespace DynamicPDF\Api;

use JsonSerializable;

include_once __DIR__ . '/Security.php';
include_once __DIR__ . '/FormField.php';
include_once __DIR__ . '/Font.php';

class PdfInstructions implements JsonSerializable
{
    public $_FormFields = array();
    public $_Templates = array();
    public $_Fonts = array();
    public $_Outlines;
    public $_Inputs = array();

    public $_Author;
    public $_Title = "";
    public $_Subject = "";
    public $_Creator;
    public $_Producer;
    public $_Keywords = "";
    public $_Security = null;
    public $_FlattenAllFormFields;
    public $_RetainSignatureFormFields;

    public function __construct()
    {
         
        $this->_Title = "";
        $this->_Subject = "";
        $this->_Keywords = "";
    }
    public function jsonSerialize(): mixed
    {
        $inputJsonArray = array();

        foreach ($this->_Inputs as $input) {
            if ($input != null) {
                array_push($inputJsonArray, $input->GetJsonSerializeString());
            }
        }

        $fontsJson = array();
        foreach ($this->_Fonts as $font) {
            array_push($fontsJson, $font);
        }

        $templatesJson = array();
        foreach ($this->_Templates as $template) {
            if ($template != null) {
                array_push($templatesJson, $template->GetJsonSerializeString());
            }
        }

        $jsonArray = array();

        if(count($templatesJson) > 0)
        {
            $jsonArray['templates'] = $templatesJson;
        }
        if(count($fontsJson) > 0)
        {
        $jsonArray['fonts'] = $fontsJson;
        }

        if ($this->_Author != null) {
            $jsonArray['author'] = $this->_Author;
        }
        if ($this->_Title != null) {
        $jsonArray['title'] = $this->_Title;
        }

        if ($this->_Subject != null) {
            $jsonArray['subject'] = $this->_Subject;
        }

        if ($this->_Creator != null) {
            $jsonArray['creator'] = $this->_Creator;
        }

        if ($this->_Producer != null) {
            $jsonArray['producer'] = $this->_Producer;
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
        if(count($this->_FormFields) > 0)
        {
            $jsonArray['formFields'] = $this->_FormFields;
        }

        if ($this->_Outlines != null && $this->_Outlines->_Outlines != null && (count($this->_Outlines->_Outlines) > 0))
            $jsonArray['outlines'] = $this->_Outlines->GetJsonSerializeString();

        return $jsonArray;
    }
}
