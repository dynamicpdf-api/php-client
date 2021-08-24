<?php
include_once('Dim2BarcodeElement.php');
include_once('ErrorCorrection.php');
include_once('ElementType.php');
include_once('Compaction.php');

    /// <summary>
    /// Represents Pdf417 barcode element.
    /// </summary>
    /// <remarks>
    /// This class can be used to generate Pdf417 barcode symbol.
    ///	</remarks>
    class Pdf417BarcodeElement extends Dim2BarcodeElement
    {

        /// <summary>
        /// Initializes a new instance of the <see cref="Pdf417BarcodeElement"/> class.
        /// </summary>
        /// <param name="value">String to be encoded.</param>
        /// <param name="placement">The placement of the barcode on the page.</param>
        /// <param name="columns">Columns of the PDF417 barcode.</param>
        /// <param name="xOffset">The X coordinate of the PDF417 barcode.</param>
        /// <param name="yOffset">The Y coordinate of the PDF417 barcode.</param>
        public function __construct(string $value, string $placement, int $columns, float $xOffset = 0, float $yOffset = 0) 
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
            $this->Columns=$columns;
        }

        /// <summary>
        /// Initializes a new instance of the <see cref="Pdf417BarcodeElement"/> class.
        /// </summary>
        /// <param name="value">String to be encoded.</param>
        /// <param name="placement">The placement of the barcode on the page.</param>
        /// <param name="columns">Columns of the PDF417 barcode.</param>
        /// <param name="xOffset">The X coordinate of the PDF417 barcode.</param>
        /// <param name="yOffset">The Y coordinate of the PDF417 barcode.</param>
       // public Pdf417BarcodeElement(byte[] value, ElementPlacement placement, int columns, float xOffset = 0, float yOffset= 0): base(value, placement, xOffset, yOffset) { }

        
        public  $Type = ElementType::Pdf417Barcode;

        /// <summary>
        /// Gets or sets the columns of the barcode.
        /// </summary>
        public  $Columns;

        /// <summary>
        /// Gets or sets the YDimension of the barcode.
        /// </summary>
        public  $YDimension;

        /// <summary>
        /// Gets or Sets a boolean indicating whether to process the tilde character.
        /// </summary>
        public  $ProcessTilde = false;
        /// <summary>
        /// Gets or sets the Compact Pdf417.
        /// </summary>
        public  $CompactPdf417 = false;

        /// <summary>
        /// Gets or sets the error correction level for the PDF417 barcode.
        /// </summary>
        /// <returns>Returns a <see cref="ErrorCorrection"/> object.</returns>
        public  $ErrorCorrection;

        /// <summary>
        /// Gets or sets the type of compaction.
        /// </summary>
        /// <returns>Returns a <see cref="Compaction"/> object.</returns>
        public  $Compaction;

        public function GetjsonSerializeString()
        {

            $jsonArray=   array();

            $jsonArray["type"] ="pdf417Barcode";

            if($this->Columns != null)
                $jsonArray['columns'] = $this->Columns;
           
           if($this->YDimension != null)
                $jsonArray['yDimension'] = $this->YDimension;
           
           //if($this->ProcessTilde != null)
                $jsonArray['processTilde'] = $this->ProcessTilde;
           
           //if($this->CompactPdf417 != null)
                $jsonArray['compactPdf417'] = $this->CompactPdf417;
           
           if($this->ErrorCorrection != null)
            $jsonArray['errorCorrection'] = $this->ErrorCorrection;
           
           if($this->Compaction != null)
                $jsonArray['compaction'] = $this->Compaction;
           
           

           //--------------Dim2BarcodeElement------------------------------

           if($this->ValueType != null)
                $jsonArray['valueType'] = $this->ValueType;
     
            //----------------barcodeElement--------------------------------

            if(($this->Color != null)&&($this->Color->ColorString != null))
                $jsonArray['color'] = $this->Color->ColorString;

            if($this->XDimension != null)
                $jsonArray['xDimension'] = $this->XDimension;

            if($this->Value != null)
                $jsonArray['value'] = $this->Value;


                // ------------element---------------------
            
                if($this->Placement != null)
                    $jsonArray['placement'] = ($this->Placement);

                if($this->XOffset != null)
                    $jsonArray['xOffset'] = $this->XOffset;

                if($this->YOffset != null)
                    $jsonArray['yOffset'] = $this->YOffset;

                //if($this->EvenPages != null)
                    $jsonArray['evenPages'] = $this->EvenPages;

                //if($this->OddPages != null)
                    $jsonArray['oddPages'] = $this->OddPages;

                return $jsonArray;
      
    }
    }
?>
