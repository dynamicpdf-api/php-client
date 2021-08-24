<?php


    /// <summary>
    /// MSI Barcode check digit modes.
    /// </summary>
class MsiBarcodeCheckDigitMode
{ 
              /// <summary>
        /// No check digit.
        /// </summary>
      public const None = "none";

              /// <summary>
        /// check digit of mod 10.
        /// </summary>
      public const Mod10 = "mod10";

        /// <summary>
        /// check digit of mod 11.
        /// </summary>
      public const Mod11 = "mod11";

        /// <summary>
        /// check digit of mod 1010.
        /// </summary>
      public const Mod1010 = "mod1010";

        /// <summary>
        /// check digit of mod 1110.
        /// </summary>
      public const Mod1110 = "mod1110";
} 
?>
