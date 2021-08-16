<?php

    /// <summary>
    /// Represents the pdf inforamtion response.
    /// </summary>
    class PdfInfoResponse extends JsonResponse
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInfoResponse"/> class.
        /// </summary>
       // public __construct()  { }

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInfoResponse"/> class.
        /// </summary>
        /// <param name="jsonContent">The json of pdf information.</param>
        public __construct(string $jsonContent) :
        {
             parent::__construct(jsonContent)
            $this->Content = JsonConvert.DeserializeObject<PdfInformation>(base.JsonContent);
        }

        /// <summary>
        /// Gets the pdf information content.
        /// </summary>
        public $Content;


    }
?>
