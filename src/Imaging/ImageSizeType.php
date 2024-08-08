<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Specifies the type of image size.
 */
class ImageSizeType
{
    /**
     * DPI-based image size.
     */
    public const Dpi = 'Dpi';

    /**
     * Fixed image size.
     */
    public const Fixed = 'Fixed';

    /**
     * Image size that fits within a given maximum size.
     */
    public const Max = 'Max';

    /**
     * Percentage-based image size.
     */
    public const Percentage = 'Percentage';
}
