
<?php

include_once('Action.php');
include_once('Input.php');
include_once('PageZoom.php');


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
        * @param  Input $input Any of the ImageInput, DlexInput, PdfInput or PageInput objects to create PDF.        *
        * @param  int $pageOffset Page number to navigate.
        * @param  string $pageZoom PageZoom to display the destination.        *
        */
        public function __construct(Input  $input, int $pageOffset = 0, string $pageZoom = PageZoom::FitPage ) 
        { 
            $this->Input = $input;  
            $this->InputID = $input->Id; 
            $this->PageOffset = $pageOffset; 
            $this->PageZoom = $pageZoom; 
        } 


        public  $Input;
       
        public  $InputID;


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
        public  $PageZoom;

        public function GetjsonSerializeString()
        {
            $jsonArray = array();

            if($this->Input != null)
                $jsonArray['input'] = $this->Input->GetjsonSerializeString();

            if($this->InputID != null)
                $jsonArray['inputID'] = $this->InputID;

            if($this->PageOffset != null)
                $jsonArray['pageOffset'] = $this->PageOffset;

            if($this->PageZoom != null)
                $jsonArray['pageZoom'] = $this->PageZoom;

            return $jsonArray;
        }
    }

?>

