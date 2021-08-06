<?php
     
     include_once('Element.php');
     include_once('ElementType.php');
     
     class PageNumberingElement extends Element
    {
      
        public function __construct(string $text, string $placement, float $xOffset = 0, float $yOffset = 0)
        {
          parent::__construct($text, $placement, $xOffset, $yOffset);
          $this->Text=$text;
        }

        
        public   $Type  = ElementType::PageNumbering;
        public  $FontName;
        public  $Color = null;
        public  $FontSize;
        public  $Text;

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
       
                if($this->Color != null)
                $jsonArray[ "color"]=$this->Color;
       
                if($this->FontSize != null)
                $jsonArray[ "fontSize"]=$this->FontSize;
       
       
     // ---------------------------------
            
            if($this->Placement != null)
                $jsonArray['placement'] = strtolower($this->Placement);

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
