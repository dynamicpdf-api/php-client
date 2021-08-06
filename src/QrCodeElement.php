<?php
    include_once('Dim2BarcodeElement.php');
    include_once('ElementType.php');
    class QrCodeElement extends Dim2BarcodeElement
    {
        public function __construct(string $value, string $placement, float $xOffset = 0, float $yOffset = 0) 
        {
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }
        
        //public QrCodeElement(byte[] value, ElementPlacement placement, float xOffset = 0, float yOffset = 0) : base(value, placement, xOffset, yOffset) { }

       
        public  $Type = ElementType::QrCode;
        public  $Fnc1;
        public  $Version ;

        public function GetjsonSerializeString()
        {

            $jsonArray=   array();

            $jsonArray["type"] ="qrCode";

           
           if($this->Fnc1 != null)
                $jsonArray['fnc1'] = $this->Fnc1;
           
           if($this->Version != null)
                $jsonArray['version'] = $this->Version;
           
           

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
