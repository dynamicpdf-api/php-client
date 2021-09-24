<?php
namespace DynamicPDF\Api;

require_once __DIR__ . '/../TestParameters.php';


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\ImageResource;
use DynamicPDF\Api\PageInput;

use PHPUnit\Framework\TestCase;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\ImageElement;

class ImageElementSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function PdfInputUsingFilePath_WithTemplate_Pdfoutput()
    {
        $Name = "WithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingFilePath_Templatescale_Pdfoutput()
    {
        $Name = "ScaleWithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        $element->ScaleX = 3;
        $element->ScaleY = 3;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingFilePath_TemplateWidth_Pdfoutput()
    {
        $Name = "WidthWithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        $element->MaxHeight = 350;
        $element->MaxWidth = 350;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingFilePath_TemplateWithXY_Pdfoutput()
    {
        $Name = "XYWithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        $element->XOffset = 50;
        $element->YOffset = 50;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfPageInput_Template_Pdfoutput()
    {
        $Name = "PageTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfPageInput_Page_Pdfoutput()
    {
        $Name = "PageElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        array_push($input->Elements, $element);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples6.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples6.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingStream_Template_Pdfoutput()
    {
        $Name = "StreamTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
        $pdfResource = new PdfResource($file);
        fclose($file);

        $input = new PdfInput($pdfResource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $file = fopen($this->inputpath . "Northwind Logo.gif", "r");
        $resource1 = new ImageResource($file);
        fclose($file);

        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples7.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples7.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingBytes_Template_Pdfoutput()
    {
        $Name = "BytesTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pdfResource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($pdfResource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $resource1 = new ImageResource($this->inputpath . "Northwind Logo.gif");
        $element = new ImageElement($resource1, ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples8.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples8.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputUsingCloudRoot_Template_Pdfoutput()
    {
        $Name = "CloudRootTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new ImageElement("Northwind Logo.gif", ElementPlacement::TopCenter);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ImageElementSamples9.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ImageElementSamples9.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
