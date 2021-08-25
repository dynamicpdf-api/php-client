
<?php
include_once('JsonResponse.php');

    /**
    *
    * Represents an image response.
    *
    */
    class ImageResponse extends JsonResponse
    {

        /**
        *
        *  Initializes a new instance of the ImageResponse class. 
        *
        */
        //public ImageResponse()  { }


        /**
        *
        *  Initializes a new instance of the ImageResponse class. 
        *
        * @param  string $jsonContent The image content of the response.
        */
        public function __consruct(string $jsonContent)
        {
            parent::__construct($jsonContent);
            $this->Content = json_decode($jsonContent);
        }


        /**
        *
        *  Gets or sets a collection of ImageInformation. 
        *
        */
        public $Content;
 
    }
?>

