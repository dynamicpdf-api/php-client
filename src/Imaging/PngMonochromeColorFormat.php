<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/PngColorFormat.php';
include_once __DIR__ .'/ColorFormatType.php';

/**
 * Represents monochrome color format for PNG with black threshold.
 */
class PngMonochromeColorFormat extends PngColorFormat
{
    /**
     * Gets or sets the black threshold for monochrome PNG, ranges from 0-255.
     */
    public $BlackThreshold;

    /**
     * Gets or sets the dithering percentage for PNG.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the DitheringAlgorithm for PNG.
     */
    public $DitheringAlgorithm;

    /**
     * Initializes a new instance of the PngMonochromeColorFormat class with monochrome color format type.
     */
    public function __construct()
    {
        parent::__construct(ColorFormatType::Monochrome);
    }
}
