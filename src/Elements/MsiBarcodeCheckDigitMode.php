<?php



/**
*
* MSI Barcode check digit modes.
*
*/
class MsiBarcodeCheckDigitMode
{ 

      /**
      *
      * No check digit.
      *
      */
      public const None = "none";


      /**
      *
      * check digit of mod 10.
      *
      */
      public const Mod10 = "mod10";


      /**
      *
      * check digit of mod 11.
      *
      */
      public const Mod11 = "mod11";


      /**
      *
      * check digit of mod 1010.
      *
      */
      public const Mod1010 = "mod1010";


      /**
      *
      * check digit of mod 1110.
      *
      */
      public const Mod1110 = "mod1110";
} 
?>

