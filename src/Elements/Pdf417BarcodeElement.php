<?php
include_once(__DIR__.'./Dim2BarcodeElement.php');
include_once(__DIR__.'./ErrorCorrection.php');
include_once(__DIR__.'./ElementType.php');
include_once(__DIR__.'./Compaction.php');


    /**
    *
    * Represents Pdf417 barcode element.
    *
    * This class can be used to generate Pdf417 barcode symbol.
    *
    */
    class Pdf417BarcodeElement extends Dim2BarcodeElement
    {


        /**
        *
        *  Initializes a new instance of the Pdf417BarcodeElement class. 
        *
        * @param  string|array $value String to be encoded either as string or byte array.
        * @param  string $placement The placement of the barcode on the page.
        * @param  int $columns Columns of the PDF417 barcode.
        * @param  float $xOffset The X coordinate of the PDF417 barcode.
        * @param  float $yOffset The Y coordinate of the PDF417 barcode.
        */
        public function __construct( $value, string $placement, int $columns, float $xOffset = 0, float $yOffset = 0) 
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
            $this->Columns=$columns;
        }


        
        public  $Type = ElementType::Pdf417Barcode;


        /**
        *
        * Gets or sets the columns of the barcode.
        *
        */
        public  $Columns;


        /**
        *
        * Gets or sets the YDimension of the barcode.
        *
        */
        public  $YDimension;


        /**
        *
        * Gets or Sets a boolean indicating whether to process the tilde character.
        *
        */
        public  $ProcessTilde = false;

        /**
        *
        * Gets or sets the Compact Pdf417.
        *
        */
        public  $CompactPdf417 = false;


        /**
        *
        * Gets or sets the error correction level for the PDF417 barcode.
        *
 *        
        *
        */
        public  $ErrorCorrection;


        /**
        *
        * Gets or sets the type of compaction.
        *
 *        
        *
        */
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

