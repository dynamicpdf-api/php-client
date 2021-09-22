<?php
require_once __DIR__ . '/../../../src/Pdf.php';
require_once __DIR__ . '/../../../src/ImageResource.php';
require_once __DIR__ . '/../../../src/ImageInput.php';
require_once __DIR__ . '/../../../src/PdfResponse.php';
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class ImageToPdfTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function ConvertTiffToPDF()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new ImageResource($this->inputpath . "fw9_13.tif");
        $input = new ImageInput($resource);
        array_push($pdf->Inputs, $input);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
