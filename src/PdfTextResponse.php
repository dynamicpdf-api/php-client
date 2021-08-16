﻿<?php

    /// <summary>
    /// Represents the pdf text response.
    /// </summary>
    class PdfTextResponse extends JsonResponse
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PdfTextResponse"/> class.
        /// </summary>
        //public PdfTextResponse() : base() { }

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfResponse"/> class.
        /// </summary>
        /// <param name="jsonContent">The json content</param>
        public function __construct(string jsonContent) : base(jsonContent)
        {

            $this->Content = JsonConvert.DeserializeObject<List<PdfContent>>(base.JsonContent);
        }

        /// <summary>
        /// Gets the collection of PdfContent.
        /// </summary>
        public $Content = array();

    }
?>
