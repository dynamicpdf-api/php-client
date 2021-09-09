
<?php


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
        public  $DocumentInfo= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import document level JavaScript when merging.
        *
        */
        public  $DocumentJavaScript= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import document properties when merging.
        *
        */
        public  $DocumentProperties= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import embedded files when merging.
        *
        */
        public  $EmbeddedFiles= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import form fields when merging.
        *
        */
        public  $FormFields= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import XFA form data when merging.
        *
        */
        public  $FormsXfaData= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import logical structure (tagging information) when merging.
        *
        */
        public  $LogicalStructure= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import document's opening action (initial page and zoom settings) when merging.
        * 
        */
        public  $OpenAction= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import optional content when merging.
        *
        */
        public  $OptionalContentInfo= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import outlines and bookmarks when merging.
        *
        */
        public  $Outlines= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import OutputIntent when merging.
        *
        */
        public  $OutputIntent= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import PageAnnotations when merging.
        *
        */
        public  $PageAnnotations= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import PageLabelsAndSections when merging.
        *
        */
        public  $PageLabelsAndSections= "null";


        /**
        *
        * Gets or sets the root form field for imported form fields. Useful when merging a PDF repeatedly to have a better contorl on the form field names. 
        * 
        */
        public $RootFormField= "null";


        /**
        *
        * Gets or sets a boolean indicating whether to import XmpMetadata when merging.
        *
        */
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

