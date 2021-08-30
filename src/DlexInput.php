<?php

include_once('Input.php');
include_once('DlexResource.php');
include_once('LayoutDataResource.php');
include_once('InputType.php');

    /**
    *
    * Represents a Dlex input.
    *
    */
    class DlexInput extends Input
    {

        /**
        *
        * Initializes a new instance of the DlexInput class by posting the DLEX file and the JSON data file from 
        * the client to the API to create the PDF report. 
        *
        * @param  ?DlexResource $dlexResource The DlexResource, dlex file created as per the desired PDF report layout design.        *
        * @param  ?LayoutDataResource $layoutData The LayoutDataResource, json data file used to create the PDF report.        *
        */
        public function __construct($dlex, $layout) 
        {
         if((gettype($dlex)=="object")&&(gettype($layout)=="object"))
         {
            $this->ResourceName = $dlex->ResourceName;
            $this->LayoutDataResourceName = $layout->LayoutDataResourceName;
            //$dlex->LayoutDataResourceName=$this->LayoutDataResourceName ;

            array_push( $this->Resources,$layout);
            array_push( $this->Resources,$dlex);
         }
         else if((gettype($dlex)=="string")&&(gettype($layout)=="object"))
         {
            $this->ResourceName = $dlex;
            $this->LayoutDataResourceName = $layout->LayoutDataResourceName;
            array_push( $this->Resources,$layout);
         }
         else if((gettype($dlex)=="string")&&(gettype($layout)=="string"))
         {
            //parent::__construct();
            $this->ResourceName = $dlex;
            $this->LayoutDataResourceName = $layout;
         }
        }


        public   $Type= InputType::Dlex;


        /**
        *
        * Gets or sets the name for layout data resource.
        *
        */
        public  $LayoutDataResourceName;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();
            $jsonArray['type'] = 'dlex';
            $jsonArray['layoutDataResourceName'] = $this->LayoutDataResourceName;

            
            //---------------------------------------------------
            if($this->TemplateId != null)
                $jsonArray['templateId'] = $this->TemplateId;

            if($this->ResourceName != null)
                $jsonArray['resourceName'] = $this->ResourceName;

            if($this->Id != null)
                $jsonArray['id'] = $this->Id;
            
                return $jsonArray;
            
            return $jsonArray;
        }
    }
?>

