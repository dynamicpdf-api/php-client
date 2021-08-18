<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfXmp.php');
require_once('../../../src/XmlResponse.php');

use PHPUnit\Framework\TestCase;

    class PdfXmpSamples extends TestCase
    {

        private $inputpath =  "D:/Resources/";
        private $outputPath =  "./Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

        /** @test */
        public   function XmpSingleResource()
        {
            $Name = "XmpSingelResource";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new PdfResource($this->inputpath."bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf");
            $xmp = new PdfXmp($resource);

            $response = $xmp->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."Output1.xml", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public  function XmpSingleResource1()
        {
            $Name = "XmpSingleResource1";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new PdfResource($this->inputpath."aaa_crash.pdf");

            $xmp = new PdfXmp($resource);
            $response = $xmp->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."Output2.xml", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public  function XmpMulitipleResource()
        {
            $Name = "XmpMulitipleResource";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pdfs = array( "aaa_crash.pdf", "bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf", "COR-GEN-2455447-1-A-1.pdf", "Waiver TX AF.PDF" );

            for ( $i = 0; $i < count($pdfs); $i++)
            {
                $resource = new PdfResource($this->inputpath.$pdfs[$i]);
                $xmp = new PdfXmp($resource);

                $response = $xmp->Process();


                if ($response->IsSuccessful)
                {
                    file_put_contents($this->outputPath."Output3_".$i.".xml", $response->Content);
                }
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
