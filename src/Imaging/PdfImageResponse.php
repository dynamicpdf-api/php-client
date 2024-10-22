<?php

namespace DynamicPDF\Api\Imaging;
use DynamicPDF\Api\Response;

/**
 * Represents a PdfImage response.
 */
class PdfImageResponse extends Response
{
    /**
     * Image format.
     *
     * @var string
     */
    public $ImageFormat;

    /**
     * Data of the images.
     *
     * @var array
     */
    public $Images = [];

    /**
     * Content type.
     *
     * @var string
     */
    public $ContentType;

    /**
     * Horizontal DPI.
     *
     * @var int
     */
    public $HorizontalDpi = 0;

    /**
     * Vertical DPI.
     *
     * @var int
     */
    public $VerticalDpi = 0;

    /**
     * Initializes a new instance of the PdfImageResponse class.
     */
    public function __construct()
    {
        // Initialize Images as an empty array
        $this->Images = [];
    }

}

/**
 * Represents an Image from the response.
 */
class Image
{
    public $PageNumber;
    public $Data;
    public $BilledPages;
    public $Width;
    public $Height;

}
