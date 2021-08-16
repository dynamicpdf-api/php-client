<?php

include_once('Dim2BarcodeElement.php');
include_once('ElementPlacement.php');
include_once('ElementType.php');


    class DataMatrixBarcodeElement extends  Dim2BarcodeElement
    {


       public function __construct(string $value, string $placement, float $xOffset = 0, float $yOffset = 0, string $symbolSize = DataMatrixSymbolSize::Auto, string $encodingType = DataMatrixEncodingType::Auto, string $functionCharacter = DataMatrixFunctionCharacter::None)
        {
           parent::__construct($value, $placement, $xOffset, $yOffset); 
           $this->DataMatrixSymbolSize = $symbolSize;
           $this->DataMatrixEncodingType = $encodingType;
           $this->DataMatrixFunctionCharacter = $functionCharacter;
        }

       /* public DataMatrixBarcodeElement(byte[] value, ElementPlacement placement, float xOffset = 0, float yOffset = 0, DataMatrixSymbolSize symbolSize = DataMatrixSymbolSize.Auto, DataMatrixEncodingType encodingType = DataMatrixEncodingType.Auto, DataMatrixFunctionCharacter functionCharacter = DataMatrixFunctionCharacter.None)
                 : base(value, placement, xOffset, yOffset) 
        {
            DataMatrixSymbolSize = symbolSize;
            DataMatrixEncodingType = encodingType;
            DataMatrixFunctionCharacter = functionCharacter;
        }*/

        
        public  $Type = ElementType::DataMatrixBarcode;
        public  $ProcessTilde = false;
        public  $DataMatrixSymbolSize; 
        public  $DataMatrixEncodingType; 
        public  $DataMatrixFunctionCharacter; 

        public function GetjsonSerializeString()
        {

            $jsonArray=   array();

            $jsonArray["type"] ="dataMatrixBarcode";

            //if($this->ProcessTilde != null)
                $jsonArray['processTilde'] = $this->ProcessTilde;
           
           if($this->DataMatrixSymbolSize != null)
                $jsonArray['dataMatrixSymbolSize'] = $this->DataMatrixSymbolSize;
           
           if($this->DataMatrixEncodingType != null)
                $jsonArray['dataMatrixEncodingType'] = $this->DataMatrixEncodingType;
           
           if($this->DataMatrixFunctionCharacter != null)
                $jsonArray['dataMatrixFunctionCharacter'] = $this->DataMatrixFunctionCharacter;
           
           

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
