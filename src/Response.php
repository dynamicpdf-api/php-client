<?php


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
        public  $IsSuccesful; 


        /**
        *
        * Gets the error message.
        *
        */
        public  $ErrorMessage;


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
        public  $StatusCode;


        /**
        *
        * Gets the error json.
        *
        */
        public  $ErrorJson;

        public function SetErrorJson(string $value)
        {
            $this->ErrorJson = $value;
        }

        public function SetErrorCode(int $value)
        {
            $this->StatusCode = $value;
        }
        public function SetIsSuccessful(bool $value)
        {
            $this->IsSuccesful = $value;
        }

        public function SetErrorMessage(string $value)
        {
            $this->ErrorMessage = $value;
        }
    }
?>

