
<?php

include_once('Action.php');
include_once('Input.php');
include_once('PageZoom.php');

    class GoToAction extends Action
    {
        public function __construct(string $inputId) 
        { 
           $this->InputId = $inputId; 
           
        }


        public  $InputId;
        public  $PageOffset;
        public  $PageZoom;

        public function GetjsonSerializeString()
        {
            $jsonArray = array();

            if($this->InputId != null)
                $jsonArray['inputId'] = $this->InputId;

            if($this->PageOffset != null)
                $jsonArray['pageOffset'] = $this->PageOffset;

            if($this->PageZoom != null)
                $jsonArray['pageZoom'] = $this->PageZoom;

            return $jsonArray;
        }
    }
?>
