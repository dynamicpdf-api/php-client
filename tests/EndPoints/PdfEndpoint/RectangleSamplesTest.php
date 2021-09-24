<?php
namespace DynamicPDF\Api;
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PageInput;
use DynamicPDF\Api\Elements\RectangleElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\LineStyle;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\RgbColor;

use PHPUnit\Framework\TestCase;

class RectangleSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function PageInput_Pdfoutput()
    {
        $Name = "PageInput";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputPlacement_Pdfoutput()
    {
        $Name = "PageInputPlacement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->Placement = ElementPlacement::BottomRight;
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputXYOffset_Pdfoutput()
    {
        $Name = "PageInputXYOffset";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopLeft, 100, 50);
        $element->XOffset = 50;
        $element->YOffset = 50;
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCornerRadius_Pdfoutput()
    {
        $Name = "PageInputCornerRadius";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->CornerRadius = 10;
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputtBorderWidth_Pdfoutput()
    {
        $Name = "PageInputtBorderWidth";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->BorderWidth = 5;
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputBorderStyle_Pdfoutput()
    {
        $Name = "PageInputBorderStyle";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->BorderStyle = LineStyle::Dots();
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples6.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples6.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputBorderStyleArray_Pdfoutput()
    {
        $Name = "PageInputBorderStyleArray";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->BorderStyle = new LineStyle(array(2, 1, 4, 2));
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples7.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples7.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputBorderColor_Pdfoutput()
    {
        $Name = "PageInputBorderColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->BorderColor = RgbColor::Blue();
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples8.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples8.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputFillColor_Pdfoutput()
    {
        $Name = "PageInputFillColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->FillColor = RgbColor::Green();
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples9.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples9.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePath_PdfOutput()
    {
        $Name = "FilePath";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");

        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples10.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples10.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function Bytes_PdfOutput()
    {
        $Name = "FilePath";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");

        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples11.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples11.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function Stream_PdfOutput()
    {
        $Name = "Stream";

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

        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples12.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples12.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRoot_PdfOutput()
    {
        $Name = "CloudRoot";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");

        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples13.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples13.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolder_PdfOutput()
    {
        $Name = "CloudSubFolder";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");
        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");

        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples14.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples14.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathEvenOddTemplate_PdfOutput()
    {
        $Name = "FilePathEvenOddTemplateEven";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $element = new RectangleElement(ElementPlacement::TopCenter, 100, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "RectangleSamples15.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "RectangleSamples15.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
