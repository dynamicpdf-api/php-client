<?php
namespace DynamicPDF\Api\Elements;

/**
 *
 * The type of Compaction to encode.
 *
 */
class Compaction
{

    /**
     *
     * Byte Compaction.
     *
     */
    public const Byte = "byte";

    /**
     *
     * Text Compaction.
     *
     */
    public const Text = "text";

    /**
     *
     * Numeric Compaction.
     *
     */
    public const Numeric = "numeric";

    /**
     *
     * All Compactions.
     *
     */
    public const Automatic = "automatic";
}
