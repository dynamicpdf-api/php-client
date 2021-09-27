<?php


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfXmp;
use DynamicPDF\Api\XmlResponse;
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class PdfXmpSamplesTest extends TestCase
{

    private $inputpath = TestParameters::Inputpath;
    private $outputPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function XmpSingleResource()
    {
        $Name = "XmpSingelResource";

        $resource = new PdfResource($this->inputpath . "bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf");
        $xmp = new PdfXmp($resource);
        $xmp->ApiKey = $this->key;
        $xmp->BaseUrl = $this->url;

        $response = $xmp->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "Output1.xml", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function XmpSingleResource1()
    {
        $Name = "XmpSingleResource1";

        $resource = new PdfResource($this->inputpath . "aaa_crash.pdf");

        $xmp = new PdfXmp($resource);
        $xmp->ApiKey = $this->key;
        $xmp->BaseUrl = $this->url;

        $response = $xmp->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outputPath . "Output2.xml", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function XmpMulitipleResource()
    {
        $Name = "XmpMulitipleResource";

        $pdfs = array("aaa_crash.pdf", "bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf", "COR-GEN-2455447-1-A-1.pdf", "Waiver TX AF.PDF");

        for ($i = 0; $i < count($pdfs); $i++) {
            $resource = new PdfResource($this->inputpath . $pdfs[$i]);
            $xmp = new PdfXmp($resource);
            $xmp->ApiKey = $this->key;
            $xmp->BaseUrl = $this->url;

            $response = $xmp->Process();

            if ($response->IsSuccessful) {
                file_put_contents($this->outputPath . "Output3_" . $i . ".xml", $response->Content);
            }
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
