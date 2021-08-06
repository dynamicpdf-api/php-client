<?php

    class Template implements JsonSerializable
    {
        public function __construct(string $id)
        {
            $this->Id = $id;
        }
        public  $Id;
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
