<?php
include_once __DIR__ . './Response.php';

/**
 *
 * Represents the base class for json response.
 *
 */
abstract class JsonResponse extends Response
{
    //internal JsonResponse() { }
    public function __construct(?string $jsonContent = null)
    {
        $this->JsonContent = $jsonContent;
    }

    /**
     *
     * Gets the json content.
     *
     */
    public $JsonContent;
}
