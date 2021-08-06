
<?php
     class MergeOptions  
    {
        public function __construct()
        {

        }
        public  $documentInfo=null; 
        public  $documentJavaScript=null; 
        public  $documentProperties=null; 
        public  $embeddedFiles=null; 
        public  $formFields=null; 
        public  $formsXfaData=null; 
        public  $logicalStructure=null; 
        public  $openAction=null; 
        public  $optionalContentInfo=null; 
        public  $outlines=null; 
        public  $outputIntent=null; 
        public  $pageAnnotations=null; 
        public  $pageLabelsAndSections=null; 
        public  $rootFormField  = null;
        public  $xmpMetadata=null; 

        public function GetjsonSerializeString()
       {
        
        $jsonArray= array();
        
        if($this->documentInfo != null)
        $jsonArray['documentInfo'] = $this->documentInfo;
       
       if($this->documentJavaScript != null)
        $jsonArray['documentJavaScript'] = $this->documentJavaScript;
       
       if($this->documentProperties != null)
        $jsonArray['documentProperties'] = $this->documentProperties;
       
       if($this->embeddedFiles != null)
        $jsonArray['embeddedFiles'] = $this->embeddedFiles;
       
       if($this->formFields != null)
        $jsonArray['formFields'] = $this->formFields;
       
       if($this->formsXfaData != null)
        $jsonArray['formsXfaData'] = $this->formsXfaData;
       
       if($this->logicalStructure != null)
        $jsonArray['logicalStructure'] = $this->logicalStructure;
       
       if($this->openAction != null)
        $jsonArray['openAction'] = $this->openAction;
       
       if($this->optionalContentInfo != null)
        $jsonArray['optionalContentInfo'] = $this->optionalContentInfo;
       
       if($this->outlines != null)
        $jsonArray['outlines'] = $this->outlines;
       
       if($this->outputIntent != null)
        $jsonArray['outputIntent'] = $this->outputIntent;
       
       if($this->pageAnnotations != null)
        $jsonArray['pageAnnotations'] = $this->pageAnnotations;
       
       if($this->pageLabelsAndSections != null)
        $jsonArray['pageLabelsAndSections'] = $this->pageLabelsAndSections;
       
       if($this->rootFormField != null)
        $jsonArray['rootFormField'] = $this->rootFormField;
       
       if($this->xmpMetadata != null)
        $jsonArray['xmpMetadata'] = $this->xmpMetadata;
       
        return $jsonArray;
       
       }
    }
?>
