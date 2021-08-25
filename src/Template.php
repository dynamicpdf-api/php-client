<?php


    /**
    *
    * Represents a document template.
    *
    */
    class Template implements JsonSerializable
    {

        /**
        *
        *  Initializes a new instance of the Template class. 
        *
        * @param  string $id The id string representing id for the template.
        */
        public function __construct(string $id)
        {
            $this->Id = $id;
        }


        /**
        *
        * Gets or sets the id for the template.
        *
        */
        public  $Id;


        /**
        *
        * Gets or sets the elements for the template.
        *
        */
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

