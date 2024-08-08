<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Enum representing dithering algorithms.
 */
class DitheringAlgorithm
{
    /**
     * Floyd-Steinberg dithering algorithm.
     */
    public const FloydSteinberg = 'FloydSteinberg';

    /**
     * Bayer dithering algorithm.
     */
    public const Bayer = 'Bayer';

    /**
     * No dithering.
     */
    public const None = 'None';
}
