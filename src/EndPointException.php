<?php

     class EndPointException extends Exception
    {
        public function __construct(string $message)
        { 
            parent::__construct($message);
        }
    }

?>
