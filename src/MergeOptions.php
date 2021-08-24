
<?php

    /// <summary>
    /// Represents different options for merging PDF documents.
    /// </summary>
     class MergeOptions  
    {
        public function __construct()
        {

        }
       /// <summary>
        /// Gets or sets a boolean indicating whether to import document information when merging.
        /// </summary>
        public  $DocumentInfo= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import document level JavaScript when merging.
        /// </summary>
        public  $DocumentJavaScript= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import document properties when merging.
        /// </summary>
        public  $DocumentProperties= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import embedded files when merging.
        /// </summary>
        public  $EmbeddedFiles= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import form fields when merging.
        /// </summary>
        public  $FormFields= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import XFA form data when merging.
        /// </summary>
        public  $FormsXfaData= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import logical structure 
        /// (tagging information) when merging.
        /// </summary>
        public  $LogicalStructure= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import document's opening 
        /// action (initial page and zoom settings) when merging.
        /// </summary>
        public  $OpenAction= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import optional content when merging.
        /// </summary>
        public  $OptionalContentInfo= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import outlines and bookmarks when merging.
        /// </summary>
        public  $Outlines= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import OutputIntent when merging.
        /// </summary>
        public  $OutputIntent= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import PageAnnotations when merging.
        /// </summary>
        public  $PageAnnotations= "null";

        /// <summary>
        /// Gets or sets a boolean indicating whether to import PageLabelsAndSections when merging.
        /// </summary>
        public  $PageLabelsAndSections= "null";

        /// <summary>
        /// Gets or sets the root form field for imported form fields. 
        /// Useful when merging a PDF repeatedly to have a better 
        /// contorl on the form field names.
        /// </summary>
        public $RootFormField= "null"; = null;

        /// <summary>
        /// Gets or sets a boolean indicating whether to import XmpMetadata when merging.
        /// </summary>
        public  $XmpMetadata= "null";

        public function GetjsonSerializeString()
       {
        
        $jsonArray= array();
        
        if($this->DocumentInfo != "null")
        $jsonArray['documentInfo'] = $this->DocumentInfo;
       
       if($this->DocumentJavaScript !=  "null")
        $jsonArray['documentJavaScript'] = $this->DocumentJavaScript;
       
       if($this->DocumentProperties !=  "null")
        $jsonArray['documentProperties'] = $this->DocumentProperties;
       
       if($this->EmbeddedFiles !=  "null")
        $jsonArray['embeddedFiles'] = $this->EmbeddedFiles;
       
       if($this->FormFields !=  "null")
        $jsonArray['formFields'] = $this->FormFields;
       
       if($this->FormsXfaData !=  "null")
        $jsonArray['formsXfaData'] = $this->FormsXfaData;
       
       if($this->LogicalStructure !=  "null")
        $jsonArray['logicalStructure'] = $this->LogicalStructure;
       
       if($this->OpenAction !=  "null")
        $jsonArray['openAction'] = $this->OpenAction;
       
       if($this->OptionalContentInfo !=  "null")
        $jsonArray['optionalContentInfo'] = $this->OptionalContentInfo;
       
       if($this->Outlines !=  "null")
        $jsonArray['outlines'] = $this->Outlines;
       
       if($this->OutputIntent !=  "null")
        $jsonArray['outputIntent'] = $this->OutputIntent;
       
       if($this->PageAnnotations !=  "null")
        $jsonArray['pageAnnotations'] = $this->PageAnnotations;
       
       if($this->PageLabelsAndSections !=  "null")
        $jsonArray['pageLabelsAndSections'] = $this->PageLabelsAndSections;
       
       if($this->RootFormField !=  "null")
        $jsonArray['rootFormField'] = $this->RootFormField;
       
       if($this->XmpMetadata !=  "null")
        $jsonArray['xmpMetadata'] = $this->XmpMetadata;
       
        return $jsonArray;
       
       }
    }
?>
