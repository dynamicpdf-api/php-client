<?php


use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\FormField;
use DynamicPDF\Api\PdfResponse;
require_once __DIR__ . '/../TestParameters.php';

use PHPUnit\Framework\TestCase;

class FormFillTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function AcroFormFilling()
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $this->key;
        $pdf->BaseUrl = $this->url;

        $pdf->Author = $this->Author;
        $pdf->Title = $this->Title;

        $resource = new PdfResource($this->inputpath . "fw9AcroForm_14.pdf");
        $input = new PdfInput($resource);
        array_push($pdf->Inputs, $input);

        $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]", "Any Company, Inc.");
        array_push($pdf->FormFields, $field);
        $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]", "Any Company");
        array_push($pdf->FormFields, $field1);
        $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]", "1");
        array_push($pdf->FormFields, $field2);
        $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]", "123 Main Street");
        array_push($pdf->FormFields, $field3);
        $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]", "Washington, DC  22222");
        array_push($pdf->FormFields, $field4);
        $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]", "Any Requester");
        array_push($pdf->FormFields, $field5);
        $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]", "17288825617");
        array_push($pdf->FormFields, $field6);
        $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]", "52");
        array_push($pdf->FormFields, $field7);
        $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]", "1234567");
        array_push($pdf->FormFields, $field8);

        $response = $pdf->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output.pdf", $response->Content);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
