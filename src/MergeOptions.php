<?php
namespace DynamicPDF\Api;

/**
 *
 * Represents different options for merging PDF documents.
 *
 */
class MergeOptions
{
    public function __construct()
    {

    }

    /**
     *
     * Gets or sets a boolean indicating whether to import document information when merging.
     *
     */
    public ?bool $DocumentInfo = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import document level JavaScript when merging.
     *
     */
    public ?bool $DocumentJavaScript = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import document properties when merging.
     *
     */
    public ?bool $DocumentProperties = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import embedded files when merging.
     *
     */
    public ?bool $EmbeddedFiles = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import form fields when merging.
     *
     */
    public ?bool $FormFields = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import XFA form data when merging.
     *
     */
    public ?bool $FormsXfaData = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import logical structure (tagging information) when merging.
     *
     */
    public ?bool $LogicalStructure = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import document's opening action (initial page and zoom settings) when merging.
     *
     */
    public ?bool $OpenAction = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import optional content when merging.
     *
     */
    public ?bool $OptionalContentInfo = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import outlines and bookmarks when merging.
     *
     */
    public ?bool $Outlines = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import OutputIntent when merging.
     *
     */
    public ?bool $OutputIntent = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import PageAnnotations when merging.
     *
     */
    public ?bool $PageAnnotations = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import PageLabelsAndSections when merging.
     *
     */
    public ?bool $PageLabelsAndSections = null;

    /**
     *
     * Gets or sets the root form field for imported form fields. Useful when merging a PDF repeatedly to have a better contorl on the form field names.
     *
     */
    public ?string $RootFormField = null;

    /**
     *
     * Gets or sets a boolean indicating whether to import XmpMetadata when merging.
     *
     */
    public ?bool $XmpMetadata = null;

    public function GetJsonSerializeString()
    {

        $jsonArray = array();

        if ($this->DocumentInfo !== null) {
            $jsonArray['documentInfo'] = $this->DocumentInfo;
        }

        if ($this->DocumentJavaScript !== null) {
            $jsonArray['documentJavaScript'] = $this->DocumentJavaScript;
        }

        if ($this->DocumentProperties !== null) {
            $jsonArray['documentProperties'] = $this->DocumentProperties;
        }

        if ($this->EmbeddedFiles !== null) {
            $jsonArray['embeddedFiles'] = $this->EmbeddedFiles;
        }

        if ($this->FormFields !== null) {
            $jsonArray['formFields'] = $this->FormFields;
        }

        if ($this->FormsXfaData !== null) {
            $jsonArray['formsXfaData'] = $this->FormsXfaData;
        }

        if ($this->LogicalStructure !== null) {
            $jsonArray['logicalStructure'] = $this->LogicalStructure;
        }

        if ($this->OpenAction !== null) {
            $jsonArray['openAction'] = $this->OpenAction;
        }

        if ($this->OptionalContentInfo !== null) {
            $jsonArray['optionalContentInfo'] = $this->OptionalContentInfo;
        }

        if ($this->Outlines !== null) {
            $jsonArray['outlines'] = $this->Outlines;
        }

        if ($this->OutputIntent !== null) {
            $jsonArray['outputIntent'] = $this->OutputIntent;
        }

        if ($this->PageAnnotations !== null) {
            $jsonArray['pageAnnotations'] = $this->PageAnnotations;
        }

        if ($this->PageLabelsAndSections !== null) {
            $jsonArray['pageLabelsAndSections'] = $this->PageLabelsAndSections;
        }

        if ($this->RootFormField !== null) {
            $jsonArray['rootFormField'] = $this->RootFormField;
        }

        if ($this->XmpMetadata !== null) {
            $jsonArray['xmpMetadata'] = $this->XmpMetadata;
        }

        return $jsonArray;

    }
}
