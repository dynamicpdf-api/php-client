<?php
require_once(__DIR__.'./../../../src/Pdf.php');
require_once(__DIR__.'./../../../src/PdfResource.php');
require_once(__DIR__.'./../../../src/PdfInput.php');
require_once(__DIR__.'./../../../src/PdfInfo.php');
require_once(__DIR__.'/../KeyAndUrl.php'); 

use PHPUnit\Framework\TestCase;

    class PdfInfoSamplesTest  extends TestCase
    {
        private $inputpath = KeyAndUrl::Inputpath;
        private $outPutPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;

      
        /** @test */
        public function AllFormFields_JsonOutput()
        {
            $Name = "AllFormFields";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new PdfResource($this->inputpath."AllFormFields.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output1.json",  $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Button_JsonOutput()
        {
            $Name = "Button";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new PdfResource($this->inputpath."Button.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output2.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Checkbox_JsonOutput()
        {
            $Name = "Checkbox";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."Checkbox.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output3.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Combo_JsonOutput()
        {
            $Name = "Combo";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."Checkbox.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output4.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ComboExport_JsonOutput()
        {
            $Name = "ComboExport";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ComboExport.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output5.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ComboExport1_JsonOutput()
        {
            $Name = "ComboExport1";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ComboExport1.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output6.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ComboExport2_JsonOutput()
        {
            $Name = "ComboExport2";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ComboExport2.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output7.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ListBoxMultiSelect_JsonOutput()
        {
            $Name = "ListBoxMultiSelect";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ListBoxMultiSelect.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output8.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ListBoxSingleSelect_JsonOutput()
        {
            $Name = "ListBoxSingleSelect";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ListBoxSingleSelect.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output9.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ListMultiSelectExport1_JsonOutput()
        {
            $Name = "ListMultiSelectExport1";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ListMultiSelectExport1.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output10.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ListMultiSelectExport2_JsonOutput()
        {
            $Name = "ListMultiSelectExport2";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."ListMultiSelectExport2.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output11.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PushButton_JsonOutput()
        {
            $Name = "PushButton";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."PushButton.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output12.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Radio_JsonOutput()
        {
            $Name = "Radio";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."Radio.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output13.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Signature_JsonOutput()
        {
            $Name = "Signature";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."Signature.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output14.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function SignatureNoSign_JsonOutput()
        {
            $Name = "SignatureNoSign";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."SignatureNoSign.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output15.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextField_JsonOutput()
        {
            $Name = "TextField";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."TextField.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output16.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextField2_JsonOutput()
        {
            $Name = "TextField2";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            
            $resource = new PdfResource($this->inputpath."TextField2.pdf");

            $pdfInfo = new PdfInfo($resource);
            $response = $pdfInfo->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output17.json",  $response->JsonContent);

            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
