<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/TiffColorFormat.php';
include_once __DIR__ .'/ColorFormatType.php';

/**
 * Represents monochrome color format for TIFF with black threshold and compression type.
 */
class TiffMonochromeColorFormat extends TiffColorFormat
{
    /**
     * Gets or sets the black threshold for monochrome TIFF, ranges from 0-255.
     */
    public $BlackThreshold;

    /**
     * Gets or sets the CompressionType for monochrome TIFF.
     */
    public $CompressionType;

    /**
     * Gets or sets the dithering percentage for TIFF.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the DitheringAlgorithm for TIFF.
     */
    public $DitheringAlgorithm;

    /**
     * Initializes a new instance of the TiffMonochromeColorFormat class with monochrome color format type.
     */
    public function __construct()
    {
        parent::__construct(ColorFormatType::Monochrome);
    }
}
