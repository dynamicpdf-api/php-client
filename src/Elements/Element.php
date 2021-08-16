<?php

//include_once('../ElementAnchor.php');
include_once('ElementPlacement.php');

     abstract class Element
    {
       
        public function  __construct(string $value, string $placement, float $xOffset, float $yOfset)
        {
            $this->InputValue = $value;
            $this->Placement = $placement;
            $this->XOffset = $xOffset;
            $this->YOffset = $yOfset;
        }

       /* public Element(string value) 
        { 
            $this->InputValue = value;
        }*/

        public   $Type; 
        public  $Resource=null;
        public  $InputValue;
        public   $TextFont;
       
        public  $Placement; 
        public  $XOffset=0;
        public  $YOffset=0;
        public  $EvenPages = false;
        public  $OddPages = false;
  
    }
?>
