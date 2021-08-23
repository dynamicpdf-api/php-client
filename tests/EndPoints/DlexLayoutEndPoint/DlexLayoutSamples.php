<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/DlexResource.php');
require_once('../../../src/LayoutDataResource.php');
require_once('../../../src/DlexLayout.php');
require_once('InvoiceData.php');

use PHPUnit\Framework\TestCase;

    class DlexLayoutSamples extends TestCase
    {

        private $inputpath =  "./../../Resources/";
        private $outputPath =  "./Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

      
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
                file_put_contents($this->outputPath."DlexLayoutSamples1cs.pdf", $response->PdfContent);
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
                file_put_contents($this->outputPath."DlexLayoutSamples2cs.pdf", $response->PdfContent);
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
                file_put_contents($this->outputPath."DlexLayoutSamples3cs.pdf", $response->PdfContent);
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
                file_put_contents($this->outputPath."DlexLayoutSamples4cs.pdf", $response->PdfContent);
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
                file_put_contents($this->outputPath."DlexLayoutSamples5cs.pdf", $response->PdfContent);
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
                file_put_contents($this->outputPath."DlexLayoutSamples6cs.pdf", $response->PdfContent);
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

            $layoutDataResource =  LayoutDataResource::CreateLayoutDataResource($invoiceLinqData);
            $dlexEndpoint = new DlexLayout("InvoiceOrderId.dlex", $layoutDataResource);

            $response = $dlexEndpoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."DlexLayoutSamples7cs.pdf", $response->PdfContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

    }
?>
