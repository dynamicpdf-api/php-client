<?php
   
   require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Aes256Security.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/Aes128Security.php');
require_once('../../../src/RC4128Security.php');

use PHPUnit\Framework\TestCase;

    class Security extends TestCase
    {
        static $resoursePath =  "./../../Resources/";
        static $outPutPath =  "./Output/";
        static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
        static $url = "https://localhost:44397/v1.0"; 
    
        static $Author= "test";
        static $Title ="test";

        /** @test */
        public function EncryptPDF()
        {
              Pdf::$DefaultApiKey = Security::$key;
		    Pdf::$DefaultBaseUrl = Security::$url;

		    $pdf = new Pdf();
		    $pdf->Instructions->Author = Security::$Author;
		    $pdf->Instructions->Title = Security::$Title;


            $pageInput = new PageInput();
            $textElement = new TextElement("Hello World", ElementPlacement::TopCenter);
            array_push($pageInput->Elements,$textElement);

            $imageResource = new ImageResource(Security::$resoursePath."DPDFLogo.png");
            $image = new ImageElement($imageResource, ElementPlacement::TopCenter, 0, 275);
            array_push($pageInput->Elements,$image);

            array_push($pdf->Inputs,$pageInput);

            $security = new Aes256Security("OwnerPassword", "UserPassword");
            $security->AllowAccessibility = true;
            $security->AllowSecuritying = false;

            $pdf->Security = $security;

            $response = $pdf->Process();

            if (response.IsSuccessful)
            {
                file_put_contents(Security::$outPutPath."Output.pdf", $response->Content);
            }
        }

        /** @test */
        public function EncryptExistingPDF()
        {
            Pdf::$DefaultApiKey = Security::$key;
		    Pdf::$DefaultBaseUrl = Security::$url;

		    $pdf = new Pdf();
		    $pdf->Instructions->Author = Security::$Author;
		    $pdf->Instructions->Title = Security::$Title;


            $documentAResource = new PdfResource(Security::$resoursePath."DocumentA.pdf");
            $documentAInput = new PdfInput($documentAResource);
            array_push($pdf->Inputs,$documentAInput);

            $security = new Aes256Security("OwnerPassword", "UserPassword");
            $security->AllowCopy = false;
            $security->AllowPrint = false;

            $pdf->Security = $security;

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                File.WriteAllBytes(Security::$outPutPath."Output.pdf", $response->Content);
            }
        }
    }
?>
