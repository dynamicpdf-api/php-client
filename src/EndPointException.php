<?php
namespace DynamicPDF\Api;

use Exception;

/**
 *
 * Represents the exception that occurs in case of any issues with sending the request.
 *
 */
class EndPointException extends Exception
{

    /**
     *
     *  Initializes a new instance of the EndpointException class.
     *
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
