<?php
include_once('Dim2BarcodeElement.php');
include_once('ErrorCorrection.php');
include_once('ElementType.php');
include_once('Compaction.php');

    class Pdf417BarcodeElement extends Dim2BarcodeElement
    {
        public function __construct(string $value, string $placement, int $columns, float $xOffset = 0, float $yOffset = 0) 
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
            $this->Columns=$columns;
        }
       // public Pdf417BarcodeElement(byte[] value, ElementPlacement placement, int columns, float xOffset = 0, float yOffset= 0): base(value, placement, xOffset, yOffset) { }

        
        public  $Type = ElementType::Pdf417Barcode;
        public  $Columns;
        public  $YDimension;
        public  $ProcessTilde = false;
        public  $CompactPdf417 = false;
        public  $ErrorCorrection;
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

            if($this->Color != null)
                $jsonArray['color'] = $this->Color;

            if($this->XDimension != null)
                $jsonArray['xDimension'] = $this->XDimension;

            if($this->Value != null)
                $jsonArray['value'] = $this->Value;


                // ------------element---------------------
            
                if($this->Placement != null)
                    $jsonArray['placement'] = strtolower($this->Placement);

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
