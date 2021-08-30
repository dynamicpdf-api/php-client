<?php

require_once('InputType.php');
require_once('Resource.php');


     /**
     *
     * Represents the base class for inputs.
     *
     */
     abstract class Input 
    {
        private  $template;

        public function __construct( $resource)
        {
            if(gettype($resource) == "object")
            {
                array_push($this->Resources,$resource);
                $this->ResourceName = $resource->ResourceName;
            }
            else 
            {
                $this->ResourceName = $resource;
            }
        }
     
 
      
        public $Type;
        public $TemplateId;
        public $Resources= array();

        /**
        *
        * Gets or sets the resource name.
        *
        */
        public $ResourceName;

        /**
        *
        * Gets or sets the id.
        *
        */
        public $Id;


        /**
        *
        * Gets or sets the template.
        *
        */
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
