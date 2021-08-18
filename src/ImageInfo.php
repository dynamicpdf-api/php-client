<?php

include_once('Endpoint.php');
include_once('PdfInfoResponse.php');

    /// <summary>
    /// Represents an image information endpoint.
    /// </summary>
    class ImageInfo extends Endpoint
    {
        private $resource;

        /// <summary>
        /// Initializes a new instance of the <see cref="ImageInfo"/> class.
        /// </summary>
        /// <param name="resource">The image resource of type <see cref="ImageResource"/>.</param>
        public function __construct(ImageResource $resource)
        {
            $this->resource = $resource;
            $this->EndpointName="image-info";
        }


        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public  $StartPage;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
        public $PageCount;

       

        /// <summary>
        /// Process the image resource to get image's information.
        /// </summary>
        public function Process():PdfInfoResponse
        {
            $client=parent::Init();

            $errCode=json_last_error();
            
            $headr = array();

            $headr[] = 'Content-Type: image/'.substr($this->resource->FileExtension(),1);
            //secho($this->resource->FileExtension());
            $headr[] = 'Authorization:Bearer '.Endpoint::$DefaultApiKey;
            curl_setopt($client, CURLOPT_HTTPHEADER,$headr);
            
            curl_setopt($client, CURLOPT_POSTFIELDS,$this->resource->Data);
         
            //$params = array('startPage' => $this->StartPage,'pageCount' => $this->PageCount);
            //$url = Endpoint::$DefaultBaseUrl."/".$this->EndpointName . '?' . http_build_query($params);
            //curl_setopt($client, CURLOPT_URL, $url);

            curl_setopt($client, CURLOPT_BINARYTRANSFER, 1);
          
            ob_start();
            $result = curl_exec($client);
            $outData = ob_get_contents();
            ob_end_clean();
            
           

            $resCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

            $retObject = new PdfInfoResponse($outData);
            $retObject->IsSuccessful = false;
            $retObject->StatusCode = $resCode;
            if ($result == true) 
            {
                if ($retObject !=  null && $retObject->Content!= null ) 
                {
                    $retObject->IsSuccessful = true;
                } 
                elseif ($outData != null && trim($outData)[0] == '{') 
                {
                    $retObject->ErrorJson = $outData;
                    if ($retObject->StatusCode == 400) 
                    {
                        $retObject->ErrorMessage = json_decode($outData)->message;
                    }
                }
            }
         
            curl_close($client);  
           
            return  $retObject;
        }
    }
?>
