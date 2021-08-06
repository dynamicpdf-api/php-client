<?php
require_once('Endpoint.php');
require_once('PdfInstructions.php');
require_once('Input.php');
require_once('PdfInput.php');
require_once('Resource.php');
require_once('PdfResource.php');
require_once('PdfResponse.php');
require_once('PageInput.php');
//require_once('LayoutDataResource.php');


function nestedLowercase($value) :string
{
    if (is_array($value)) {
        return array_map('nestedLowercase', $value);
    }
    return strtolower($value);
}


     class Pdf extends Endpoint
    {
        public   $Instructions ;
     

        
        //public $jsonData="";

        public function __construct() 
        {
            $this->EndpointName = "pdf";
            $this->Instructions = new PdfInstructions();
        }
       
        public function Process():PdfResponse
        {
            $client=parent::Init();
           
           
            // $resources = array();
             foreach ($this->Instructions->Inputs as $input) 
             {
                if($input->Type == InputType::Page)
                {
                     $pageInput = $input;
                    foreach ($pageInput->Elements as $element)
                    {
                        if ($element->Resource != null)
                        {
                            array_push($this->Resources,$element->Resource);
                        }
                        if ($element->TextFont != null)
                        {
                            $fontSerializedArray=$element->TextFont->GetjsonSerializeString();
                            array_push($this->Instructions->Fonts, $fontSerializedArray);
                        }
                    }
                    
                }

                foreach ($input->Resources as $resource) 
                {
                    if($resource!= null)
                    $this->Resources[$resource->ResourceName]=$resource;
                }
                if ($input->GetTemplate() != null)
                {
                        array_push( $this->Instructions->Templates,$input->GetTemplate());
                        if($input->GetTemplate()->Elements != null  && count($input->GetTemplate()->Elements) > 0)
                        {
                            foreach($input->GetTemplate()->Elements as $element  )
                            {
                                if ($element->Resource != null)
                                {
                                    $this->Resources[$element->Resource->ResourceName]=$element->Resource;
                                }
                                if ($element->TextFont != null)
                                {
                                    $fontSerializedArray=$element->TextFont->GetjsonSerializeString();
                                   
                                    if(count($fontSerializedArray)>0)
                                        array_push($this->Instructions->Fonts,$fontSerializedArray);
                                }
                                
                            }
                        }
                }
             }


            $data_string = json_encode($this->Instructions, JSON_PRETTY_PRINT);

           // if(isset($debugMode))
           // $this->jsonData=$data_string ;

            //echo( $data_string."\n\n");
          
            if ($this->Instructions->Inputs == null)
                    throw new EndPointException("Minimum one input required."); 

/*------------------------------------------------------------------------------------------------------*/
            $body = array();
            $algos = hash_algos();
            $hashAlgo = null;
            foreach ( array('sha1', 'md5') as $preferred )
            {
                if ( in_array($preferred, $algos) ) 
                {
                    $hashAlgo = $preferred;
                    break;
                }
            }

            if ( $hashAlgo === null ) 
            { 
                list($hashAlgo) = $algos; 
            }

            $boundary =  '----------------------------' .
                    substr(hash($hashAlgo, 'sample Text ' . microtime()), 0, 12);

            $crlf = "\r\n";
            $body[] = '--' . $boundary;
            $body[] = 'Content-Disposition: form-data; name="' . 'Instructions' . '"; filename="' . "Instructions.json" . '"';
            $body[] = 'Content-Type: application/octet-stream';
            $body[] = '';
            $body[] = $data_string ;

        
            foreach ( $this->Resources as $field ) 
            {
                $body[] = '--' . $boundary;
                $body[] = 'Content-Disposition: form-data; name="' . "Resource" . '"; filename="' . $field->ResourceName . '"';
                $body[] = 'Content-Type: application/octet-stream';
                $body[] = '';
                if($field->ResourcePath!= null)
                    $body[] = file_get_contents($field->ResourcePath);
                else
                    $body[] = $field->Data;

            }
            $body[] = '--' . $boundary . '--';
            $body[] = '';
            $contentType = 'multipart/form-data; boundary=' . $boundary;
            $content = join($crlf, $body);
            $contentLength = strlen($content);

            curl_setopt($client, CURLOPT_HTTPHEADER, 
                        array('Authorization:Bearer '.Endpoint::$DefaultApiKey,
                            'Content-Length: ' . $contentLength,
                            'Expect: 100-continue',
                            'Content-Type: ' . $contentType  ));

            curl_setopt($client, CURLOPT_POSTFIELDS, $content);

            ob_start();
            $result = curl_exec($client);
            $outData = ob_get_contents();
            ob_end_clean();

            $resCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

            $retObject = new PdfResponse();
            $retObject->IsSuccessful = false;
            $retObject->StatusCode = $resCode;
            if ($result == true) 
            {
                if (strncmp($outData, '%PDF', 4) == 0) 
                    {
                    $retObject->IsSuccessful = true;
                    $retObject->PdfContent = $outData;
                    } 
                elseif (trim($outData)[0] == '{') 
                    {
                    $retObject->ErrorJson = $outData;
                    if ($retObject->StatusCode == 400) {
                    $retObject->ErrorMessage = json_decode($outData)->message;
                    }
            }
        }
         
            curl_close($client);  
           
            return  $retObject;
        }
    
        private function GetImageMimeType(string $filePath)
        {
             $mimeType = "";
            if (filePath.EndsWith("jpg") || filePath.EndsWith("jpeg"))
                $mimeType = "image/jpeg";
            else if (filePath.EndsWith("tif") || filePath.EndsWith("tiff"))
                $mimeType = "image/tiff";
            else if (filePath.EndsWith("gif"))
                $mimeType = "image/gif";
            else if (filePath.EndsWith("bmp"))
                $mimeType = "image/bmp";
            else if (filePath.EndsWith("png"))
                $mimeType = "image/png";
            else
                throw new Exception("Unsupported image type");
            return $mimeType;
        }
       
    }
?>
