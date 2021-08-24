<?php

//include_once('../ElementAnchor.php');
include_once('ElementPlacement.php');

    /// <summary>
    /// Base class from which all page elements are derived.
    /// </summary>
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
       
        /// <summary>
        /// Gets and sets placement of the page element on the page.
        /// </summary>
        public  $Placement; 

        /// <summary>
        /// Gets or sets the X coordinate of the page element.
        /// </summary>
        public  $XOffset=0;

        /// <summary>
        /// Gets or sets the Y coordinate of the page element.
        /// </summary>
        public  $YOffset=0;

        /// <summary>
        /// Gets or sets the boolean value specifying whether the element should be added to even pages or not.
        /// </summary>
        public  $EvenPages = false;

        /// <summary>
        /// Gets or sets the boolean value specifying whether the element should be added to odd pages or not.
        /// </summary>
        public  $OddPages = false;
  
    }
?>
