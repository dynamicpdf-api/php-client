<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageSize.php';
include_once __DIR__ .'/ImageSizeType.php';

/**
 * Represents an image size defined by DPI (Dots Per Inch).
 */
class DpiImageSize extends ImageSize
{
    /**
     * Gets or sets the horizontal DPI (Dots Per Inch) of the image.
     */
    public $HorizontalDpi;

    /**
     * Gets or sets the vertical DPI (Dots Per Inch) of the image.
     */
    public $VerticalDpi;

    /**
     * Initializes a new instance of the DpiImageSize class and sets the image size type to DPI.
     */
    public function __construct()
    {
        $this->Type = ImageSizeType::Dpi;
    }
}
