<?php
namespace DynamicPDF\Api;


/**
 *
 * Represents the base class for response.
 *
 */
class Response
{

    /**
     *
     * Gets the boolean, indicating the response's status.
     *
     */
    public $IsSuccesful;

    /**
     *
     * Gets the error message.
     *
     */
    public $ErrorMessage;

    /**
     *
     * Gets the error id.
     *
     */
    public $ErrorId;

    /**
     *
     * Gets the status code.
     *
     */
    public $StatusCode;

    /**
     *
     * Gets the error json.
     *
     */
    public $ErrorJson;

}
