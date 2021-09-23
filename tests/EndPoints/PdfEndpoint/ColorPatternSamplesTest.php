<?php
namespace DynamicPDF\Api;

require_once __DIR__ . '/../../../src/Pdf.php';
require_once __DIR__ . '/../../../src/PageInput.php';
require_once __DIR__ . '/../../../src/Template.php';
require_once __DIR__ . '/../../../src/Elements/TextElement.php';
require_once __DIR__ . '/../../../src/Elements/ElementPlacement.php';
require_once __DIR__ . '/../../../src/RgbColor.php';
require_once __DIR__ . '/../../../src/CmykColor.php';
require_once __DIR__ . '/../../../src/Grayscale.php';
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;


class ColorPatternSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function PdfPageInput_NamedColorSample_PdfOutput()
    {
        $Name = "NamedColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
        $textElement->Color = RgbColor::Red();
        array_push($template->Elements, $textElement);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ColorPatternSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ColorPatternSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfPageInput_RGBColorSample_PdfOutput()
    {
        $Name = "RGBColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
        $textElement->Color = new RgbColor(0, 1, 0);
        array_push($input->Elements, $textElement);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ColorPatternSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ColorPatternSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfPageInput_CMYKColorSample_PdfOutput()
    {
        $Name = "CMYKColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
        $textElement->Color = new CmykColor(0, 1, 0, 0);
        array_push($input->Elements, $textElement);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ColorPatternSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ColorPatternSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfPageInput_GrayScaleColorSample_PdfOutput()
    {
        $Name = "GrayScale";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
        $textElement->Color = new Grayscale(0.8);
        array_push($input->Elements, $textElement);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "ColorPatternSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "ColorPatternSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
