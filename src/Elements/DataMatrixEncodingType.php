<?php
namespace DynamicPDF\Api\Elements;

/**
 *
 * Specifies EncodingType for DataMatrix Barcode.
 *
 */
class DataMatrixEncodingType
{

    /**
     *
     * Calculates Encoding based on Value.
     *
     */
    public const Auto = "auto";

    /**
     *
     * Calculates ASCII Encoding based on Value.
     *
     */
    public const AutoAscii = "autoAscii";

    /**
     *
     * ASCII Encoding.
     *
     */
    public const Ascii = "ascii";

    /**
     *
     * Extended ASCII Encoding.
     *
     */
    public const ExtendedAscii = "extendedAscii";

    /**
     *
     * Double digit Encoding.
     *
     */
    public const DoubleDigit = "doubleDigit";

    /**
     *
     * C40 Encoding.
     *
     */
    public const C40 = "c40";

    /**
     *
     * Text Encoding.
     *
     */
    public const Text = "text";

    /**
     *
     * ANSI X12 Encoding.
     *
     */
    public const AnsiX12 = "ansiX12";

    /**
     *
     * EDIFACT Encoding.
     *
     */
    public const Edifact = "edifact";

    /**
     *
     * Base256 Encoding.
     *
     */
    public const Base256 = "base256";
}
