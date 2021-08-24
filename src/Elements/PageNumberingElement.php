<?php
     
     include_once('Element.php');
     include_once('ElementType.php');
         /// <summary>
    /// Represents a page numbering label page element.
    /// </summary>
    /// <remarks>
    /// This class can be used to add page numbering to a PDF document. The following tokens can be used within the
    /// text of a PageNumberingLabel. They will be replaced with the appropriate value when the PDF is output.
    /// <list type="table">
    /// <listheader>
    /// <term>Token</term>
    /// <description>Description</description>
    /// </listheader>
    /// <item>
    /// <term>CP</term>
    /// <description>Current page. The default numbering style is numeric.</description>
    /// </item>
    /// <item>
    /// <term>TP</term>
    /// <description>Total pages. The default numbering style is numeric.</description>
    /// </item>
    /// <item>
    /// <term>SP</term>
    /// <description>Section page.</description>
    /// </item>
    /// <item>
    /// <term>ST</term>
    /// <description>Section Total.</description>
    /// </item>
    /// <item>
    /// <term>PR</term>
    /// <description>Prefix.</description>
    /// </item>
    /// </list>
    /// <p/>
    /// All tokens except the /%/%PR/%/% token can also contain a numbering style specifier. The numbering style specifier
    /// is placed in parenthesis after the token.
    /// <list type="table">
    /// <listheader>
    /// <term>Numbering Style</term>
    /// <description>Description</description>
    /// </listheader>
    /// <item>
    /// <term>1</term>
    /// <description>Numeric. Arabic numbers are used: 1, 2, 3, etc. Example: "/%/%CP(1)/%/%"</description>
    /// </item>
    /// <item>
    /// <term>i</term>
    /// <description>Lower Case Roman Numerals. Lower case roman numerals are used: i, ii, iii, etc.
    /// Example: "/%/%CP(i)/%/%".</description>
    /// </item>
    /// <item>
    /// <term>I</term>
    /// <description>Upper Case Roman Numerals. Upper case roman numerals are used: I, II, III, etc.
    /// Example: "/%/%CP(I)/%/%".</description>
    /// </item>
    /// <item>
    /// <term>a</term>
    /// <description>Lower Latin Letters. Lower case Latin letters are used: a, b, c, etc. After z, aa is used
    /// followed by bb, cc, etc. Example: "/%/%CP(a)/%/%".</description>
    /// </item>
    /// <item>
    /// <term>A</term>
    /// <description>Upper Latin Letters. Upper case Latin letters are used: A, B, C, etc. After Z, AA is used
    /// followed by BB, CC, etc. Example: "/%/%CP(A)/%/%".</description>
    /// </item>
    /// <item>
    /// <term>b</term>
    /// <description>Lower Latin Letters. Lower case Latin letters are used: a, b, c, etc. After z, aa is used
    /// followed by ab, ac, etc. Example: "/%/%CP(b)/%/%".</description>
    /// </item>
    /// <item>
    /// <term>B</term>
    /// <description>Lower Latin Letters. Lower case Latin letters are used: A, B, C, etc. After Z, AA is used
    /// followed by AB, AC, etc. Example: "/%/%CP(B)/%/%".</description>
    /// </item>
    /// </list>
    /// <p/>
    /// There should be no spaces within a token, only the token and optional numbering style specifier. This
    /// token is <b>invalid</b> /%/%CP ( i )/%/% because of the extra spaces.<p/>Here are some examples of valid tokens:
    /// <ul style="margin-top: 0px;">
    /// <li>/%/%SP/%/%</li>
    /// <li>/%/%SP(I)/%/%</li>
    /// <li>/%/%PR/%/%</li>
    /// <li>/%/%ST(B)/%/%</li>
    /// </ul>
    /// </remarks>
     class PageNumberingElement extends Element
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PageNumberingElement"/> class.
        /// </summary>
        /// <param name="text">Text to display in the label.</param>
        /// <param name="placement">The placement of the page numbering element on the page.</param>
        /// <param name="xOffset">X coordinate of the label.</param>
        /// <param name="yOffset">Y coordinate of the label.</param>
        public function __construct(string $text, string $placement, float $xOffset = 0, float $yOffset = 0)
        {
          parent::__construct($text, $placement, $xOffset, $yOffset);
          $this->Text=$text;
        }

        
        public   $Type  = ElementType::PageNumbering;
        public  $FontName;
        public  $Color = null;

        /// <summary>
        /// Gets or sets the font size for the text of the label.
        /// </summary>
        public  $FontSize;
        
        /// <summary>
        /// Gets or sets the text to display in the label.
        /// </summary>
        public  $Text;

        /// <summary>
        /// Gets or sets the <see cref="Font"/> object to use for the text of the label.
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
