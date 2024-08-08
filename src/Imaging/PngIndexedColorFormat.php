<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/PngColorFormat.php';
include_once __DIR__ . '/ColorFormatType.php';

/**
 * Represents indexed color format for PNG.
 */
class PngIndexedColorFormat extends PngColorFormat
{
    /**
     * Gets or sets the QuantizationAlgorithm for PNG.
     */
    public $QuantizationAlgorithm;

    /**
     * Gets or sets the dithering percentage for PNG.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the DitheringAlgorithm for PNG.
     */
    public $DitheringAlgorithm;

    /**
     * Initializes a new instance of the PngIndexedColorFormat class with indexed color format type.
     */
    public function __construct()
    {
        parent::__construct(ColorFormatType::Indexed);
    }
}
