<?php

    /// <summary>
    /// Represents the exception that occurs in case of any issues with sending the request.
    /// </summary>
    class EndPointException extends Exception
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="EndpointException"/> class.
        /// </summary>
        public function __construct(string $message)
        { 
            parent::__construct($message);
        }
    }

?>
