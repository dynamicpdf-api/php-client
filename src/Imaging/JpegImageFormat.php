<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageFormat.php';
include_once __DIR__ .'/ImageFormatType.php';

/**
 * Represents JPEG image format with quality.
 */
class JpegImageFormat extends ImageFormat
{
    /**
     * Gets or sets the quality of the JPEG image.
     * 
     * The quality ranges from 0 to 100, where 0 indicates highly compressed and low quality 
     * and 100 indicates high quality and less compressed image.
     */
    public $Quality;

    /**
     * Initializes a new instance of the JpegImageFormat class.
     */
    public function __construct()
    {
        parent::__construct(ImageFormatType::JPEG);
    }
}
