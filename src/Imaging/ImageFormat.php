<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Base class for image formats.
 */
abstract class ImageFormat
{
    /**
     * Gets or sets the image format type.
     */
    public $Type;

    /**
     * Initializes a new instance of the ImageFormat class.
     * 
     * @param string $type The image format type.
     */
    public function __construct($type)
    {
        $this->Type = $type;
    }
}
