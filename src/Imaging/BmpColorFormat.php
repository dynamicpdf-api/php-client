<?php
namespace DynamicPDF\Api\Imaging;

include_once __DIR__ . '/ColorFormat.php';
include_once __DIR__ .'/ColorFormatType.php';

/**
 * Base class for BMP color formats
 */
class BmpColorFormat extends ColorFormat
{
    /**
     * Creates BmpColorFormat object with the given type.
     *
     * @param mixed $type
     */
    public function __construct($type)
    {
        if ($type != ColorFormatType::Monochrome) {
            $this->Type = ColorFormatType::Rgb;
        } else {
            $this->Type = $type;
        }
    }
}


