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





     /**
     *
     * Represents a pdf endpoint.
     *
     */
     class Pdf extends Endpoint
    {
        public $instructions;
        public $JsonData;
        

        /**
        *
        *  Initializes a new instance of the Pdf class. 
        *
        */
        public function __construct() 
        {
            $this->instructions = new PdfInstructions();
        }

        public $EndpointName  = "pdf";


        /**
        *
        * Gets or sets the collection of resource.
        *
        */
        public $Resources  = array();


        /**
        *
        * Gets or sets the author.
        *
        */
        public $Author;
       


        /**
        *
        * Gets or sets the title.
        *
        */
        public $Title;
       


        /**
        *
        * Gets or sets the subject.
        *
        */
        public $Subject;
      


        /**
        *
        * Gets or sets the creator.
        *
        */
        public $Creator ="DynmaicPDF Cloud Api";
        


        /**
        *
        * Gets or sets the keywords.
        *
        */
        public $Keywords; 
       


        /**
        *
        * Gets or sets the security.
        *
        */
        public $Security; 
        


        /**
        *
        * Gets or sets the value indicating whether to flatten all form fields.
        *
        */
        public $FlattenAllFormFields;
        


        /**
        *
        * Gets or sets the value indicating whether to retain signature form field.
        *
        */
        public  $RetainSignatureFormFields; 
        


        /**
        *
        *  Returns a PdfInput object containing the input pdf. 
        *
        * @param  PdfResource $resource The resource of type PdfResource.        *
        * @param  MergeOptions $options The merge options for the pdf.
        */
        public function AddPdf(PdfResource $resource, MergeOptions $options = null)
        {
            $input = new PdfInput($resource, $options);
            array_push($this->Inputs,$input);
            return $input;
        }


        /**
        *
        *  Returns a PdfInput object containing the input pdf. 
        *
        * @param  string $cloudResourcePath The resource path in cloud resource manager.
        * @param  MergeOptions $options The merge options for the pdf.
        */
        public function AddPdfCloud(string $cloudResourcePath, MergeOptions $options = null)
        {
            $input =  PdfInput::CreatePdfInput($cloudResourcePath, $options);
            array_push($this->Inputs,$input);
            return $input;
        }


        /**
        *
        *  Returns a ImageInput object containing the input pdf. 
        *
        * @param  ImageResource $resource The resource of type ImageResource.        *
        */
        public function AddImage(ImageResource $resource)
        {
            $input = new ImageInput($resource);
            array_push($this->Inputs,$input);
            return $input;
        }


        /**
        *
        *  Returns a ImageInput object containing the input pdf. 
        *
        * @param  string $cloudResourcePath The resource path in cloud resource manager.
        */
        public function AddImageCloud(string $cloudResourcePath)
        {
            $input = new ImageInput($cloudResourcePath);
            array_push($this->Inputs,$input);
            return $input;
        }


        /**
        *
        *  Returns a DlexInput object containing the input pdf. 
        *
        * @param  DlexResource $dlexResource The dlex resource of type DlexResource.        *
        * @param  LayoutDataResource $layoutData The layout data resource of type LayoutDataResource.        *
        */
        public function AddDlex(DlexResource $dlexResource, LayoutDataResource $layoutData)
        {
            $input = new DlexInput($dlexResource, $layoutData);
            array_push($this->Inputs,$input);
            return $input;
        }


       /**
       *
       *  Returns a DlexInput object containing the input pdf. 
       *
       * @param  string $cloudResourcePath The resource path in cloud resource manager.
       * @param  LayoutDataResource $layoutData The layout data resource of type LayoutDataResource.       *
       */
       /* public function AddDlexCloud(string $cloudResourcePath, LayoutDataResource $layoutData)
        {
            $input = new DlexInput($cloudResourcePath, $layoutData);
            $this->Inputs($input);
            return $input;
        }*/


        /**
        *
        *  Returns a DlexInput object containing the input pdf. 
        *
        * @param  string $cloudResourcePath The resource path in cloud resource manager.
        * @param  string $cloudLayoutDataPat The layout data resource path in cloud resource manager.
        */
        public function AddDlexCloud(string $cloudResourcePath, string $cloudLayoutDataPat)
        {
            $input = new DlexInput($cloudResourcePath, $cloudLayoutDataPat);
            array_push($this->Inputs,$input);
            return $input;
        }


        /**
        *
        *  Returns a PageInput object containing the input pdf. 
        *
        * @param  ?float $pageWidth The width of the page.
        * @param  ?float $pageHeight The height of the page.
        */
        public function AddPage(?float $pageWidth =null, ?float $pageHeight= null)
        {
            if(($pageWidth != null)&& ($pageHeight != null))
            {
            $input = new PageInput($pageWidth, $pageHeight);
            array_push($this->Inputs,$input);
            return $input;
            }
            else
            {
                $input = new PageInput();
                array_push($this->Inputs,$input);
                return $input;
            }
        }


        /**
        *
        *  Returns a PageInput object containing the input pdf. 
        *
        */
        /*public function AddPage()
        {
            $input = new PageInput();
            $this->Inputs($input);
            return $input;
        }*/


        /**
        *
        * Gets the inputs.
        *
        */
        public $Inputs = array();
        


        /**
        *
        * Gets the templates.
        *
        */
        public $Templates = array();
        


        /**
        *
        * Gets the fonts.
        *
        */
        public $Fonts = array();
        


        /**
        *
        * Gets the formFields.
        *
        */
        public $FormFields = array();
        


        /**
        *
        * Gets the outlines.
        *
        */
        public $Outlines = array();
        

        
       
        public function Process():PdfResponse
        {
            $client=parent::Init();
           
            $this->instructions->Author = $this->Author;
            $this->instructions->Title = $this->Title;
            $this->instructions->Subject = $this->Subject;
            $this->instructions->Creator = $this->Creator;
            $this->instructions->Keywords = $this->Keywords;
            $this->instructions->Security = $this->Security;
            $this->instructions->FlattenAllFormFields = $this->FlattenAllFormFields;
            $this->instructions->RetainSignatureFormFields = $this->RetainSignatureFormFields;
            $this->instructions->Inputs = $this->Inputs;
            $this->instructions->Templates = $this->Templates;
            $this->instructions->Fonts = $this->Fonts;
            $this->instructions->FormFields = $this->FormFields;
            $this->instructions->Outlines = $this->Outlines;
            //$this->Instructions->FormFields = $this->FormFields;
           
            
            // $resources = array();
             foreach ($this->instructions->Inputs as $input) 
             {
                if($input->Type == InputType::Page)
                {
                     $pageInput = $input;
                    foreach ($pageInput->Elements as $element)
                    {
                        if ($element->Resource != null)
                        {
                            //array_push($this->Resources,$element->Resource);
                            $this->Resources[$element->Resource->ResourceName]=$element->Resource;
                        }
                        if ($element->TextFont != null)
                        {
                            $fontSerializedArray=$element->TextFont->GetjsonSerializeString();
                            //array_push($this->instructions->Fonts, $fontSerializedArray);
                            $this->instructions->Fonts[$element->TextFont->Name]=$fontSerializedArray;
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
                    //echo("template");
                        array_push( $this->instructions->Templates,$input->GetTemplate());
                        if($input->GetTemplate()->Elements != null  && count($input->GetTemplate()->Elements) > 0)
                        {
                            foreach($input->GetTemplate()->Elements as $element  )
                            {
                                //echo("element");
                                if ($element->Resource != null)
                                {
                                    $this->Resources[$element->Resource->ResourceName]=$element->Resource;
                                }
                                if ($element->TextFont != null)
                                {
                                    //echo("font");
                                    $fontSerializedArray=$element->TextFont->GetjsonSerializeString();
                                   
                                    if(count($fontSerializedArray)>0)
                                        $this->instructions->Fonts[$element->TextFont->Name]=$fontSerializedArray;
                                }
                                
                            }
                        }
                }
             }

            
            $data_string = json_encode($this->instructions, JSON_PRETTY_PRINT);
            

            $errCode=json_last_error();
           // echo ($errCode);
           // if(isset($debugMode))
           $this->jsonData=$data_string ;

           // echo( $data_string."\n\n");
          
            if ($this->instructions->Inputs == null)
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
                       
                    $retObject = new PdfResponse($outData);
                    $retObject->IsSuccessful = true;
                    //$retObject->PdfContent = $outData;
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

