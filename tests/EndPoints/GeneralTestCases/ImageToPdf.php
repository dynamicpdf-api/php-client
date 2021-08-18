<?php
require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/ImageInput.php');
require_once(__DIR__.'/../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;

    class ImageToPdf extends TestCase
    {
        private $inputpath =  "./../../Resources/";
        private $outPutPath =  "./Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

        /** @test */
        public function ConvertTiffToPDF()
        {
            $pdf = new Pdf();
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;

            $resource = new ImageResource($this->inputpath."fw9_13.tif");
            $input = new ImageInput($resource);
            array_push($pdf->Inputs,$input);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output.pdf", $response->PdfContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
