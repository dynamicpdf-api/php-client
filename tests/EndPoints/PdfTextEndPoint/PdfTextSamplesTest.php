<?php
namespace DynamicPDF\Api;
require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfText;

use PHPUnit\Framework\TestCase;

class PdfTextSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;
    /** @test */
    public function TextExtraction()
    {
        $Name = "TextExtraction";

        $resource = new PdfResource($this->inputpath . "Test_Textmarker_Serienbrief(2).pdf");

        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $response = $text->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples1.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextExtractionWithSinglePage()
    {
        $Name = "SinglePage";

        $resource = new PdfResource($this->inputpath . "Test_Textmarker_Serienbrief(2).pdf");

        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $text->StartPage = 5;
        $text->PageCount = 1;
        $response = $text->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples2.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextExtractionWithMultipage()
    {
        $Name = "MultiPage";

        $resource = new PdfResource($this->inputpath . "Test_Textmarker_Serienbrief(2).pdf");
        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $text->StartPage = 2;
        $text->PageCount = 3;

        $response = $text->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples3.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextExtractionCJKFonts()
    {
        $Name = "CJKFonts";

        $resource = new PdfResource($this->inputpath . "pdf_font-zhcn.pdf");

        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $response = $text->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples4.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextExtractionSpecialChars()
    {
        $Name = "SpecialChars";

        $resource = new PdfResource($this->inputpath . "Input.pdf");

        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $response = $text->Process();
        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples5.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextExtractionArabic()
    {
        $Name = "Arabic";

        $resource = new PdfResource($this->inputpath . "Arabic.pdf");

        $text = new PdfText($resource);
        $text->ApiKey = $this->key;
        $text->BaseUrl = $this->url;

        $response = $text->Process();
        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "PdfTextSamples6.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
