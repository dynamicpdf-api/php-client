<?php

require_once __DIR__ . '/../../../src/Pdf.php';
require_once __DIR__ . '/../../../src/PdfResource.php';
require_once __DIR__ . '/../../../src/PdfInput.php';
require_once __DIR__ . '/../../../src/Aes256Security.php';
require_once __DIR__ . '/../../../src/PdfResponse.php';
require_once __DIR__ . '/../../../src/PageInput.php';
require_once __DIR__ . '/../../../src/Aes128Security.php';
require_once __DIR__ . '/../../../src/RC4128Security.php';
require_once __DIR__ . '/../../../src/Elements/TextElement.php';
require_once __DIR__ . '/../../../src/ImageResource.php';
require_once __DIR__ . '/../../../src/Elements/ImageElement.php';
require_once __DIR__ . '/../../../src/Elements/ElementPlacement.php';
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class SecurityTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function EncryptPDF()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $pageInput = new PageInput();
        $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($pageInput->Elements, $textElement);

        $imageResource = new ImageResource($this->inputpath . "DPDFLogo.png");
        $image = new ImageElement($imageResource, ElementPlacement::TopCenter, 0, 275);
        array_push($pageInput->Elements, $image);

        array_push($pdf->Inputs, $pageInput);

        $security = new Aes256Security("OwnerPassword", "UserPassword");
        $security->AllowAccessibility = true;
        $security->AllowSecuritying = false;

        $pdf->Security = $security;

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function EncryptExistingPDF()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $documentAResource = new PdfResource($this->inputpath . "DocumentA.pdf");
        $documentAInput = new PdfInput($documentAResource);
        array_push($pdf->Inputs, $documentAInput);

        $security = new Aes256Security("OwnerPassword", "UserPassword");
        $security->AllowCopy = false;
        $security->AllowPrint = false;

        $pdf->Security = $security;

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output2.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
