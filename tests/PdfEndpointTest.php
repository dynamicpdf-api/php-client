<?php
require_once(__DIR__ . '/../src/Pdf.php');
require_once(__DIR__ . '/../src/PdfInstructions.php');
require_once(__DIR__ . '/../src/PdfInput.php');
require_once(__DIR__ . '/../src/ImageInput.php');
require_once(__DIR__ . '/../src/ImageResource.php');

use PHPUnit\Framework\TestCase;

class PdfEndpointTest extends TestCase
{
    private static  $ResourcesPath;

    /**
     *  @beforeClass
     */
    public static function initPdf()
    {
        self::$ResourcesPath = __DIR__ . DIRECTORY_SEPARATOR;
        Pdf::$ApiKey = "DP.Ax4pDLHEVHGq5eJKD3rilQ3TFrgh2ayGQ5jdu3v7QlJ2QKsOtTje7Mhg";
        Pdf::$BaseUrl = 'https://localhost:44397/v1.0/pdf/';
        echo("Initialized\n");
    }

    public function testPdfProperties()
    {
        $instructions = new PdfInstructions();
        $instructions->Author = "KashinathGS";
        $instructions->Title = "MergeOptions Test Sample";

        $input = new PdfInput(realpath(self::$ResourcesPath . "DocumentA100.pdf"));
        array_push($instructions->Inputs, $input);

        $pdf = new Pdf($instructions);
        $pdfResponse = $pdf->Process();
        
        //print_r($pdfResponse);
        $this->assertEquals($pdfResponse->IsSuccessful,true);
    }

    public function testPdfMerge()
    {
        // This test-case is currently failing due to a bug in PHP
        // https://bugs.php.net/bug.php?id=51634

        $instructions = new PdfInstructions();
        $instructions->Author = "KashinathGS";
        $instructions->Title = "MergeOptions Test Sample";

        $input = new PdfInput(realpath(self::$ResourcesPath . "DocumentA100.pdf"));
        $input1 = new PdfInput(realpath(self::$ResourcesPath . "Invoice.pdf"));
        $input2 = new PdfInput(realpath(self::$ResourcesPath . "outputTextArea.pdf"));
        array_push($instructions->Inputs, $input);
        array_push($instructions->Inputs, $input1);
        array_push($instructions->Inputs, $input2);

        $pdf = new Pdf($instructions);
        $pdfResponse = $pdf->Process();
        
        $this->assertEquals($pdfResponse->IsSuccessful,true);
    }

    public function testPdfImageInput()
    {
        $instructions = new PdfInstructions();
        $instructions->Author = "KashinathGS";
        $instructions->Title = "MergeOptions Test Sample";

        $input = new ImageInput(new ImageResource(realpath(self::$ResourcesPath . "DocumentA100.pdf")));
        array_push($instructions->Inputs, $input);

        $pdf = new Pdf($instructions);
        $pdfResponse = $pdf->Process();
        
        $this->assertEquals($pdfResponse->IsSuccessful,true);
    }

}
