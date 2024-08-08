<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageSize.php';
include_once __DIR__ .'/ImageSizeType.php';

/**
 * Represents an image size with fixed dimensions.
 */
class FixedImageSize extends ImageSize
{
    /**
     * Gets or sets the width of the image.
     */
    public $Width;

    /**
     * Gets or sets the height of the image.
     */
    public $Height;

    /**
     * Gets or sets the unit of measurement for the width and height.
     */
    public $Unit;

    /**
     * Initializes a new instance of the FixedImageSize class and sets the image size type to Fixed.
     */
    public function __construct()
    {
        $this->Type = ImageSizeType::Fixed;
    }
}
