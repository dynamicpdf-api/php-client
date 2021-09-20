<?php
    include_once(__DIR__.'./PdfResource.php');
    include_once(__DIR__.'./Endpoint.php');
    include_once(__DIR__.'./XmlResponse.php');

    class PdfXmp extends Endpoint
    {
        private $resource;


        /**
        *
        *  Initializes a new instance of the PdfInfo class. 
        *
        * @param  PdfResource $resource The resource of type PdfResource.
        */
        public function __construct(PdfResource $resource)
        {
            parent::__construct();
            $this->resource = $resource;
            $this->EndpointName = "pdf-xmp";
        }

       

        public $EndpointName  = "pdf-xmp";
       


        /**
        *
        * Process the pdf resource to get  pdf's xmp data.
        *
		* @return XmlResponse Returns collection of XmlResponse.
        */
        public function Process():XmlResponse
        {
            $client=parent::Init();

            $errCode=json_last_error();
            
            $headr = array();

            $headr[] = 'Content-Type: application/pdf';
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

            $retObject = new XmlResponse($outData);
            $retObject->IsSuccessful = false;
            $retObject->StatusCode = $resCode;
            if ($result == true) 
            {
                if ($retObject !=  null && $retObject->Content!= null ) 
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

