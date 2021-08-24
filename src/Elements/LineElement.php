<?php
include_once('Element.php');
include_once('ElementPlacement.php');
include_once('ElementType.php');

    /// <summary>
    /// Represents a line page element.
    /// </summary>
    /// <remarks>This class can be used to place lines of different length, width, color and patterns on a page.</remarks>
    class LineElement extends Element
    {
        /// <summary>
		/// Initializes a new instance of the <see cref="LineElement"/> class.
		/// </summary>
        /// <param name="placement">The placement of the line on the page.</param>
		/// <param name="x2Offset">X2 coordinate of the line.</param>
		/// <param name="y2Offset">Y2 coordinate of the line.</param>
        public function __construct(string $placement, float $x2Offset, float $y2Offset)
        {
            $this->Placement = $placement;
            $this->X2Offset = $x2Offset;
            $this->Y2Offset = $y2Offset;
        }
        
        public   $Type = ElementType::Line;

        /// <summary>
		/// Gets or sets the <see cref="Color"/> object to use for the line.
		/// </summary>
        public  $Color = null;
        public  $X1Offset=0;
        public  $Y1Offset=0;

        /// <summary>
		/// Gets or sets the X2 coordinate of the line.
		/// </summary>
        public  $X2Offset=0;
        
        /// <summary>
		/// Gets or sets the Y2 coordinate of the line.
		/// </summary>
        public  $Y2Offset=0;

        /// <summary>
		/// Gets or sets the width of the line.
		/// </summary>
        public  $Width=0;

        
        /// <summary>
		/// Gets or sets the <see cref="LineStyle"/> object to use for the style of the line.
		/// </summary>
        public  $LineStyle;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();
            $jsonArray["type"] ="line";

            if(($this->Color != null)&&($this->Color->ColorString != null))
                $jsonArray['color'] = $this->Color->ColorString;
           
           if($this->X1Offset != null)
            $jsonArray['x1Offset'] = $this->X1Offset;
           
           if($this->Y1Offset != null)
            $jsonArray['y1Offset'] = $this->Y1Offset;
           
           if($this->X2Offset != null)
            $jsonArray['x2Offset'] = $this->X2Offset;
           
           if($this->Y2Offset != null)
            $jsonArray['y2Offset'] = $this->Y2Offset;
           
           if($this->Width != null)
            $jsonArray['width'] = $this->Width;
           
           if(($this->LineStyle != null)&&($this->LineStyle->LineStyleString != null))
            $jsonArray['lineStyle'] = $this->LineStyle->LineStyleString;
           
           
        // ---------------------------------
            
if($this->Placement != null)
$jsonArray['placement'] = $this->Placement;

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
