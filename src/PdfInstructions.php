<?php
    
    include_once('Security.php');
    include_once('FormField.php');
    include_once('Font.php');
    
    class PdfInstructions implements JsonSerializable
    {
        public  $FormFields =  array();
        public  $Templates =  array();
        public  $Fonts =  array();
        public  $Outlines= array();
        public  $Inputs =array(); 

        public  $Author  = "CeteSoftware";
        public  $Title=""; 
        public  $Subject=""; 
        public  $Creator  = "DynmaicPDF Cloud Api";
        public  $Keywords=""; 
        public  $Security  = null;
        public  $FlattenAllFormFields; 
        public  $RetainSignatureFormFields; 
        

       

        public function __construct()
        {
            $this->Author  = "CeteSoftware";
            $this->Title=""; 
            $this->Subject=""; 
            $this->Creator  = "DynmaicPDF Cloud Api";
            $this->Keywords=""; 
        }
        public function jsonSerialize()
        {
        $inputJsonArray = array();
        $templatesJson = array();
        foreach ($this->Inputs as $input) 
        {
            array_push($inputJsonArray,$input->GetjsonSerializeString());
        }
       
        
            $jsonArray= array();

             $jsonArray['templates']=$this->Templates;
             $jsonArray['fonts']=$this->Fonts;
             $jsonArray['author'] = $this->Author;
             $jsonArray['title'] = $this->Title;

             if($this->Subject != null)
                $jsonArray['subject'] = $this->Subject;

             if($this->Creator != null)
                $jsonArray['creator'] = $this->Creator;

             if($this->Keywords != null)
                $jsonArray['keywords'] = $this->Keywords;

             if($this->Security != null)
                $jsonArray['security'] = $this->Security->GetjsonSerializeString();

             if($this->FlattenAllFormFields != null)
                $jsonArray['flattenAllFormFields'] = $this->FlattenAllFormFields;

             if($this->RetainSignatureFormFields != null)
                $jsonArray['retainSignatureFormFields'] = $this->RetainSignatureFormFields;

            
             $jsonArray['inputs']= $inputJsonArray;
             $jsonArray['formFields']=$this->FormFields;
             $jsonArray['outlines']=$this->Outlines;
           
        
            return $jsonArray;

        }
    }
?>
