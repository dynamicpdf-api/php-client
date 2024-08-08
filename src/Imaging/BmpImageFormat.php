<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageFormat.php';
include_once __DIR__ .'/ImageFormatType.php';

/**
 * Represents BMP image format with color format.
 */
class BmpImageFormat extends ImageFormat
{
    /**
     * Gets or sets the BmpColorFormat for BMP.
     */
    public $ColorFormat;

    /**
     * Initializes a new instance of the BmpImageFormat class.
     */
    public function __construct()
    {
        parent::__construct(ImageFormatType::BMP);
    }
}
