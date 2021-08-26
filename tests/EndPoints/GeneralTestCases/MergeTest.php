<?php
    require_once(__DIR__.'/../../../src/Pdf.php');
    require_once(__DIR__.'/../../../src/PdfResource.php');
    require_once(__DIR__.'/../../../src/PdfInput.php');
    require_once(__DIR__.'/../../../src/PdfResponse.php');
    
    use PHPUnit\Framework\TestCase;

    class MergeTest extends TestCase
    {
        private $inputpath =  __DIR__."./../../Resources/";
        private $outPutPath =  __DIR__."./../Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

        /** @test */
        public function MergePdfs()
        {
            $pdf = new Pdf();
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;

            $documentAResource = new PdfResource($this->inputpath."DocumentA.pdf");
            $documentAInput = new PdfInput($documentAResource);
            array_push($pdf->Inputs,$documentAInput);

            $documentBResource = new PdfResource($this->inputpath."DocumentB.pdf");
            $documentBInput = new PdfInput($documentBResource);
            array_push($pdf->Inputs,$documentBInput);

            $documentCResource = new PdfResource($this->inputpath."DocumentC.pdf");
            $documentCInput = new PdfInput($documentCResource);
            array_push($pdf->Inputs,$documentCInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
