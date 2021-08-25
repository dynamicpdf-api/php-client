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
        public function __construct(string $layoutData= null, string $layoutDataResourceName = null) 
        {
        if($layoutData != null)
        {
            if ($this->endsWith($layoutData,".json"))
            {
               
                $this->ResourcePath=$layoutData;
                $this->Data = Resource::GetFileData($layoutData);
               
            }
            else
            {
               
                $this->ResourcePath=null;
                $this->Data = $layoutData;
               
            }

            if ($layoutDataResourceName == null)
                $this->LayoutDataResourceName =  md5(uniqid(rand(), true)).".json";
            else
                $this->LayoutDataResourceName = $layoutDataResourceName;

                $this->MimeType = "application/json";
                $this->Type = ResourceType::LayoutData;
                $this->ResourceName=$this->LayoutDataResourceName ;
        }
        }


        /**
        *
        * Initializes a new instance of the LayoutDataResource class using the layout data object and a resource 
        * name. 
        *
        * @param  object $layoutData Serializable object data to create PDF report.
        * @param  string $layoutDataResourceName The name for layout data resource.
        */
        public static  function CreateLayoutDataResource(object $layoutData, string $layoutDataResourceName = null) :  LayoutDataResource
        {
           // print_r ($layoutData);
            $jsonText = json_encode($layoutData);
            //echo($jsonText);
            $layoutDataResource =new LayoutDataResource($jsonText ,$layoutDataResourceName);
            return $layoutDataResource;
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

