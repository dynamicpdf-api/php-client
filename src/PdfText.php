﻿<?php

include_once('Endpoint.php');
include_once('PdfTextResponse.php');


    class PdfText extends Endpoint
    {
        private $resource;

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfText"/> class.
        /// </summary>
        /// <param name="resource">The image resource of type <see cref="PdfResource"/>.</param>
        /// <param name="startPage">The start page.</param>
        /// <param name="pageCount">The page count.</param>
        public function __construct(PdfResource $resource, int $startPage = 1, int $pageCount = 0)
        {
            $this->resource = $resource;
            $this->StartPage = $startPage;
            $this->PageCount = $pageCount;
        }

        public  $EndpointName  = "pdf-text";

        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public $StartPage=1;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
        public $PageCount=0 ;

       
      
        /// <summary>
        /// Process the pdf resource to get pdf's text.
        /// </summary>
        public function Process():PdfTextResponse
        {
            $client=parent::Init();

            $errCode=json_last_error();
            
            $headr = array();

            $headr[] = 'Content-Type: application/pdf';
            $headr[] = 'Authorization:Bearer '.Endpoint::$DefaultApiKey;
            curl_setopt($client, CURLOPT_HTTPHEADER,$headr);
          

            curl_setopt($client, CURLOPT_POSTFIELDS,$this->resource->Data);
         
            $params = array('startPage' => $this->StartPage,'pageCount' => $this->PageCount);
            $url = Endpoint::$DefaultBaseUrl."/".$this->EndpointName . '?' . http_build_query($params);
            curl_setopt($client, CURLOPT_URL, $url);

            curl_setopt($client, CURLOPT_BINARYTRANSFER, 1);
          
            ob_start();
            $result = curl_exec($client);
            $outData = ob_get_contents();
            ob_end_clean();
            
           

            $resCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

            $retObject = new PdfTextResponse($outData);
            $retObject->IsSuccessful = false;
            $retObject->StatusCode = $resCode;
            if ($result == true) 
            {
                if ($retObject !=  null && $retObject->Content!= null && count($retObject->Content)>0) 
                {
                    $retObject->IsSuccessful = true;
                } 
                elseif (trim($outData)[0] == '{') 
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
