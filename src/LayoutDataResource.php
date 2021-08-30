<?php
include_once('Resource.php');
include_once('ResourceType.php');


    /**
    *
    * Represents the Layout data resource used to create PDF reports.
    *
    */
    class LayoutDataResource extends Resource
    {

        /**
        *
        * Initializes a new instance of the LayoutDataResource class using the layout data object and a resource 
        * name. 
        *
        * @param  string $layoutData Serializable object data to create PDF report.
        * @param  string $layoutDataResourceName The name for layout data resource.
        */
        public function __construct( $layoutData= null, string $layoutDataResourceName = null) 
        {
            if(gettype($layoutData)=="object")
            {
                $this->Data =  json_encode($layoutData);
            }
            else
            {
                $this->Data = Resource::GetFileData($layoutData);
            }
            if ($layoutDataResourceName == null)
                $this->LayoutDataResourceName =  md5(uniqid(rand(), true)).".json";
            else
                $this->LayoutDataResourceName = $layoutDataResourceName;

            $this->MimeType = "application/json";
            $this->Type = ResourceType::LayoutData;
            $this->ResourceName=$this->LayoutDataResourceName ;
       
        }


       

      
        public  function  FileExtension()
        {
            return ".json";
        }
        
        public  $FileExtension = ".json";


        /**
        *
        * Gets or sets name of the layout data resource.
        *
        */
        public  $LayoutDataResourceName ;

        public function GetjsonSerializeString()
        {
           return null;
        }

        function endsWith( $Str1, $Str2 ) {

            $length = strlen( $Str2 );
            if( !$length ) {
                return true;
            }
            return strtolower(substr( $Str1, -$length ) )== strtolower($Str2);
        }
    }
?>

