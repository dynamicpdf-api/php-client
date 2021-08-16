
<?php

    /// <summary>
    /// Represents an image response.
    /// </summary>
    class ImageResponse extends JsonResponse
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="ImageResponse"/> class.
        /// </summary>
        //public ImageResponse()  { }

        /// <summary>
        /// Initializes a new instance of the <see cref="ImageResponse"/> class.
        /// </summary>
        /// <param name="jsonContent">The image content of the response.</param>
        public function __consruct(string jsonContent)
        {
            parent::__consruct(jsonContent)
            $this->Content = JsonConvert.DeserializeObject<List<ImageInformation>>(base.JsonContent);
        }

        /// <summary>
        /// Gets or sets a collection of <see cref="ImageInformation"/>.
        /// </summary>
        public $Content;
 
    }
}
