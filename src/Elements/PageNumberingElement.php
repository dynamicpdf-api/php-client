<?php
     
     include_once('Element.php');
     include_once('ElementType.php');

     /**
     *
     * Represents a page numbering label page element.
     *
     * This class can be used to add page numbering to a PDF document. The following tokens can be used within 
     * the text of a PageNumberingLabel. They will be replaced with the appropriate value when the PDF is output. 
     * table All tokens except the /%/%PR/%/% token can also contain a numbering style specifier. The numbering 
     * style specifier is placed in parenthesis after the token. table There should be no spaces within a token, 
     * only the token and optional numbering style specifier. This token is invalid /%/%CP ( i )/%/% because 
     * of the extra spaces.Here are some examples of valid tokens: margin-top: 0px; 
     *
     */
     class PageNumberingElement extends Element
    {

        /**
        *
        *  Initializes a new instance of the PageNumberingElement class. 
        *
        * @param  string $text Text to display in the label.
        * @param  string $placement The placement of the page numbering element on the page.
        * @param  float $xOffset X coordinate of the label.
        * @param  float $yOffset Y coordinate of the label.
        */
        public function __construct(string $text, string $placement, float $xOffset = 0, float $yOffset = 0)
        {
          parent::__construct($text, $placement, $xOffset, $yOffset);
          $this->Text=$text;
        }

        
        public   $Type  = ElementType::PageNumbering;
        public  $FontName;
        public  $Color = null;


        /**
        *
        * Gets or sets the font size for the text of the label.
        *
        */
        public  $FontSize;
        

        /**
        *
        * Gets or sets the text to display in the label.
        *
        */
        public  $Text;


        /**
        *
        *  Gets or sets the Font object to use for the text of the label. 
        *
        */
        public  function Font(Font $value)
         {
            $this->TextFont = $value;
            $this->FontName = $this->TextFont->Name;
            $this->Resource = $this->TextFont->Resource;
         }

        public function GetjsonSerializeString()
        {
            $jsonArray=   array();

                $jsonArray["type"] ="pageNumbering";

                if($this->FontName != null)
                $jsonArray[ "font"]=$this->FontName;
                
                $jsonArray[ "text"]=$this->Text;
       
                if(($this->Color != null)&&($this->Color->ColorString != null))
                $jsonArray[ "color"]=$this->Color->ColorString;
       
                if($this->FontSize != null)
                $jsonArray[ "fontSize"]=$this->FontSize;
       
       
     // ---------------------------------
            
            if($this->Placement != null)
                $jsonArray['placement'] = ($this->Placement);

            if($this->XOffset != null)
                $jsonArray['xOffset'] = $this->XOffset;

            if($this->YOffset != null)
                $jsonArray['yOffset'] = $this->YOffset;

            if($this->EvenPages != null)
                $jsonArray['evenPages'] = $this->EvenPages;

            if($this->OddPages != null)
                $jsonArray['oddPages'] = $this->OddPages;

                return $jsonArray;
    }
        
    }
?>
