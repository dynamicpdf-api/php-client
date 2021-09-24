<?php
namespace DynamicPDF\Api;
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PageInput;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\Elements\LineElement;
use DynamicPDF\Api\LineStyle;

use PHPUnit\Framework\TestCase;

class PageInputSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function PageInput_TextElement_Pdfoutput()
    {
        $Name = "TextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PageInputSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "PageInputSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_TextElementAddedToPageAndTemplate_Pdfoutput()
    {
        $Name = "TextElementAddedToPageAndTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World1", ElementPlacement::TopLeft);
        array_push($pageInput->Elements, $element);

        $template = new Template("Temp1");
        $element1 = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element1);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PageInputSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "PageInputSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_AddPage_Pdfoutput()
    {
        $Name = "PageInput_AddPage";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = $pdf->AddPage();

        $element = new LineElement(ElementPlacement::TopCenter, 200, 200);
        $element->LineStyle = LineStyle::Dots();

        array_push($input->Elements, $element);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PageInputSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "PageInputSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_AddPageTemplate_Pdfoutput()
    {
        $Name = "PageInput_AddPageTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = $pdf->AddPage();

        $element = new TextElement("test", ElementPlacement::TopCenter);
        $template = new Template("temp");
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PageInputSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "PageInputSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_AddPageParameters_Pdfoutput()
    {
        $Name = "AddPageParameters";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = $pdf->AddPage(500, 500);

        $element = new TextElement("test", ElementPlacement::TopCenter);
        array_push($input->Elements, $element);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PageInputSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "PageInputSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
