<?php


     class Response
    {
        

        public  $IsSuccesful; 

        public  $ErrorMessage;

        public  $StatusCode;

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
