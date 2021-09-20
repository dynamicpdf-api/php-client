<?php
require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/ImageInput.php');
require_once(__DIR__.'/../../../src/PdfResponse.php');
require_once(__DIR__.'/../KeyAndUrl.php');  

use PHPUnit\Framework\TestCase;

    class ImageToPdfTest extends TestCase
    {
        private $inputpath = KeyAndUrl::Inputpath;
        private $outPutPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;

        /** @test */
        public function ConvertTiffToPDF()
        {
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;
            $pdf = new Pdf();
          

            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;

            $resource = new ImageResource($this->inputpath."fw9_13.tif");
            $input = new ImageInput($resource);
            array_push($pdf->Inputs,$input);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outPutPath."Output.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
