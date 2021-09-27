<?php


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\PdfResponse;
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class MergeTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function MergePdfs()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $documentAResource = new PdfResource($this->inputpath . "DocumentA.pdf");
        $documentAInput = new PdfInput($documentAResource);
        array_push($pdf->Inputs, $documentAInput);

        $documentBResource = new PdfResource($this->inputpath . "DocumentB.pdf");
        $documentBInput = new PdfInput($documentBResource);
        array_push($pdf->Inputs, $documentBInput);

        $documentCResource = new PdfResource($this->inputpath . "DocumentC.pdf");
        $documentCInput = new PdfInput($documentCResource);
        array_push($pdf->Inputs, $documentCInput);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
