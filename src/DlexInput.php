<?php

include_once('Input.php');
include_once('DlexResource.php');
include_once('LayoutDataResource.php');
include_once('InputType.php');
    /// <summary>
    /// Represents a Dlex input.
    /// </summary>
    class DlexInput extends Input
    {
          /// <summary>
        /// Initializes a new instance of the <see cref="DlexInput"/> class by posting the 
        /// DLEX file and the JSON data file from the client to the API to create the PDF report.
        /// </summary>
        /// <param name="dlexResource">The <see cref="DlexResource"/>, dlex file created as per the desired PDF report layout design.</param>
        /// <param name="layoutData">The <see cref="LayoutDataResource"/>, json data file used to create the PDF report.</param>
        public function __construct(?DlexResource $dlexResource, ?LayoutDataResource $layoutData) 
        {
         if(($dlexResource != null )&&( $layoutData != null))
         {
            $this->ResourceName = $dlexResource->ResourceName;
            $this->LayoutDataResourceName = $layoutData->LayoutDataResourceName;
            $dlexResource->LayoutDataResourceName=$this->LayoutDataResourceName ;
         
          
           array_push( $this->Resources,$layoutData);
           array_push( $this->Resources,$dlexResource);
         }

        }

            /// <summary>
        /// Initializes a new instance of the <see cref="DlexInput"/> class by taking the 
        /// DLEX file path that is present in the cloud environment and the JSON data file from the client.
        /// </summary>
        /// <param name="cloudResourcePath">The DLEX file path present in the resource manager.</param>
        /// <param name="layoutData">The <see cref="LayoutDataResource"/>, json data file used to create the PDF report.</param>
      /*  public function DlexInput2(string $cloudResourcePath, LayoutDataResource $layoutData) 
        {
            parent::__construct();
            $ResourceName = $cloudResourcePath;
            $this->LayoutDataResourceName = layoutData.ResourceName;
        }*/

        /// <summary>
        /// Initializes a new instance of the <see cref="DlexInput"/> class.
        /// </summary>
        /// <param name="cloudResourcePath">The DLEX file path present in the resource manager.</param>
        /// <param name="cloudLayoutDataPath">The JSON data file path present in the resource manager used to create the PDF report.</param>
        public  static function CreateDlexInput(string $cloudResourcePath, string $cloudLayoutDataPath) 
        {
            //parent::__construct();
            $dlexInput = new DlexInput(null, null);
            $dlexInput->ResourceName = $cloudResourcePath;
            $dlexInput->LayoutDataResourceName = $cloudLayoutDataPath;
            return $dlexInput;
        }

        public   $Type= InputType::Dlex;

        /// <summary>
        /// Gets or sets the name for layout data resource.
        /// </summary>
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
