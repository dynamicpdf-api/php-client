<?php 
//
include_once('Element.php');
include_once('ElementType.php');
include_once('AztecSymbolSize.php');
include_once('BarcodeElement.php');
include_once('Dim2BarcodeElement.php');

    class AztecBarcodeElement extends Dim2BarcodeElement
    {
        public function __construct(string $value, string $placement, float $xOffset = 0, float $yOffset = 0)
        { 
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }

        public  $Type  = ElementType::AztecBarcode;
        public  $ProcessTilde= false;
        public  $AztecSymbolSize=AztecSymbolSize::Auto;
        public  $ErrorCorrection=0;
        public  $ReaderInitializationSymbol= false;

        public function GetjsonSerializeString()
        {

            $jsonArray=   array();

            $jsonArray["type"] ="aztecBarcode";

            //if($this->ProcessTilde != null)
                $jsonArray['processTilde'] = $this->ProcessTilde;

            if($this->AztecSymbolSize != null)
                $jsonArray['aztecSymbolSize'] = $this->AztecSymbolSize;

            if($this->ErrorCorrection != null)
                $jsonArray['errorCorrection'] = $this->ErrorCorrection;

            //if($this->ReaderInitializationSymbol != null)
                $jsonArray['readerInitializationSymbol'] = $this->ReaderInitializationSymbol;



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