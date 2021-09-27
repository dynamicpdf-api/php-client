<?php

require_once __DIR__ . '/../TestParameters.php';

use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\PdfResource;
use DynamicPDF\Api\PdfInput;
use DynamicPDF\Api\PdfInfo;

use PHPUnit\Framework\TestCase;

class PdfInfoSamplesTest extends TestCase
{
    private $inputpath = TestParameters::Inputpath;
    private $outPutPath = TestParameters::OutPutPath;
    private $key = TestParameters::Key;
    private $url = TestParameters::Url;
    private $Author = TestParameters::Author;
    private $Title = TestParameters::Title;

    /** @test */
    public function AllFormFields_JsonOutput()
    {
        $Name = "AllFormFields";

        $resource = new PdfResource($this->inputpath . "AllFormFields.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output1.json", $response->JsonContent);
        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Button_JsonOutput()
    {
        $Name = "Button";

        $resource = new PdfResource($this->inputpath . "Button.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output2.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Checkbox_JsonOutput()
    {
        $Name = "Checkbox";

        $resource = new PdfResource($this->inputpath . "Checkbox.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output3.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Combo_JsonOutput()
    {
        $Name = "Combo";

        $resource = new PdfResource($this->inputpath . "Checkbox.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output4.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ComboExport_JsonOutput()
    {
        $Name = "ComboExport";

        $resource = new PdfResource($this->inputpath . "ComboExport.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output5.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ComboExport1_JsonOutput()
    {
        $Name = "ComboExport1";

        $resource = new PdfResource($this->inputpath . "ComboExport1.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output6.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ComboExport2_JsonOutput()
    {
        $Name = "ComboExport2";

        $resource = new PdfResource($this->inputpath . "ComboExport2.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output7.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ListBoxMultiSelect_JsonOutput()
    {
        $Name = "ListBoxMultiSelect";

        $resource = new PdfResource($this->inputpath . "ListBoxMultiSelect.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output8.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ListBoxSingleSelect_JsonOutput()
    {
        $Name = "ListBoxSingleSelect";

        $resource = new PdfResource($this->inputpath . "ListBoxSingleSelect.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output9.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ListMultiSelectExport1_JsonOutput()
    {
        $Name = "ListMultiSelectExport1";

        $resource = new PdfResource($this->inputpath . "ListMultiSelectExport1.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output10.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function ListMultiSelectExport2_JsonOutput()
    {
        $Name = "ListMultiSelectExport2";

        $resource = new PdfResource($this->inputpath . "ListMultiSelectExport2.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output11.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function PushButton_JsonOutput()
    {
        $Name = "PushButton";

        $resource = new PdfResource($this->inputpath . "PushButton.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output12.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Radio_JsonOutput()
    {
        $Name = "Radio";

        $resource = new PdfResource($this->inputpath . "Radio.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output13.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function Signature_JsonOutput()
    {
        $Name = "Signature";

        $resource = new PdfResource($this->inputpath . "Signature.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output14.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function SignatureNoSign_JsonOutput()
    {
        $Name = "SignatureNoSign";

        $resource = new PdfResource($this->inputpath . "SignatureNoSign.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output15.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextField_JsonOutput()
    {
        $Name = "TextField";

        $resource = new PdfResource($this->inputpath . "TextField.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output16.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }

    /** @test */
    public function TextField2_JsonOutput()
    {
        $Name = "TextField2";

        $resource = new PdfResource($this->inputpath . "TextField2.pdf");

        $pdfInfo = new PdfInfo($resource);
        $pdfInfo->ApiKey = $this->key;
        $pdfInfo->BaseUrl = $this->url;

        $response = $pdfInfo->Process();

        if ($response->IsSuccessful) {
            file_put_contents($this->outPutPath . "Output17.json", $response->JsonContent);

        }
        $this->assertEquals($response->IsSuccessful, true);
    }
}
