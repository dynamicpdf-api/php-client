<?php

    /// <summary>
    /// Represents a document template.
    /// </summary>
    class Template implements JsonSerializable
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="Template"/> class.
        /// </summary>
        /// <param name="id">The id string representing id for the template.</param>
        public function __construct(string $id)
        {
            $this->Id = $id;
        }

        /// <summary>
        /// Gets or sets the id for the template.
        /// </summary>
        public  $Id;

        /// <summary>
        /// Gets or sets the elements for the template.
        /// </summary>
        public  $Elements =  array();

        public function jsonSerialize()
        {
            $elements = array();
        foreach ($this->Elements as $element) 
        {
            $str=$element->GetjsonSerializeString();
            
            if($str!= null)
            array_push($elements,$str);
        }
           return array(
            "id"=> $this->Id,
            "elements" => $elements
           );
          
        }
    }
?>
