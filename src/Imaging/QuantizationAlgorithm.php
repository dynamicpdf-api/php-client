<?php

namespace DynamicPDF\Api\Imaging;

/**
 * Enum representing quantization algorithms.
 */
class QuantizationAlgorithm
{
    /**
     * Octree quantization algorithm.
     */
    public const Octree = 'Octree';

    /**
     * Web-safe color quantization algorithm.
     */
    public const WebSafe = 'WebSafe';

    /**
     * Werner quantization algorithm.
     */
    public const Werner = 'Werner';

    /**
     * Wu quantization algorithm.
     */
    public const Wu = 'Wu';
}
