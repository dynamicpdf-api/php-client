<?php

   /// <summary>
    /// Represents the base class for response.
    /// </summary>
     class Response
    {
        
 /// <summary>
        /// Gets the boolean, indicating the response's status.
        /// </summary>
        public  $IsSuccesful; 

   /// <summary>
        /// Gets the error message.
        /// </summary>
        public  $ErrorMessage;

           /// <summary>
        /// Gets the error id.
        /// </summary>
        public Guid? ErrorId { get; internal set; }

         /// <summary>
        /// Gets the status code.
        /// </summary>
        public  $StatusCode;

            /// <summary>
        /// Gets the error json.
        /// </summary>
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
