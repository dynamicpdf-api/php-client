<?php
    
    include_once('Element.php');
    include_once('ElementType.php');
    
   /// <summary>
    /// Represents a text element.
    /// </summary>
    /// <remarks>This class can be used to place text on a page.</remarks>
    class TextElement extends Element
    {
         /// <summary>
        /// Initializes a new instance of the <see cref="TextElement"/> class.
        /// </summary>
        /// <param name="value">Text to display in the text element.</param>
        /// <param name="placement">The placement of the text element on the page.</param>
        /// <param name="xOffset">X coordinate of the text element.</param>
        /// <param name="yOffset">Y coordinate of the text element.</param>
        public function __construct(string $value, string $placement, float $xOffset = 0, float $yOffset = 0) 
         { 
            parent::__construct($value, $placement, $xOffset, $yOffset) ;
            $this->Text=$value;
         }

       
         public   $Type  = ElementType::Text;
        
        public  $FontName;
        /// <summary>
        /// Gets or sets the <see cref="Color"/> object to use for the text of the text element.
        /// </summary>
        public  $Color  = null;
        /// <summary>
        /// Gets or sets the font size for the text of the text element.
        /// </summary>
        public  $FontSize;
        
        /// <summary>
        /// Gets or sets the text to display in the text element.
        /// </summary>
        public  $Text;
         /// <summary>
        /// Gets or sets the <see cref="Font"/> object used to specify the font of the text for the text element.
        /// </summary>
         public  function Font(Font $value)
         {
            $this->TextFont = $value;
            $this->FontName = $this->TextFont->Name;
            $this->Resource = $this->TextFont->Resource;
         }
         public function GetjsonSerializeString()
         {
          
         $jsonArray=   array();
         
         $jsonArray["type" ]="text";

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
