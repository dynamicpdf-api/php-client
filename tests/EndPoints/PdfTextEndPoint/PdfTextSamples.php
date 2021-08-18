<?php
require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfText.php');

use PHPUnit\Framework\TestCase;

    class PdfTextSamples extends TestCase
    {
        private $inputpath =  "D:/Resources/";
        private $outPutPath =  "./Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

        /** @test */
        public function TextExtraction()
        {
            $Name = "TextExtraction";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."Test_Textmarker_Serienbrief(2).pdf");

            $text = new PdfText($resource);
            $response = $text->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples1.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextExtractionWithSinglePage()
        {
            $Name = "SinglePage";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."Test_Textmarker_Serienbrief(2).pdf");

            $text = new PdfText($resource);
            $text->StartPage = 5;
            $text->PageCount = 1;
            $response = $text->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples2.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextExtractionWithMultipage()
        {
            $Name = "MultiPage";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."Test_Textmarker_Serienbrief(2).pdf");
            $text = new PdfText($resource);
            $text->StartPage = 2;
            $text->PageCount = 3;
            
            $response = $text->Process();
            
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples3.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

       
        /** @test */
        public function TextExtractionCJKFonts()
        {
            $Name = "CJKFonts";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."pdf_font-zhcn.pdf");

            $text = new PdfText($resource);
            $response = $text->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples4.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextExtractionSpecialChars()
        {
            $Name = "SpecialChars";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."Input.pdf");

            $text = new PdfText($resource);
            $response = $text->Process();
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples5.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function TextExtractionArabic()
        {
            $Name = "Arabic";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $resource = new PdfResource($this->inputpath."Arabic.pdf");

            $text = new PdfText($resource);
            $response = $text->Process();
            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."PdfTextSamples6.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
