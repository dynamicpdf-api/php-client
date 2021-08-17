<?php
    require_once('../../../src/Pdf.php');
    require_once('../../../src/PdfResource.php');
    require_once('../../../src/PdfInput.php');
    require_once('../../../src/PdfResponse.php');
    
    use PHPUnit\Framework\TestCase;

    class Merge extends TestCase
    {
        static $resoursePath =  "./../../Resources/";
        static $outPutPath =  "./Output/";
        static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
        static $url = "https://localhost:44397/v1.0"; 
    
        static $Author= "test";
        static $Title ="test";

        /** @test */
        public function MergePdfs()
        {
            Pdf::$DefaultApiKey = Merge::$key;
		    Pdf::$DefaultBaseUrl = Merge::$url;

		    $pdf = new Pdf();
		    $pdf->Instructions->Author = Merge::$Author;
		    $pdf->Instructions->Title = Merge::$Title;

            $documentAResource = new PdfResource(Merge::$resoursePath."DocumentA.pdf");
            $documentAInput = new PdfInput($documentAResource);
            array_push($pdf->Inputs,$documentAInput);

            $documentBResource = new PdfResource(Merge::$resoursePath."DocumentB.pdf");
            $documentBInput = new PdfInput($documentBResource);
            array_push($pdf->Inputs,$documentBInput);

            $documentCResource = new PdfResource(Merge::$resoursePath."DocumentC.pdf");
            $documentCInput = new PdfInput($documentCResource);
            array_push($pdf->Inputs,$documentCInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents(Merge::$outPutPath."Output.pdf", $response->Content);
            }
            
        }
    }
?>
