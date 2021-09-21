<?php

include_once(__DIR__.'./Endpoint.php');
include_once(__DIR__.'./ImageResponse.php');


    /**
    *
    * Represents an image information endpoint.
    *
    */
    class ImageInfo extends Endpoint
    {
        private $resource;


        /**
        *
        *  Initializes a new instance of the ImageInfo class. 
        *
        * @param  ImageResource $resource The image resource of type ImageResource.
        */
        public function __construct(ImageResource $resource)
        {
            parent::__construct();
            $this->resource = $resource;
           
        }

        public $EndpointName="image-info";

       
        /**
        *
        * Process the image resource to get image's information.
        *
        * @return ImageResponse Returns collection of ImageResponse.
        */
        public function Process():ImageResponse
        {
            $client=parent::Init();

            curl_setopt($client, CURLOPT_URL, $this->BaseUrl."/".$this->EndpointName);

            $errCode=json_last_error();
            
            $headr = array();

            $headr[] = 'Content-Type: image/'.substr($this->resource->FileExtension(),1);
            //secho($this->resource->FileExtension());
            $headr[] = 'Authorization:Bearer '.$this->ApiKey;
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

            $retObject = new ImageResponse($outData);
            $retObject->IsSuccessful = false;
            $retObject->StatusCode = $resCode;
            if ($result == true) 
            {
                if ($retObject !=  null && $retObject->StatusCode== 200 ) 
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

