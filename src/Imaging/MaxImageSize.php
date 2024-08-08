<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageSize.php';
include_once __DIR__ .'/ImageSizeType.php';

/**
 * Represents an image size that fits within a specified maximum width and height.
 */
class MaxImageSize extends ImageSize
{
    /**
     * Gets or sets the maximum width of the image.
     */
    public $MaxWidth;

    /**
     * Gets or sets the maximum height of the image.
     */
    public $MaxHeight;

    /**
     * Gets or sets the unit of measurement for the maximum width and height.
     */
    public $Unit;

    /**
     * Initializes a new instance of the MaxImageSize class.
     */
    public function __construct()
    {
        $this->Type = ImageSizeType::Max;
    }
}
