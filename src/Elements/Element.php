<?php

//include_once('../ElementAnchor.php');
include_once(__DIR__.'./ElementPlacement.php');


     /**
     *
     * Base class from which all page elements are derived.
     *
     */
     abstract class Element
    {
       
        public function  __construct(string $value =null, string $placement =null, float $xOffset=0, float $yOffset=0)
        {
            $this->InputValue = $value;
            $this->Placement = $placement;
            $this->XOffset = $xOffset;
            $this->YOffset = $yOffset;
        }

       

        public   $Type; 
        public  $Resource=null;
        public  $InputValue;
        public   $TextFont;
       

        /**
        *
        * Gets and sets placement of the page element on the page.
        *
        */
        public  $Placement; 


        /**
        *
        * Gets or sets the X coordinate of the page element.
        *
        */
        public  $XOffset=0;


        /**
        *
        * Gets or sets the Y coordinate of the page element.
        *
        */
        public  $YOffset=0;


        /**
        *
        * Gets or sets the boolean value specifying whether the element should be added to even pages or not.
        *
        */
        public  $EvenPages = false;


        /**
        *
        * Gets or sets the boolean value specifying whether the element should be added to odd pages or not.
        *
        */
        public  $OddPages = false;
  
    }
?>

