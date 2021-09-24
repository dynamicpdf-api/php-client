<?php
namespace DynamicPDF\Api;
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PageInput;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Font;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Template;

use PHPUnit\Framework\TestCase;

class FontSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

/** @test */
    public function PageInput_CoreFont_Pdfoutput()
    {
        $Name = "CoreFont";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font(Font::TimesBoldItalic());
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples1.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples1.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CoreFonts_Pdfoutput()
    {
        $Name = "CoreFonts";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $element = new TextElement("Hello World (HelveticaBold)", ElementPlacement::TopCenter);
        $element->Font(Font::HelveticaBold());
        array_push($pageInput->Elements, $element);

        $element1 = new TextElement("Hello World (CourierBoldOblique)", ElementPlacement::TopCenter, 0, 100);
        $element1->Font(Font::CourierBoldOblique());
        array_push($pageInput->Elements, $element1);

        $element2 = new TextElement("#&%() +0123", ElementPlacement::TopCenter, 0, 200);
        $element2->Font(Font::Symbol());
        array_push($pageInput->Elements, $element2);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples2.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples2.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_TtfFont_Pdfoutput()
    {
        $Name = "TtfFont";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "arialbi.ttf");

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples3.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples3.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_OtfFont_Pdfoutput()
    {
        $Name = "OtfFont";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "Calibri.otf");

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples4.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples4.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_MultipleFonts_Pdfoutput()
    {
        $Name = "MultipleFonts";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();

        $font = Font::FromFile($this->inputpath . "arialbi.ttf");
        $element = new TextElement("Hello World (arialbi)", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        $font1 = Font::FromFile($this->inputpath . "Calibri.otf");
        $element1 = new TextElement("Hello World (Calibri)", ElementPlacement::TopCenter, 0, 100);
        $element1->Font($font1);
        array_push($pageInput->Elements, $element1);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples5.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples5.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_Embed_Pdfoutput()
    {
        $Name = "Embed";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "verdanab.ttf");
        $font->Embed = false;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples6.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples6.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_Subset_Pdfoutput()
    {
        $Name = "Subset";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "verdanab.ttf");
        $font->Subset = false;

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples7.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples7.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInput_WithTemplate_Pdfoutput()
    {
        $Name = "WithTemplate";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "SinglePage.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $font = Font::FromFile($this->inputpath . "arialbi.ttf");

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples8.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples8.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CloudRoot_Pdfoutput()
    {
        $Name = "CloudRoot";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = new Font("Calibri.otf");

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples9.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples9.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CloudSubFolder_Pdfoutput()
    {
        $Name = "CloudSubFolder";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = new Font("Resources/Calibri.otf");

        $pageInput = new PageInput();
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples10.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples10.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInput_CloudRootWithTemplate_Pdfoutput()
    {
        $Name = "CloudRootWithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = new Font("Calibri.otf");

        $resource = new PdfResource($this->inputpath . "SinglePage.pdf");
        $input = new PdfInput($resource);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples11.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples11.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PdfInput_CloudSubFolderWithTemplate_Pdfoutput()
    {
        $Name = "CloudSubFolderWithTemplate";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = new Font("Resources/Calibri.otf");

        $resource = new PdfResource($this->inputpath . "SinglePage.pdf");
        $input = new PdfInput($resource);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($template->Elements, $element);
        $input->SetTemplate($template);

        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples12.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples12.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_EmbedSubset_Pdfoutput()
    {
        $Name = "EmbedSubset";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "verdanab.ttf");
        $font->Embed = true;
        $font->Subset = false;

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples13.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples13.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_SubsetEmbed_Pdfoutput()
    {
        $Name = "SubsetEmbed";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $font = Font::FromFile($this->inputpath . "verdanab.ttf");
        $font->Subset = true;
        $font->Embed = false;

        $pageInput = new PageInput();

        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->Font($font);
        array_push($pageInput->Elements, $element);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples14.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples14.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CoreFontsHelvetica_Pdfoutput()
    {
        $Name = "CoreFontsHelvetica";
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World (Helvetica)", ElementPlacement::TopCenter);
        $element->Font(Font::Helvetica());
        array_push($pageInput->Elements, $element);

        $element1 = new TextElement("Hello World (HelveticaBold)", ElementPlacement::TopCenter, 0, 100);
        $element1->Font(Font::HelveticaBold());
        array_push($pageInput->Elements, $element1);

        $element2 = new TextElement("Hello World (HelveticaBoldOblique)", ElementPlacement::TopCenter, 0, 200);
        $element2->Font(Font::HelveticaBoldOblique());
        array_push($pageInput->Elements, $element2);

        $element3 = new TextElement("Hello World (HelveticaOblique)", ElementPlacement::TopCenter, 0, 300);
        $element3->Font(Font::HelveticaOblique());
        array_push($pageInput->Elements, $element3);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples15.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples15.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CoreFontsCourier_Pdfoutput()
    {
        $Name = "CoreFontsCourier";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World (Courier)", ElementPlacement::TopCenter);
        $element->Font(Font::Courier());
        array_push($pageInput->Elements, $element);

        $element1 = new TextElement("Hello World (CourierBold)", ElementPlacement::TopCenter, 0, 100);
        $element1->Font(Font::CourierBold());
        array_push($pageInput->Elements, $element1);

        $element2 = new TextElement("Hello World (CourierBoldOblique)", ElementPlacement::TopCenter, 0, 200);
        $element2->Font(Font::CourierBoldOblique());
        array_push($pageInput->Elements, $element2);

        $element3 = new TextElement("Hello World (CourierOblique)", ElementPlacement::TopCenter, 0, 300);
        $element3->Font(Font::CourierOblique());
        array_push($pageInput->Elements, $element3);

        array_push($pdf->Inputs, $pageInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples16.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples16.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

/** @test */
    public function PageInput_CoreFontsTimesRoman_Pdfoutput()
    {
        $Name = "CoreFontsTimesRoman";

        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $element = new TextElement("Hello World (TimesBold)", ElementPlacement::TopCenter);
        $element->Font(Font::TimesBold());
        array_push($pageInput->Elements, $element);

        $element1 = new TextElement("Hello World (TimesBoldItalic)", ElementPlacement::TopCenter, 0, 100);
        $element1->Font(Font::TimesBoldItalic());
        array_push($pageInput->Elements, $element1);

        $element2 = new TextElement("Hello World (TimesItalic)", ElementPlacement::TopCenter, 0, 200);
        $element2->Font(Font::TimesItalic());
        array_push($pageInput->Elements, $element2);

        $element3 = new TextElement("Hello World (TimesRoman)", ElementPlacement::TopCenter, 0, 300);
        $element3->Font(Font::TimesRoman());
        array_push($pageInput->Elements, $element3);

        array_push($pdf->Inputs, $pageInput);
        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "FontSamples17.pdf", $response->Content);
        }
        if (isset($pdf->jsonData)) {
            file_put_contents($this->outPutPath . "FontSamples17.json", $pdf->jsonData);
        }

        $this->assertEquals($response->IsSuccessful, true);

    }

}
