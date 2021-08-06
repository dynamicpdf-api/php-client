<?php

require_once('InputType.php');
require_once('Resource.php');
     abstract class Input implements JsonSerializable
    {
        private  $template;

        public function __construct(Resource $resource)
        {
            array_push($this->Resources,$resource);
            $this->ResourceName = $resource->ResourceName;
        }
       /* function __construct(string $resourceName,string $type)
        {
            $this->ResourceName = $resourceName;
            $this->Type=$type;
        }*/
 
      
        public $Type;
        public $TemplateId;
        public $Resources= array();
        public $ResourceName;
        public $Id;

        public function SetTemplate(Template $template)
        {  
            $this->template = $template;
            $this->TemplateId = $template->Id;
        }
        public function  GetTemplate( ) :?Template
        {
            return $this->template;
        }
        
       
        public function jsonSerialize()
        {
            return array(
                'type' => $this->Type,
                'resourceName' => $Resources,
            );
        }
    }
