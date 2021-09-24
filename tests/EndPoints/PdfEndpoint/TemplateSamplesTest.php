<?php
namespace DynamicPDF\Api;
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;

use PHPUnit\Framework\TestCase;

class TemplateSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function FilePathInputTextElement_Pdfoutput()
    {
        $Name = "FilePathInputTextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamInputTextElement_Pdfoutput()
    {
        $Name = "StreamInputTextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
        $resource = new PdfResource($file);
        fclose($file);
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesTextElement_Pdfoutput()
    {
        $Name = "BytesInputTextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $length = filesize($this->inputpath . "DocumentA100.pdf");
        $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
        $array = fread($file, $length);
        fclose($file);
        $resource = new PdfResource(unpack('C*', $array));
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootTextElement_Pdfoutput()
    {
        $Name = "CloudRootInputTextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderTextElement_Pdfoutput()
    {
        $Name = "CloudSubFolderInputTextElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
