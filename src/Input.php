<?php

require_once('InputType.php');
require_once('Resource.php');

    /// <summary>
    /// Represents the base class for inputs.
    /// </summary>
     abstract class Input 
    {
        private  $template;

        public function __construct(Resource $resource)
        {
            array_push($this->Resources,$resource);
            $this->ResourceName = $resource->ResourceName;
            //echo($this->ResourceName);
        }
       /* function __construct(string $resourceName,string $type)
        {
            $this->ResourceName = $resourceName;
            $this->Type=$type;
        }*/
 
      
        public $Type;
        public $TemplateId;
        public $Resources= array();
        /// <summary>
        /// Gets or sets the resource name.
        /// </summary>
        public $ResourceName;
        /// <summary>
        /// Gets or sets the id.
        /// </summary>
        public $Id;

          /// <summary>
        /// Gets or sets the template.
        /// </summary>
        public function SetTemplate(Template $template)
        {  
            $this->template = $template;
            $this->TemplateId = $template->Id;
        }
        public function  GetTemplate( ) :?Template
        {
            return $this->template;
        }
        
       
        /*public function jsonSerialize()
        {
            return array(
                'type' => $this->Type,
                'resourceName' => $Resources,
            );
        }*/
    }
