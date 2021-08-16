
<?php

include_once('Action.php');
include_once('Input.php');
include_once('PageZoom.php');

    /// <summary>
    /// Represents a goto action in a PDF document that navigates 
    /// to a specific page using page number and zoom options.
    /// </summary>
    class GoToAction extends Action
    {
        /// <summary>
        /// Initializes a new instance of the  <see cref="GoToAction"/> class 
        /// using an input to create the PDF, page number, and a zoom option.
        /// </summary>
        /// <param name="input">Any of the <see cref="ImageInput"/>, <see cref="DlexInput"/>, 
        /// <see cref="PdfInput"/> or <see cref="PageInput"/> objects to create PDF.</param>
        /// <param name="pageOffset">Page number to navigate.</param>
        /// <param name="pageZoom"><see cref="PageZoom"/> to display the destination.</param>
        public function __construct(Input  $input, int $pageOffset = 0, string $pageZoom = PageZoom::FitPage ) 
        { 
            $this->Input = $input;  
            $this->InputID = $input->Id; 
            $this->PageOffset = $pageOffset; 
            $this->PageZoom = $pageZoom; 
        } 


        public  $Input;
       
        public  $InputID;

        /// <summary>
        /// Gets or sets page Offset.
        /// </summary>
        public $PageOffset;

        /// <summary>
        /// Gets or sets <see cref="PageZoom"/> to display the destination.
        /// </summary>
        public  $PageZoom;

        public function GetjsonSerializeString()
        {
            $jsonArray = array();

            if($this->Input != null)
                $jsonArray['input'] = $this->Input->GetjsonSerializeString();

            if($this->InputID != null)
                $jsonArray['inputId'] = $this->InputID;

            if($this->PageOffset != null)
                $jsonArray['pageOffset'] = $this->PageOffset;

            if($this->PageZoom != null)
                $jsonArray['pageZoom'] = $this->PageZoom;

            return $jsonArray;
        }
    }

?>
