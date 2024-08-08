<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Enum representing color formats.
 */
class ColorFormatType
{
    /**
     * RGB color format.
     */
    public const Rgb = 'Rgb';

    /**
     * RGBA color format.
     */
    public const RgbA = 'RgbA';

    /**
     * Grayscale color format.
     */
    public const Grayscale = 'Grayscale';

    /**
     * Monochrome color format.
     */
    public const Monochrome = 'Monochrome';

    /**
     * Indexed color format.
     */
    public const Indexed = 'Indexed';
}
