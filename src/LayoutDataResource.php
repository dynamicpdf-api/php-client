<?php
include_once('Resource.php');
include_once('ResourceType.php');

    class LayoutDataResource extends Resource
    {
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

       /// <summary>
        /// Initializes a new instance of the <see cref="LayoutDataResource"/> class 
        /// using the layout data object and a resource name.
        /// </summary>
        /// <param name="layoutData">Serializable object data to create PDF report.</param>
        /// <param name="layoutDataResourceName">The name for layout data resource.</param>
        public static  function CreateLayoutDataResource(object $layoutData, string $layoutDataResourceName = null) :  LayoutDataResource
        {
           // print_r ($layoutData);
            $jsonText = json_encode($layoutData);
            //echo($jsonText);
            $layoutDataResource =new LayoutDataResource($jsonText ,$layoutDataResourceName);
            return $layoutDataResource;
        }

       /* public function LayoutDataResource(Stream $layoutData, string $layoutDataResourceName = null)  
        {
            parent::__construct();
            $Data = parent::GetSteamData($layoutData);
            if ($this->LayoutDataResourceName == null)
            $this->LayoutDataResourceName = bin2hex(openssl_random_pseudo_bytes(16)) + ".json";
            else
            $this->LayoutDataResourceName = $layoutDataResourceName;
        }*/
        public  function  FileExtension()
        {
            return ".json";
        }
        
        public  $FileExtension = ".json";
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
