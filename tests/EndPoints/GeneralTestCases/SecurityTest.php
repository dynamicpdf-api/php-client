<?php


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\Aes256Security;
use DynamicPDF\Api\PdfResponse;
use DynamicPDF\Api\PageInput;
use DynamicPDF\Api\Aes128Security;
use DynamicPDF\Api\RC4128Security;
use DynamicPDF\Api\ImageResource;
use PHPUnit\Framework\TestCase;
use DynamicPDF\Api\Elements\TextElement;
use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\ImageElement;

require_once __DIR__ . '/../TestParameters.php';



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
