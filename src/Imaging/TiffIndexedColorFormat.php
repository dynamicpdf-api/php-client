<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/TiffColorFormat.php';
include_once __DIR__ .'/ColorFormatType.php';

/**
 * Represents indexed color format for TIFF.
 */
class TiffIndexedColorFormat extends TiffColorFormat
{
    /**
     * Gets or sets the QuantizationAlgorithm for TIFF.
     */
    public $QuantizationAlgorithm;

    /**
     * Gets or sets the dithering percentage for TIFF.
     */
    public $DitheringPercent;

    /**
     * Gets or sets the DitheringAlgorithm for TIFF.
     */
    public $DitheringAlgorithm;

    /**
     * Initializes a new instance of the TiffIndexedColorFormat class with indexed color format type.
     */
    public function __construct()
    {
        parent::__construct(ColorFormatType::Indexed);
    }
}
