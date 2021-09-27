<?php


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;
use DynamicPDF\Api\Elements\AztecBarcodeElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\AztecSymbolSize;
use DynamicPDF\Api\RgbColor;
use DynamicPDF\Api\PageInput;
use DynamicPDF\Api\Elements\ValueType;
use DynamicPDF\Api\Elements\DataMatrixBarcodeElement;
use DynamicPDF\Api\Elements\DataMatrixSymbolSize;
use DynamicPDF\Api\Elements\DataMatrixEncodingType;
use DynamicPDF\Api\Elements\DataMatrixFunctionCharacter;
use DynamicPDF\Api\Elements\Pdf417BarcodeElement;
use DynamicPDF\Api\Elements\Compaction;
use DynamicPDF\Api\Elements\ErrorCorrection;
use DynamicPDF\Api\Elements\QrCodeElement;
use DynamicPDF\Api\Elements\QrCodeFnc1;
use DynamicPDF\Api\Elements\Code128BarcodeElement;
use DynamicPDF\Api\Elements\Code39BarcodeElement;
use DynamicPDF\Api\Elements\Code25BarcodeElement;
use DynamicPDF\Api\Elements\Code93BarcodeElement;
use DynamicPDF\Api\WebColor;
use DynamicPDF\Api\Elements\Code11BarcodeElement;
use DynamicPDF\Api\Elements\Gs1DataBarBarcodeElement;
use DynamicPDF\Api\Elements\Gs1DataBarType;
use DynamicPDF\Api\Elements\StackedGs1DataBarBarcodeElement;
use DynamicPDF\Api\Elements\StackedGs1DataBarType;
use DynamicPDF\Api\Elements\Iata25BarcodeElement;
use DynamicPDF\Api\Font;
use DynamicPDF\Api\Elements\MsiBarcodeElement;
use DynamicPDF\Api\Elements\MsiBarcodeCheckDigitMode;
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class TemplateBarcodeSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function FilePathInputAztecBarcode_Pdfoutput()
    {
        $Name = "FilePathInputAztecBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", 0, 0);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathInputAztecBarcodeSize_Pdfoutput()
    {
        $Name = "FilePathInputAztecBarcodeSize";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", 0, 0);
        $element->Placement = ElementPlacement::TopLeft;
        $element->SymbolSize = AztecSymbolSize::Full;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementError_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementError";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::TopRight);
        $element->SymbolSize = AztecSymbolSize::Compact;
        $element->AztecErrorCorrection = 50;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementTilde_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementTild";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R109xC109;
        $element->ProcessTilde = true;
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementReader_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementReader";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::TopCenter, 50, 50);
        $element->SymbolSize = AztecSymbolSize::R109xC109;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePath_AztecBarcodeElementXDimension_Pdfoutput()
    {
        $Name = "FilePath_AztecBarcodeElementXDimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::TopCenter);
        $element->SymbolSize = AztecSymbolSize::R109xC109;
        $element->ProcessTilde = true;
        $element->XDimension = 3;
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples6.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples6.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementColor_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R125xC125;
        $element->XDimension = 3;
        $element->Color = RgbColor::Blue();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples7.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples7.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementProperties_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R105xC105;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples8.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples8.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesAztecBarcodeElementProperties_Pdfoutput()
    {
        $Name = "BytesAztecBarcodeElementProperties";

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

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R125xC125;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = false;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples9.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples9.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamAztecBarcodeElementProperties_Pdfoutput()
    {
        $Name = "StreamAztecBarcodeElementProperties_Pdfoutput";

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

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R125xC125;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = false;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples10.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples10.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootAztecBarcodeElementProperties_Pdfoutput()
    {
        $Name = "CloudRootAztecBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R105xC105;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples11.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples11.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputAztecBarcodeElementProperties_Pdfoutput()
    {
        $Name = "PageInputAztecBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R105xC105;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($template->Elements, $element);

        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples12.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples12.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputAztecBarcodeElementPropertiesAddedToPage_Pdfoutput()
    {
        $Name = "PageInputAztecBarcodeElementPropertiesAddedToPage";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::Auto;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($input->Elements, $element);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples13.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples13.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputAztecBarcodeAddedToPageAndPdf_Pdfoutput()
    {
        $Name = "PageInputAztecBarcodeAddedToPageAndPdf";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $element = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
        $element->SymbolSize = AztecSymbolSize::R125xC125;
        $element->XDimension = 3;
        $element->Color = RgbColor::Red();
        $element->AztecErrorCorrection = 30;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = false;
        $element->Value = "test123";
        $element->XOffset = -100;
        $element->YOffset = -100;
        array_push($input->Elements, $element);

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $pdfInput = new PdfInput($resource);
        array_push($pdf->Inputs, $pdfInput);
        $template = new Template("Temp1");
        $element1 = new AztecBarcodeElement("Hello World", ElementPlacement::TopLeft);
        $element1->SymbolSize = AztecSymbolSize::Auto;
        $element1->XDimension = 3;
        $element1->Color = RgbColor::Green();
        $element1->AztecErrorCorrection = 30;
        $element1->ProcessTilde = true;
        $element1->ReaderInitializationSymbol = true;
        $element1->XOffset = 100;
        $element1->YOffset = 100;
        array_push($template->Elements, $element1);
        $pdfInput->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples14.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples14.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementByteArray_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementByteArray";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $value = unpack('C*', utf8_encode("Hello World"));
        $element = new AztecBarcodeElement($value, ElementPlacement::TopLeft, 0);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples15.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples15.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementPageByteArray_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementPageByteArray";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $value = unpack('C*', utf8_encode("Hello World"));
        $element = new AztecBarcodeElement($value, ElementPlacement::TopCenter);
        $element->Color = RgbColor::Green();
        $element->AztecErrorCorrection = 45;
        $element->SymbolSize = AztecSymbolSize::Full;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = false;
        array_push($input->Elements, $element);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples16.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples16.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathAztecBarcodeElementPageXY_Pdfoutput()
    {
        $Name = "FilePathAztecBarcodeElementPageXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PageInput();
        array_push($pdf->Inputs, $input);

        $value = unpack('C*', utf8_encode("Hello World"));
        $element = new AztecBarcodeElement($value, ElementPlacement::TopCenter, 0, 100);
        $element->Color = RgbColor::Green();
        $element->AztecErrorCorrection = 45;
        $element->SymbolSize = AztecSymbolSize::Auto;
        $element->ProcessTilde = true;
        $element->ReaderInitializationSymbol = true;
        array_push($input->Elements, $element);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples17.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples17.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElement_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopLeft, 0, 0);
        $element->Placement = ElementPlacement::TopLeft;
        $element->XOffset = 50;
        $element->YOffset = 50;
        $element->XDimension = 3;
        $element->ProcessTilde = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples18.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples18.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementXDimension_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementXDimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopLeft, 0, 0);
        $element->XDimension = 2;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples19.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples19.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementColor_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementColor";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopLeft, 0, 0);
        $element->Color = RgbColor::Indigo();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples20.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples20.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementPlacement_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementPlacement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopRight, -50, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples21.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples21.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementTilde_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementTilde";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0);
        $element->ProcessTilde = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples22.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples22.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementSymbolSize_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementSymbolSize";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::R120xC120);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples23.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples23.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementEncodingType_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementEncodingType";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::Auto, DataMatrixEncodingType::Base256);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples24.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples24.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementFucntionChar_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementFucntionChar";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::Auto, DataMatrixEncodingType::Auto, DataMatrixFunctionCharacter::FNC1);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples25.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples25.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementEnums_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementEnums";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::Auto, DataMatrixEncodingType::Ascii, DataMatrixFunctionCharacter::None);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples26.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples26.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathDataMatrixBarcodeElementProperties_Pdfoutput()
    {
        $Name = "FilePathDataMatrixBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::R132xC132, DataMatrixEncodingType::C40, DataMatrixFunctionCharacter::Macro05);
        $element->ProcessTilde = true;
        $element->XDimension = 5;
        $element->XOffset = 50;
        $element->YOffset = 50;
        $element->Color = RgbColor::Yellow();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples27.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples27.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesDataMatrixBarcodeElementProperties_Pdfoutput()
    {
        $Name = "BytesDataMatrixBarcodeElementProperties";

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

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::R132xC132, DataMatrixEncodingType::C40, DataMatrixFunctionCharacter::Macro05);
        $element->ProcessTilde = true;
        $element->XDimension = 5;
        $element->XOffset = 50;
        $element->YOffset = 50;
        $element->Color = RgbColor::Yellow();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples28.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples28.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamDataMatrixBarcodeElementProperties_Pdfoutput()
    {
        $Name = "StreamDataMatrixBarcodeElementProperties";

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

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::R132xC132, DataMatrixEncodingType::C40, DataMatrixFunctionCharacter::Macro05);
        $element->ProcessTilde = true;
        $element->XDimension = 5;
        $element->XOffset = 50;
        $element->YOffset = 50;
        $element->Color = RgbColor::Yellow();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples29.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples29.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootDataMatrixBarcodeElementProperties_Pdfoutput()
    {
        $Name = "CloudRootDataMatrixBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
        $resource = new PdfResource($file);
        fclose($file);

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopCenter, 0, 0, DataMatrixSymbolSize::R132xC132, DataMatrixEncodingType::C40, DataMatrixFunctionCharacter::Macro05);
        $element->ProcessTilde = true;
        $element->XDimension = 5;
        $element->XOffset = 50;
        $element->YOffset = 50;
        $element->Color = RgbColor::Yellow();
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples30.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples30.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElement_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 3, 0, 0);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples31.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples31.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementTilde_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementTilde";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 3, 0, 0);
        $element->ProcessTilde = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples32.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples32.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementCompaction_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementCompaction";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopCenter, 2);

        $element->Compaction = Compaction::Text;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples33.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples33.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementErrorCorrection_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementErrorCorrection";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 2);
        $element->ErrorCorrection = ErrorCorrection::Level2;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples34.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples34.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementCompactPdf417_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementCompactPdf41";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 2);
        $element->CompactPdf417 = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples35.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples35.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementYDimension_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementYDimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 2);
        $element->YDimension = 3;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples36.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples36.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementProperties_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 2);
        $element->Color = RgbColor::Red();
        $element->Compaction = Compaction::Byte;
        $element->CompactPdf417 = true;
        $element->ErrorCorrection = ErrorCorrection::Level6;
        $element->EvenPages = true;
        $element->Placement = ElementPlacement::TopRight;
        $element->ProcessTilde = true;
        $element->XDimension = 4;
        $element->YDimension = 5;
        $element->XOffset = -50;
        $element->YOffset = 50;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples37.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples37.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamPdf417BarcodeElementProperties_Pdfoutput()
    {
        $Name = "StreamPdf417BarcodeElementProperties";

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

        $element = new Pdf417BarcodeElement("78910", ElementPlacement::TopLeft, 2);
        $element->Color = RgbColor::Red();
        $element->Compaction = Compaction::Numeric;
        $element->CompactPdf417 = true;
        $element->ErrorCorrection = ErrorCorrection::Level6;
        $element->EvenPages = true;
        $element->Placement = ElementPlacement::TopRight;
        $element->ProcessTilde = true;
        $element->XDimension = 4;
        $element->YDimension = 5;
        $element->XOffset = -50;
        $element->YOffset = 50;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples38.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples38.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesPdf417BarcodeElementProperties_Pdfoutput()
    {
        $Name = "BytesPdf417BarcodeElementProperties";

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

        $element = new Pdf417BarcodeElement("123456", ElementPlacement::TopLeft, 2);
        $element->Color = RgbColor::Red();
        $element->Compaction = Compaction::Numeric;
        $element->CompactPdf417 = true;
        $element->ErrorCorrection = ErrorCorrection::Level6;
        $element->EvenPages = true;
        $element->Placement = ElementPlacement::TopRight;
        $element->ProcessTilde = true;
        $element->XDimension = 4;
        $element->YDimension = 5;
        $element->XOffset = -50;
        $element->YOffset = 50;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples39.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples39.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootPdf417BarcodeElementProperties_Pdfoutput()
    {
        $Name = "CloudRootPdf417BarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 2);
        $element->Color = RgbColor::Red();
        $element->Compaction = Compaction::Text;
        $element->CompactPdf417 = true;
        $element->ErrorCorrection = ErrorCorrection::Level6;
        $element->EvenPages = true;
        $element->Placement = ElementPlacement::TopRight;
        $element->ProcessTilde = true;
        $element->XDimension = 4;
        $element->YDimension = 5;
        $element->XOffset = -50;
        $element->YOffset = 50;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples40.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples40.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathPdf417BarcodeElementByteArray_Pdfoutput()
    {
        $Name = "FilePathPdf417BarcodeElementByteArray";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $value = unpack('C*', utf8_encode("Hello World"));
        $element = new Pdf417BarcodeElement($value, ElementPlacement::TopLeft, 3, 0, 0);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples41.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples41.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathQrcodeBarcodeElement_PdfOutput()
    {
        $Name = "FilePathQrcodeBarcodeElement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new QrCodeElement("Hello World", ElementPlacement::TopLeft);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples42.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples42.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathQrcodeBarcodeElementVersion_PdfOutput()
    {
        $Name = "FilePathQrcodeBarcodeElementVersion";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new QrCodeElement("Hello World", ElementPlacement::TopLeft);
        $element->Version = 25;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples43.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples43.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathQrcodeBarcodeElementFnc1_PdfOutput()
    {
        $Name = "FilePathQrcodeBarcodeElementFnc1";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new QrCodeElement("Hello World", ElementPlacement::BottomRight);
        $element->Fnc1 = QrCodeFnc1::Industry;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples44.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples44.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathQrcodeBarcodeElementProperties_PdfOutput()
    {
        $Name = "FilePathQrcodeBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new QrCodeElement("Hello World", ElementPlacement::TopCenter, 50, 50);
        $element->Color = RgbColor::Orange();
        $element->Version = 20;
        $element->Fnc1 = QrCodeFnc1::Gs1;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples45.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples45.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesQrcodeBarcodeElementProperties_PdfOutput()
    {
        $Name = "BytesQrcodeBarcodeElementProperties";

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

        $element = new QrCodeElement("Hello World", ElementPlacement::TopCenter, 50, 50);
        $element->Color = RgbColor::Orange();
        $element->Version = 20;
        $element->Fnc1 = QrCodeFnc1::Gs1;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples46.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples46.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamQrcodeBarcodeElementProperties_PdfOutput()
    {
        $Name = "StreamQrcodeBarcodeElementProperties";

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

        $element = new QrCodeElement("Hello World", ElementPlacement::TopCenter, 50, 50);
        $element->Color = RgbColor::Orange();
        $element->Version = 20;
        $element->Fnc1 = QrCodeFnc1::Gs1;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples47.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples47.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootQrcodeBarcodeElementProperties_PdfOutput()
    {
        $Name = "CloudRootQrcodeBarcodeElementProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");

        $element = new QrCodeElement("Hello World", ElementPlacement::TopCenter, 50, 50);
        $element->Color = RgbColor::Orange();
        $element->Version = 20;
        $element->Fnc1 = QrCodeFnc1::Gs1;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples48.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples48.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathQrcodeBarcodeElementByteArray_PdfOutput()
    {
        $Name = "FilePathQrcodeBarcodeElementByteArray";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $template = new Template("Temp1");
        $value = unpack('C*', utf8_encode("Hello World"));
        $element = new QrCodeElement($value, ElementPlacement::TopLeft);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples49.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples49.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128Barcode_PdfOutput()
    {
        $Name = "FilePathCode128Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");

        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples50.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples50.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesCode128Barcode_PdfOutput()
    {
        $Name = "BytesCode128Barcode";

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
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples51.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples51.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamCode128Barcode_PdfOutput()
    {
        $Name = "StreamCode128Barcode";

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
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples52.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples52.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootCode128Barcode_PdfOutput()
    {
        $Name = "CloudRootCode128Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples53.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples53.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderCode128Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderCode128Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples54.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples54.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeWithOptionalParameter_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeWithOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50, 50, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples55.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples55.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeWithHeightXY_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeWithHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopLeft, 50);
        $element->Height = 60;
        $element->XOffset = 100;
        $element->YOffset = 100;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples56.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples56.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopRight, 25);
        $element->Color = RgbColor::Red();
        $element->XDimension = 2;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples57.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples57.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::BottomLeft, 50);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Blue();
        $element->Font(Font::Courier());
        $element->FontSize = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples58.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples58.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodePlacement_PdfOutput()
    {
        $Name = "FilePathCode128BarcodePlacement";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopRight, 50);
        $element->Placement = ElementPlacement::BottomRight;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples59.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples59.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeProcessTilde_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeProcessTilde";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 ~ABarcode.", ElementPlacement::TopCenter, 50);
        $element->ProcessTilde = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples60.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples60.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeUccEan128_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeUccEan128";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        $element->UccEan128 = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples61.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples61.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        $element->EvenPages = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples62.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples62.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode128BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathCode128BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        $element->OddPages = true;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples63.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples63.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCode128Barcode_PdfOutput()
    {
        $Name = "PageInputCode128Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples64.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples64.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputWithTemplateCode128Barcode_PdfOutput()
    {
        $Name = "PageInputWithTemplateCode128Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples65.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples65.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39Barcode_PdfOutput()
    {
        $Name = "FilePathCode39Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples66.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples66.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesCode39Barcode_PdfOutput()
    {
        $Name = "BytesCode39Barcode";

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
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples67.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples67.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamCode39Barcode_PdfOutput()
    {
        $Name = "StreamCode39Barcode";

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
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples68.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples68.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootCode39Barcode_PdfOutput()
    {
        $Name = "CloudRootCode39Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples69.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples69.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderCode39Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderCode39Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples70.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples70.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopLeft, 40, 50, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples71.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples71.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        $element->Height = 60;
        $element->XOffset = 100;
        $element->YOffset = 100;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples72.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples72.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::BottomCenter, 50);
        $element->Color = RgbColor::Red();
        $element->XDimension = 1.5;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples73.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples73.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::BottomLeft, 50);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Red();
        $element->Font(Font::CourierBold());
        $element->FontSize = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples74.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples74.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::BottomLeft, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples75.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples75.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::BottomLeft, 50);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples76.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples76.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCode39Barcode_PdfOutput()
    {
        $Name = "PageInputCode39Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples77.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples77.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputTemplateCode39Barcode_PdfOutput()
    {
        $Name = "PageInputTemplateCode39Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("CODE 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples78.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples78.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode39BarcodeExtended_PdfOutput()
    {
        $Name = "FilePathCode39BarcodeExtended";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code39BarcodeElement("Code 39", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples79.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples79.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25Barcode_PdfOutput()
    {
        $Name = "FilePathCode25Barcod";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples80.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples80.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesCode25Barcode_PdfOutput()
    {
        $Name = "BytesCode25Barcode";

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
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples81.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples81.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamCode25Barcode_PdfOutput()
    {
        $Name = "StreamCode25Barcode";

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
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples82.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples82.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootCode25Barcode_PdfOutput()
    {
        $Name = "CloudRootCode25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples83.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples83.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderCode25Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderCode25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples84.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples84.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopLeft, 50, 50, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples85.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples85.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 25);
        $element->Height = 60;
        $element->XOffset = 100;
        $element->YOffset = 100;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples86.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples86.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        $element->Color = RgbColor::Red();
        $element->XDimension = 1.5;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples87.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples87.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        $element->TextColor = RgbColor::Red();
        $element->Font(Font::CourierBoldOblique());
        $element->FontSize = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples88.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples88.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples89.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples89.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode25BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathCode25BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples90.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples90.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCode25Barcode_PdfOutput()
    {
        $Name = "PageInputCode25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples91.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples91.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputTemplateCode25Barcode_PdfOutput()
    {
        $Name = "PageInputTemplateCode25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Code25BarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples92.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples92.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93Barcode_PdfOutput()
    {
        $Name = "FilePathCode93Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples93.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples93.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesCode93Barcode_PdfOutput()
    {
        $Name = "BytesCode93Barcode";

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
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples94.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples94.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamCode93Barcode_PdfOutput()
    {
        $Name = "StreamCode93Barcode";

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
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples95.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples95.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootCode93Barcode_PdfOutput()
    {
        $Name = "CloudRootCode93Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples96.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples96.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderCode93Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderCode93Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples97.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples97.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopLeft, 40, 50, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples98.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples98.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        $element->Height = 60;
        $element->XOffset = 100;
        $element->YOffset = 100;

        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples99.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples99.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::BottomCenter, 50);
        $element->Color = new WebColor("#FF0000");
        $element->XDimension = 2;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples100.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples100.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Red();
        $element->Font(Font::TimesBoldItalic());
        $element->FontSize = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples101.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples101.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples102.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples102.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples103.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples103.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCode93Barcode_PdfOutput()
    {
        $Name = "PageInputCode93Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples104.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples104.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputTemplateCode93Barcode_PdfOutput()
    {
        $Name = "PageInputTemplateCode93Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples105.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples105.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode93BarcodeExtended_PdfOutput()
    {
        $Name = "FilePathCode93BarcodeExtended";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code93BarcodeElement("Code 93", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples106.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples106.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11Barcode_PdfOutput()
    {
        $Name = "FilePathCode11Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples107.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples107.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesCode11Barcode_PdfOutput()
    {
        $Name = "BytesCode11Barcode";

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
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples108.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples108.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamCode11Barcode_PdfOutput()
    {
        $Name = "StreamCode11Barcode";

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
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples109.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples109.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootCode11Barcode_PdfOutput()
    {
        $Name = "CloudRootCode11Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples110.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples110.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderCode11Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderCode11Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples111.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples111.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopLeft, 50, 10, 20);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples112.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples112.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        $element->Height = 60;
        $element->XOffset = 20;
        $element->YOffset = 20;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples113.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples113.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::BottomLeft, 25);
        $element->Color = RgbColor::Green();
        $element->XDimension = 3;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples114.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples114.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::BottomRight, 40);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Red();
        $element->Font(Font::HelveticaOblique());
        $element->FontSize = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples115.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples115.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeEvenPage";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples116.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples116.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathCode11BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathCode11BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples117.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples117.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputCode11Barcode_PdfOutput()
    {
        $Name = "PageInputCode11Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples118.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples118.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputTemplateCode11Barcode_PdfOutput()
    {
        $Name = "PdfInputTemplateCode11Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Code11BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples119.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples119.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcode_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples120.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples120.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesGs1DataBarBarcode_PdfOutput()
    {
        $Name = "BytesGs1DataBarBarcode";

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
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples121.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples121.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamGs1DataBarBarcode_PdfOutput()
    {
        $Name = "StreamGs1DataBarBarcode";

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
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples122.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples122.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootGs1DataBarBarcode_PdfOutput()
    {
        $Name = "CloudRootGs1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples123.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples123.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderGs1DataBarBarcode_PdfOutput()
    {
        $Name = "CloudSubFolderGs1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples124.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples124.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopLeft, 50, Gs1DataBarType::Omnidirectional, 50, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples125.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples125.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 10, Gs1DataBarType::Expanded);
        $element->Height = 60;
        $element->Height = 50;
        $element->XOffset = 0;
        $element->YOffset = 100;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples126.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples126.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::BottomLeft, 60, Gs1DataBarType::Limited);
        $element->Color = new WebColor("#02F1A5");
        $element->XDimension = 1.4;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples127.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples127.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 40, Gs1DataBarType::Omnidirectional);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Red();
        $element->FontSize = 10;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples128.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples128.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples129.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples129.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathGs1DataBarBarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathGs1DataBarBarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 40, Gs1DataBarType::Omnidirectional);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples130.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples130.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputGs1DataBarBarcode_PdfOutput()
    {
        $Name = "PageInputGs1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Omnidirectional);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples131.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples131.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputTamplateGs1DataBarBarcode_PdfOutput()
    {
        $Name = "PageInputTamplateGs1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, 50, Gs1DataBarType::Expanded);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples132.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples132.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples133.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples133.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "BytesStackedGS1DataBarBarcode";

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
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples134.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples134.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "StreamStackedGS1DataBarBarcode";

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
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples135.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples135.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "CloudRootStackedGS1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples136.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples136.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "CloudSubFolderStackedGS1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples137.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples137.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 20, 10, 10);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples138.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples138.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeRowheightXY_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeRowheightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopLeft, StackedGs1DataBarType::ExpandedStacked, 50);
        $element->RowHeight = 60;
        $element->XOffset = 10;
        $element->YOffset = 20;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples139.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples139.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::StackedOmnidirectional, 30);
        $element->Color = RgbColor::Maroon();
        $element->XDimension = 1;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples140.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples140.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::BottomCenter, StackedGs1DataBarType::Stacked, 20);
        $element->ShowText = true;
        $element->TextColor = RgbColor::Gold();
        $element->Font(Font::HelveticaBold());
        $element->FontSize = 14;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples141.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples141.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::StackedOmnidirectional, 30);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples142.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples142.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathStackedGS1DataBarBarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathStackedGS1DataBarBarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::StackedOmnidirectional, 30);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples143.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples143.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "PageInputStackedGS1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples144.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples144.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputTemplateStackedGS1DataBarBarcode_PdfOutput()
    {
        $Name = "PageInputTemplateStackedGS1DataBarBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 50);
        $element->ExpandedStackedSegmentCount = 6;
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples145.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples145.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25Barcode_PdfOutput()
    {
        $Name = "FilePathIata25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples146.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples146.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesIata25Barcode_PdfOutput()
    {
        $Name = "BytesIata25Barcode";

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
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples147.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples147.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamIata25Barcode_PdfOutput()
    {
        $Name = "StreamIata25Barcode";

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
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples148.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples148.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInputCloudRoot_Iata25Barcode_PdfOutput()
    {
        $Name = "PdfInputCloudRoot_Iata25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples149.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples149.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderIata25Barcode_PdfOutput()
    {
        $Name = "CloudSubFolderIata25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples150.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples150.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50, 10, 20);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples151.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples151.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeHeightXY_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeHeightXY";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopLeft, 50);
        $element->Height = 60;
        $element->XOffset = 10;
        $element->YOffset = 15;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples152.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples152.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::BottomRight, 30);
        $element->Color = RgbColor::Yellow();
        $element->XDimension = 3;
        $element->ShowText = false;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples153.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples153.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        $element->TextColor = RgbColor::Pink();
        $font = Font::FromFile($this->inputpath . "aial.ttf");
        $element->Font($font);
        $element->FontSize = 11;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples154.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples154.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeIncludeCheckDigit_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeIncludeCheckDigit";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        $element->IncludeCheckDigit = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples155.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples155.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::BottomRight, 30);
        $element->EvenPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples156.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples156.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathIata25BarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathIata25BarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::BottomRight, 30);
        $element->OddPages = true;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples157.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples157.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputIata25Barcode_PdfOutput()
    {
        $Name = "PageInputIata25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples158.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples158.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputWithTemplateIata25Barcode_PdfOutput()
    {
        $Name = "PageInputWithTemplateIata25Barcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $template = new Template("Temp1");
        $element = new Iata25BarcodeElement("12345678", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);

        $pageInput->SetTemplate($template);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples159.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples159.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcode_PdfOutput()
    {
        $Name = "FilePathMsiBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples160.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples160.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function BytesMsiBarcode_PdfOutput()
    {
        $Name = "BytesMsiBarcode";

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
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples161.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples161.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function StreamMsiBarcode_PdfOutput()
    {
        $Name = "StreamMsiBarcode";

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
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples162.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples162.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudRootMsiBarcode_PdfOutput()
    {
        $Name = "CloudRootMsiBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples163.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples163.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function CloudSubFolderMsiBarcode_PdfOutput()
    {
        $Name = "CloudSubFolderMsiBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $input = new PdfInput("Resources/DocumentA100.pdf");

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples164.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples164.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeOptionalParameter_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeOptionalParameter";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopLeft, 10, 20);
        $element->Height = 50;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples165.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples165.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeHeightXYAppendcheckdigit_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeHeightXYAppendcheckdigit";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 30);
        $element->Height = 60;
        $element->XOffset = 20;
        $element->YOffset = 20;
        $element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod11;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples166.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples166.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeColorXdimension_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeColorXdimension";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::BottomRight, 40);
        $element->Color = RgbColor::Violet();
        $element->XDimension = 2;
        $element->ShowText = false;
        $element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod1010;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples167.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples167.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeTextProperties_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeTextProperties";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);

        $element->TextColor = RgbColor::Aqua();
        $element->Font(Font::TimesItalic());
        $element->FontSize = 10;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples168.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples168.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeAppendCheckDigit_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);

        $element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod1110;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples169.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples169.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeEvenPages_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeEvenPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 30);
        $element->EvenPages = true;
        $element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod10;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples170.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples170.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function FilePathMsiBarcodeOddPages_PdfOutput()
    {
        $Name = "FilePathMsiBarcodeOddPages";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "DocumentA100.pdf");
        $input = new PdfInput($resource);

        array_push($pdf->Inputs, $input);
        $template = new Template("Temp1");
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 30);
        $element->OddPages = true;
        $element->AppendCheckDigit = MsiBarcodeCheckDigitMode::None;
        array_push($template->Elements, $element);
        $input->SetTemplate($template);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples171.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples171.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInputMsiBarcode_PdfOutput()
    {
        $Name = "PageInputMsiBarcode";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples172.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "TemplateBarcodeSamples172.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
