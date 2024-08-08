<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ImageFormat.php';
include_once __DIR__ .'/ImageFormatType.php';

/**
 * Represents PNG image format with color format.
 */
class PngImageFormat extends ImageFormat
{
    /**
     * Gets or sets the color format for PNG.
     *
     * @var PngColorFormat|null
     */
    public $ColorFormat;

    /**
     * Initializes a new instance of the PngImageFormat class.
     */
    public function __construct()
    {
        parent::__construct(ImageFormatType::PNG);
    }
}
