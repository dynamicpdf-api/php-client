<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ColorFormat.php';

/**
 * Base class for PNG color formats, used for RGB, RGBA, and Grayscale color formats.
 */
class PngColorFormat extends ColorFormat
{
    /**
     * Initializes a new instance of the PngColorFormat class.
     *
     * @param string $type The color format type.
     */
    public function __construct($type)
    {
        $this->Type = $type;
    }
}
