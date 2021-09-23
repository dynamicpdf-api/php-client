<?php
namespace DynamicPDF\Api;

require_once __DIR__ . '/../../../src/Pdf.php';
require_once __DIR__ . '/../../../src/DlexResource.php';
require_once __DIR__ . '/../../../src/LayoutDataResource.php';
require_once __DIR__ . '/../../../src/DlexInput.php';
require_once __DIR__ . '/../../../src/Template.php';
require_once __DIR__ . '/../../../src/Elements/TextElement.php';
require_once __DIR__ . '/../../../src/Elements/ElementPlacement.php';
require_once __DIR__ . '/../../../src/Elements/PageNumberingElement.php';
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\PageNumberingElement;

class DlexInputSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function SimpleDlex_Pdfoutput()
    {
        $Name = "SimpleDlex_Pdfoutput";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $dlex = new DlexResource($this->inputpath . "SimpleReportWithCoverPage.dlex");
        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = new DlexInput($dlex, $layoutData);
        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function SimpleDlex_Cloud_Pdfoutput()
    {
        $Name = "SimpleDlex_Cloud";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = new DlexInput("SimpleReportWithCoverPage.dlex", $layoutData);
        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function SimpleDlex_CloudData_Pdfoutput()
    {
        $Name = "SimpleDlex_CloudData";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new DlexInput("SimpleReportWithCoverPage.dlex", "SimpleReportData.json");
        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function Template_Pdfoutput()
    {
        $Name = "Template_Pdfoutput";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $dlex = new DlexResource($this->inputpath . "SimpleReportWithCoverPage.dlex");
        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = new DlexInput($dlex, $layoutData);

        $template = new Template("temp1");
        $textElement = new TextElement("HelloWorld", ElementPlacement::TopRight);
        array_push($template->Elements, $textElement);
        $input->SetTemplate($template);

        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PagenumberingLabelWithTemplate_Pdfoutput()
    {
        $Name = "PagenumberingLabelWithTemplate";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $dlex = new DlexResource($this->inputpath . "SimpleReportWithCoverPage.dlex");
        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = new DlexInput($dlex, $layoutData);

        $template = new Template("temp1");
        $textElement = new PageNumberingElement("%%CP%%", ElementPlacement::TopRight);
        array_push($template->Elements, $textElement);
        $input->SetTemplate($template);

        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function SimpleDlex_AddDlex_Pdfoutput()
    {
        $Name = "SimpleDlex_AddDlex";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $dlex = new DlexResource($this->inputpath . "SimpleReportWithCoverPage.dlex");
        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = $pdf->AddDlex($dlex, $layoutData);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples6.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples6.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function SimpleDlex_AddDlexCloudResource_Pdfoutput()
    {
        $Name = "SimpleDlex_AddDlexCloud";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $layoutData = new LayoutDataResource($this->inputpath . "SimpleReportData.json");
        $input = $pdf->AddDlex("SimpleReportWithCoverPage.dlex", $layoutData);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "DlexInputSamples7.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "DlexInputSamples7.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);
    }

}
