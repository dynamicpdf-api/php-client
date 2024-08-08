<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageFormat.php';
include_once __DIR__ .'/ImageFormatType.php';

/**
 * Represents GIF image format with dithering properties.
 */
class GifImageFormat extends ImageFormat
{
    /**
     * Gets or sets the dithering percentage.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the DitheringAlgorithm.
     */
    public $DitheringAlgorithm;

    /**
     * Initializes a new instance of the GifImageFormat class and sets the image format type to GIF.
     */
    public function __construct()
    {
        parent::__construct(ImageFormatType::GIF);
    }
}
