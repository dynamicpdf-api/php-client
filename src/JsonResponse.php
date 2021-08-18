﻿<?php
include_once('Response.php');
    /// <summary>
    /// Represents the base class for json response.
    /// </summary>
    abstract class JsonResponse extends Response
    {
        //internal JsonResponse() { }
        public function __construct(string $jsonContent) 
        {
             $this->JsonContent = $jsonContent;
        }

        /// <summary>
        /// Gets the json content.
        /// </summary>
        public  $JsonContent;
    }
?>