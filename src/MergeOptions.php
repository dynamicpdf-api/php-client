
<?php
     class MergeOptions  
    {
        public function __construct()
        {

        }
        public  $DocumentInfo="null"; 
        public  $DocumentJavaScript="null"; 
        public  $DocumentProperties="null"; 
        public  $EmbeddedFiles="null"; 
        public  $FormFields="null";
        public  $FormsXfaData="null"; 
        public  $LogicalStructure="null";
        public  $OpenAction="null";
        public  $OptionalContentInfo="null";
        public  $Outlines="null"; 
        public  $OutputIntent="null"; 
        public  $PageAnnotations="null"; 
        public  $PageLabelsAndSections="null";
        public  $RootFormField  = "null";
        public  $XmpMetadata="null"; 

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
