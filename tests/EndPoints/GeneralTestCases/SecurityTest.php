<?php
   
    require_once(__DIR__.'/../../../src/Pdf.php');
    require_once(__DIR__.'/../../../src/PdfResource.php');
    require_once(__DIR__.'/../../../src/PdfInput.php');
    require_once(__DIR__.'/../../../src/Aes256Security.php');
    require_once(__DIR__.'/../../../src/PdfResponse.php');
    require_once(__DIR__.'/../../../src/PageInput.php');
    require_once(__DIR__.'/../../../src/Aes128Security.php');
    require_once(__DIR__.'/../../../src/RC4128Security.php');
    require_once(__DIR__.'/../../../src/Elements/TextElement.php');
    require_once(__DIR__.'/../../../src/ImageResource.php');
    require_once(__DIR__.'/../../../src/Elements/ImageElement.php');
    require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');

use PHPUnit\Framework\TestCase;

    class SecurityTest extends TestCase
    {
        private $inputpath =  __DIR__."./../../Resources/";
        private $outPutPath =  __DIR__."./../Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

        /** @test */
        public function EncryptPDF()
        {
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $pdf = new Pdf();
           
        
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;


            $pageInput = new PageInput();
            $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
            array_push($pageInput->Elements,$textElement);

            $imageResource = new ImageResource($this->inputpath."DPDFLogo.png");
            $image = new ImageElement($imageResource, ElementPlacement::TopCenter, 0, 275);
            array_push($pageInput->Elements,$image);

            array_push($pdf->Inputs,$pageInput);

            $security = new Aes256Security("OwnerPassword", "UserPassword");
            $security->AllowAccessibility = true;
            $security->AllowSecuritying = false;

            $pdf->Security = $security;

            $response = $pdf->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function EncryptExistingPDF()
        {
            $pdf = new Pdf();
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
        
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;


            $documentAResource = new PdfResource($this->inputpath."DocumentA.pdf");
            $documentAInput = new PdfInput($documentAResource);
            array_push($pdf->Inputs,$documentAInput);

            $security = new Aes256Security("OwnerPassword", "UserPassword");
            $security->AllowCopy = false;
            $security->AllowPrint = false;

            $pdf->Security = $security;

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output2.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
