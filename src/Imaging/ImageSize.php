<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Base class for image size types.
 */
abstract class ImageSize
{
    /**
     * Type of the image size.
     */
    public $Type;

    /**
     * Initializes a new instance of the ImageSize class.
     */
    public function __construct()
    {
        // Constructor body can be empty for now
    }
}
