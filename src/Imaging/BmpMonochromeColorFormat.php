<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/BmpColorFormat.php';
include_once __DIR__ .'/ColorFormatType.php';

/**
 * Represents monochrome color format for BMP.
 */
class BmpMonochromeColorFormat extends BmpColorFormat
{
    /**
     * Gets or sets the black threshold for monochrome BMP, ranges from 0-255.
     */
    public $BlackThreshold;

    /**
     * Gets or sets the dithering percentage for BMP.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the dithering algorithm for BMP.
     */
    public $DitheringAlgorithm;

    /**
     * Creates object for monochrome color format for BMP image format.
     */
    public function __construct()
    {
        parent::__construct(ColorFormatType::Monochrome);
    }
}
