<?php

namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ColorFormat.php';


/**
 * Base class for TIFF color formats and used for RGB and Grayscale color formats.
 */
class TiffColorFormat extends ColorFormat
{
    /**
     * Initializes a new instance of the TiffColorFormat class with the specified color format type.
     *
     * @param string $type The color format type.
     */
    public function __construct($type)
    {
        $this->Type = $type;
    }
}
