
<?php
require_once('Resource.php');
require_once('ResourceType.php');

    /// <summary>
    /// Represents a Dlex resource object that is created using the DLEX file and a name.
    /// </summary>
    class DlexResource extends Resource
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="DlexResource"/> class 
        /// with DLEX file path and resource name as parameters.
        /// </summary>
        /// <param name="dlexPath">The dlex file path.</param>
        /// <param name="resourceName">The name of the resource.</param>
        public function __construct(string $dlexPath, string  $resourceName = null)
        {
            parent::__construct($dlexPath, $resourceName); 
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="DlexResource"/> class 
        /// with byte data of the DLEX file and resource name as parameters.
        /// </summary>
        /// <param name="value">The byte array of the dlex file.</param>
        /// <param name="resourceName">The name of the resource.</param>
       /* public function DlexResource2(array $value, string $resourceName = null)
        { 
            parent::__construct($value, $resourceName) ;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="DlexResource"/> class 
        /// with stream of the DLEX file and resource name as parameters.
        /// </summary>
        /// <param name="data">The stream of the dlex file.</param>
        /// <param name="resourceName">The name of the resource.</param>
        public function DlexResource3(Stream $data, string $resourceName = null) 
        { 
            parent::__construct($data, $resourceName);
        }        */

        public   $Type  = ResourceType::Dlex;
        public  function  FileExtension()
        {
            return ".dlex";
        }
        
        public   $MimeType  = "application/xml";

        /// <summary>
        /// Gets or sets name for layout data resource.
        /// </summary>
        public  $LayoutDataResourceName; 

        public function GetjsonSerializeString()
        {
            $inputjson=array();
            $inputjson['type']='dlex';

            $inputjson['layoutDataResourceName']=$this->LayoutDataResourceName;
            $inputjson['resourceName']=$this->ResourceName;
            return $inputjson;
        }
    }
?>
