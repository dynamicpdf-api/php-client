<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageSize.php';
include_once __DIR__ .'/ImageSizeType.php';

/**
 * Represents an image size based on percentage scaling.
 */
class PercentageImageSize extends ImageSize
{
    /**
     * Gets or sets the horizontal scaling percentage.
     */
    public $HorizontalPercentage;

    /**
     * Gets or sets the vertical scaling percentage.
     */
    public $VerticalPercentage;

    /**
     * Initializes a new instance of the PercentageImageSize class.
     */
    public function __construct()
    {
        $this->Type = ImageSizeType::Percentage;
    }
}
