<?php
namespace DynamicPDF\Api;

require_once __DIR__ . '/InvoiceData.php';
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\DlexResource;
use DynamicPDF\Api\LayoutDataResource;
use DynamicPDF\Api\DlexLayout;

use PHPUnit\Framework\TestCase;


class DlexLayoutSamplesTest extends TestCase
{

    private $inputpath = TestParameters::Inputpath;
    private $outputPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function DlexLayout()
    {
        $Name = "Simple";

        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");

        $dlexEndpoint = new DlexLayout("SimpleReportWithCoverPage.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples1.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);

    }

    /** @test */
    public function ContactListDlex_Pdfoutput()
    {
        $Name = "ContactListDlex";

        $layoutData = new LayoutDataResource($this->inputpath . "ContactList.json");

        $dlexEndpoint = new DlexLayout("ContactList.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples2.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ContentGroupSubReport_Pdfoutput()
    {
        $Name = "ContentGroupSubReport";

        $layoutData = new LayoutDataResource($this->inputpath . "ContentGroupSubReportData.json");

        $dlexEndpoint = new DlexLayout("Resources/ReportWriter/ContentGroup/ContentGroupSubReport.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples3.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function AllReportElements_Pdfoutput()
    {
        $Name = "AllReportElements";

        $layoutData = new LayoutDataResource($this->inputpath . "AllReportElementsData.json");

        $dlexEndpoint = new DlexLayout("Resources/ReportWriter/AllReportElements.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples4.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ContentGroup_Pdfoutput()
    {
        $Name = "ContentGroup";

        $layoutData = new LayoutDataResource($this->inputpath . "ContentGroupData.json");

        $dlexEndpoint = new DlexLayout("Resources/ReportWriter/ContentGroup.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples5.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Invoice_Pdfoutput()
    {
        $Name = "Invoice";

        $layoutData = new LayoutDataResource($this->inputpath . "InvoiceReportData.json");

        $dlexEndpoint = new DlexLayout("Resources/ReportWriter/Invoice.dlex", $layoutData);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples6.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function InvoiceData_Pdfoutput()
    {
        $Name = "InvoiceData";

        $invoiceData = new InvoiceData();
        $invoiceLinqData = $invoiceData->Order11077;

        $layoutDataResource = new LayoutDataResource($invoiceLinqData);
        $dlexEndpoint = new DlexLayout("InvoiceOrderId.dlex", $layoutDataResource);
        $dlexEndpoint->ApiKey = $this->key;
        $dlexEndpoint->BaseUrl = $this->url;

        $response = $dlexEndpoint->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "DlexLayoutSamples7.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

}
