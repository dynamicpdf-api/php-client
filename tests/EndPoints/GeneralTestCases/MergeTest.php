<?php
    require_once(__DIR__.'/../../../src/Pdf.php');
    require_once(__DIR__.'/../../../src/PdfResource.php');
    require_once(__DIR__.'/../../../src/PdfInput.php');
    require_once(__DIR__.'/../../../src/PdfResponse.php');
    
    use PHPUnit\Framework\TestCase;

    class MergeTest extends TestCase
    {
        private $inputpath = KeyAndUrl::Inputpath;
        private $outputPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;
        
        /** @test */
        public function MergePdfs()
        {
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $pdf = new Pdf();
           

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
