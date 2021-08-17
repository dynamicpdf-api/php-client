<?php
require_once('../../../src/Pdf.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/ImageInput.php');
require_once('../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;

    class ImageToPdf extends TestCase
    {
        static $resoursePath =  "./../../Resources/";
        static $outPutPath =  "./Output/";
        static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
        static $url = "https://localhost:44397/v1.0"; 
    
        static $Author= "test";
        static $Title ="test";

        /** @test */
        public function ConvertTiffToPDF()
        {
            Pdf::$DefaultApiKey = ImageToPdf::$key;
		    Pdf::$DefaultBaseUrl = ImageToPdf::$url;

		    $pdf = new Pdf();
		    $pdf->Instructions->Author = ImageToPdf::$Author;
		    $pdf->Instructions->Title = ImageToPdf::$Title;

            $resource = new ImageResource(ImageToPdf::$resoursePath."fw9_13.tif");
            $input = new ImageInput($resource);
            array_push($pdf->Inputs,$input);

            $response = $pdf->Process();


            if (response.IsSuccessful)
            {
                file_put_contents(ImageToPdf::$outPutPath."Output.pdf", $response->PdfContent);
            }
        }
    }
?>
