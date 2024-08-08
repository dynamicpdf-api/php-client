<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageFormat.php';
include_once __DIR__ .'/ImageFormatType.php';

/**
 * Represents TIFF image format with color format.
 */
class TiffImageFormat extends ImageFormat
{
    /**
     * Gets or sets a value indicating whether the TIFF image format supports multiple pages.
     *
     * @var bool
     */
    public $MultiPage;

    /**
     * Gets or sets the color format for TIFF.
     *
     * @var TiffColorFormat|null
     */
    public $ColorFormat;

    /**
     * Initializes a new instance of the TiffImageFormat class.
     */
    public function __construct()
    {
        parent::__construct(ImageFormatType::TIFF);
    }
}
