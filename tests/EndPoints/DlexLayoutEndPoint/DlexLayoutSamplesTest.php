<?php

require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/DlexResource.php');
require_once(__DIR__.'/../../../src/LayoutDataResource.php');
require_once(__DIR__.'/../../../src/DlexLayout.php');
require_once(__DIR__.'/InvoiceData.php');

use PHPUnit\Framework\TestCase;

    class DlexLayoutSamplesTest extends TestCase
    {

        private $inputpath = KeyAndUrl::Inputpath;
        private $outputPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;

      
        /** @test */
        public  function  DlexLayout()
        {
            $Name = "Simple";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."SimpleReportData.json");

            $dlexEndpoint = new DlexLayout("SimpleReportWithCoverPage.dlex", $layoutData);

            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples1.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
            
        }



        /** @test */
        public function ContactListDlex_Pdfoutput()
        {
            $Name = "ContactListDlex";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."ContactList.json");

            $dlexEndpoint = new DlexLayout("ContactList.dlex", $layoutData);


            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples2.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ContentGroupSubReport_Pdfoutput()
        {
            $Name = "ContentGroupSubReport";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."ContentGroupSubReportData.json");

            $dlexEndpoint = new DlexLayout("Resources/ReportWriter/ContentGroup/ContentGroupSubReport.dlex", $layoutData);


            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples3.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function AllReportElements_Pdfoutput()
        {
            $Name = "AllReportElements";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."AllReportElementsData.json");

            $dlexEndpoint = new DlexLayout("Resources/ReportWriter/AllReportElements.dlex", $layoutData);


            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples4.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ContentGroup_Pdfoutput()
        {
            $Name = "ContentGroup";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."ContentGroupData.json");

            $dlexEndpoint = new DlexLayout("Resources/ReportWriter/ContentGroup.dlex", $layoutData);


            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples5.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Invoice_Pdfoutput()
        {
            $Name = "Invoice";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $layoutData = new LayoutDataResource($this->inputpath."InvoiceReportData.json");

            $dlexEndpoint = new DlexLayout("Resources/ReportWriter/Invoice.dlex", $layoutData);


            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples6.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function InvoiceData_Pdfoutput()
        {
            $Name = "InvoiceData";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $invoiceData = new InvoiceData();
            $invoiceLinqData = $invoiceData->Order11077;

            $layoutDataResource = new LayoutDataResource($invoiceLinqData);
            $dlexEndpoint = new DlexLayout("InvoiceOrderId.dlex", $layoutDataResource);

            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples7.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

    }
?>
