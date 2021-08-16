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





     class Pdf extends Endpoint
    {
        public $instructions;
        public $JsonData;
        /// <summary>
        /// Initializes a new instance of the <see cref="Pdf"/> class.
        /// </summary>
        public function __construct() 
        {
            $this->instructions = new PdfInstructions();
        }

        public $EndpointName  = "pdf";

        /// <summary>
        /// Gets or sets the collection of resource.
        /// </summary>
        public $Resources  = array();

        /// <summary>
        /// Gets or sets the author.
        /// </summary>
        public $Author;
       

        /// <summary>
        /// Gets or sets the title.
        /// </summary>
        public $Title;
       

        /// <summary>
        /// Gets or sets the subject.
        /// </summary>
        public $Subject;
      

        /// <summary>
        /// Gets or sets the creator.
        /// </summary>
        public $Creator ="DynmaicPDF Cloud Api";
        

        /// <summary>
        /// Gets or sets the keywords.
        /// </summary>
        public $Keywords; 
       

        /// <summary>
        /// Gets or sets the security.
        /// </summary>
        public $Security; 
        

        /// <summary>
        /// Gets or sets the value indicating whether to flatten all form fields.
        /// </summary>
        public $FlattenAllFormFields;
        

        /// <summary>
        /// Gets or sets the value indicating whether to retain signature form field.
        /// </summary>
        public  $RetainSignatureFormFields; 
        

        /// <summary>
        /// Returns a <see cref="PdfInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="resource">The resource of type <see cref="PdfResource"/>.</param>
        /// <param name="options">The merge options for the pdf.</param>
        public function AddPdf(PdfResource $resource, MergeOptions $options = null)
        {
            $input = new PdfInput($resource, $options);
            array_push($this->Inputs,$input);
            return $input;
        }

        /// <summary>
        /// Returns a <see cref="PdfInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="cloudResourcePath">The resource path in cloud resource manager.</param>
        /// <param name="options">The merge options for the pdf.</param>
        public function AddPdfCloud(string $cloudResourcePath, MergeOptions $options = null)
        {
            $input =  PdfInput::CreatePdfInput($cloudResourcePath, $options);
            array_push($this->Inputs,$input);
            return $input;
        }

        /// <summary>
        /// Returns a <see cref="ImageInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="resource">The resource of type <see cref="ImageResource"/>.</param>
        public function AddImage(ImageResource $resource)
        {
            $input = new ImageInput($resource);
            array_push($this->Inputs,$input);
            return $input;
        }

        /// <summary>
        /// Returns a <see cref="ImageInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="cloudResourcePath">The resource path in cloud resource manager.</param>
        public function AddImageCloud(string $cloudResourcePath)
        {
            $input = new ImageInput($cloudResourcePath);
            array_push($this->Inputs,$input);
            return $input;
        }

        /// <summary>
        /// Returns a <see cref="DlexInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="dlexResource">The dlex resource of type <see cref="DlexResource"/>.</param>
        /// <param name="layoutData">The layout data resource of type <see cref="LayoutDataResource"/>.</param>
        public function AddDlex(DlexResource $dlexResource, LayoutDataResource $layoutData)
        {
            $input = new DlexInput($dlexResource, $layoutData);
            array_push($this->Inputs,$input);
            return $input;
        }

       /* /// <summary>
        /// Returns a <see cref="DlexInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="cloudResourcePath">The resource path in cloud resource manager.</param>
        /// <param name="layoutData">The layout data resource of type <see cref="LayoutDataResource"/>.</param>
        public function AddDlexCloud(string $cloudResourcePath, LayoutDataResource $layoutData)
        {
            $input = new DlexInput($cloudResourcePath, $layoutData);
            $this->Inputs($input);
            return $input;
        }*/

        /// <summary>
        /// Returns a <see cref="DlexInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="cloudResourcePath">The resource path in cloud resource manager.</param>
        /// <param name="cloudLayoutDataPat">The layout data resource path in cloud resource manager.</param>
        public function AddDlexCloud(string $cloudResourcePath, string $cloudLayoutDataPat)
        {
            $input = new DlexInput($cloudResourcePath, $cloudLayoutDataPat);
            array_push($this->Inputs,$input);
            return $input;
        }

        /// <summary>
        /// Returns a <see cref="PageInput"/> object containing the input pdf.
        /// </summary>
        /// <param name="pageWidth">The width of the page.</param>
        /// <param name="pageHeight">The height of the page.</param>
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

        /*/// <summary>
        /// Returns a <see cref="PageInput"/> object containing the input pdf.
        /// </summary>
        public function AddPage()
        {
            $input = new PageInput();
            $this->Inputs($input);
            return $input;
        }*/

        /// <summary>
        /// Gets the inputs.
        /// </summary>
        public $Inputs = array();
        

        /// <summary>
        /// Gets the templates.
        /// </summary>
        public $Templates = array();
        

        /// <summary>
        /// Gets the fonts.
        /// </summary>
        public $Fonts = array();
        

        /// <summary>
        /// Gets the formFields.
        /// </summary>
        public $FormFields = array();
        

        /// <summary>
        /// Gets the outlines.
        /// </summary>
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
                            array_push($this->Resources,$element->Resource);
                        }
                        if ($element->TextFont != null)
                        {
                            $fontSerializedArray=$element->TextFont->GetjsonSerializeString();
                            array_push($this->instructions->Fonts, $fontSerializedArray);
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
                        array_push( $this->instructions->Templates,$input->GetTemplate());
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
                                        array_push($this->instructions->Fonts,$fontSerializedArray);
                                }
                                
                            }
                        }
                }
             }

            
            $data_string = json_encode($this->instructions, JSON_PRETTY_PRINT);
            

            $errCode=json_last_error();
            echo ($errCode);
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
