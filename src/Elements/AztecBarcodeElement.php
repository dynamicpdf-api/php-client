<?php 
//
include_once('Element.php');
include_once('ElementType.php');
include_once('AztecSymbolSize.php');
include_once('BarcodeElement.php');
include_once('Dim2BarcodeElement.php');

   /// <summary>
    /// Represents an Aztec barcode element.
    /// </summary>
    /// <remarks>
    /// With some of the .Net runtimes (example: .Net Core 2.0) the ECI values 20, 28, 29 and 30 will give the error "No data is available 
    /// for encoding 'code page number'. For information on defining a custom encoding, see the documentation for the Encoding.RegisterProvider method.".
    /// </remarks>
    class AztecBarcodeElement extends Dim2BarcodeElement
    {
          /// <summary>
        /// Initializes a new instance of the <see cref="AztecBarcodeElement"/> class.
        /// </summary>
        /// <param name="value">The value of the barcode.</param>
        /// <param name="placement">The placement of the barcode on the page.</param>
        /// <param name="xOffset">The X coordinate of the barcode.</param>
        /// <param name="yOffset">The Y coordinate of the barcode.</param>
        public function __construct(string $value, string $placement, float $xOffset = 0, float $yOffset = 0)
        { 
            parent::__construct($value, $placement, $xOffset, $yOffset);
        }

        public  $Type  = ElementType::AztecBarcode;

         /// <summary>
        /// Gets or Sets a boolean indicating whether to process tilde symbol in the input.
        /// </summary>
        /// <remarks>
        /// Setting <b>true</b> will check for ~ character and processes it for FNC1 or ECI characters.
        /// With some of the .Net runtimes (example: .Net Core 2.0), the ECI values 20, 28, 29 and 30 will give the error "No data is available 
        /// for encoding 'code page number'. For information on defining a custom encoding, see the documentation for the Encoding.RegisterProvider method.".         
        /// </remarks>
        public  $ProcessTilde= false;

        /// <summary>
        /// Gets or Sets the barcode size, <see cref="AztecSymbolSize"/>.
        /// </summary>
        public  $SymbolSize=AztecSymbolSize::Auto;

         /// <summary>
        /// Gets or Sets the error correction value.
        /// </summary>
        /// <remarks>Error correction value may be between 5% to 95%.</remarks>
        public  $AztecErrorCorrection=0;

        /// <summary>
        /// Gets or Sets a boolean representing if the barcode is a reader initialization symbol.
        /// </summary>
        /// <remarks>Setting <b>true</b> will mark the symbol as reader initialization symbol
        /// and the size of the symbol should be one of the following, R15xC15 Compact, R19xC19, R23xC23, R27xC27, R31xC31, R37xC37, R41xC41, R45xC45, R49xC49, R53xC53, R57xC57, R61xC61, R67xC67, R71xC71, R75xC75,
        /// R79xC79, R83xC83, R87xC87, R91xC91, R95xC95, R101xC101, R105xC105, R109xC109, however it is recommended to set Auto.</remarks>
        public  $ReaderInitializationSymbol= false;

        public function GetjsonSerializeString()
        {

            $jsonArray=   array();

            $jsonArray["type"] ="aztecBarcode";

            //if($this->ProcessTilde != null)
                $jsonArray['processTilde'] = $this->ProcessTilde;

            if($this->SymbolSize != null)
                $jsonArray['symbolSize'] = $this->SymbolSize;

            if($this->AztecErrorCorrection != null)
                $jsonArray['aztecErrorCorrection'] = $this->AztecErrorCorrection;

            //if($this->ReaderInitializationSymbol != null)
                $jsonArray['readerInitializationSymbol'] = $this->ReaderInitializationSymbol;



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