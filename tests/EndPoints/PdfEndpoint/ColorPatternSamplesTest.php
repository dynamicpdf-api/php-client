<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/RgbColor.php');
require_once(__DIR__.'/../../../src/CmykColor.php');
require_once(__DIR__.'/../../../src/Grayscale.php');


use PHPUnit\Framework\TestCase;

class ColorPatternSamplesTest extends TestCase
 {
      private $inputpath = KeyAndUrl::Inputpath;
        private $outputPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;


/** @test */
public function PdfPageInput_NamedColorSample_PdfOutput()
{
    $Name = "NamedColor";

    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf = new Pdf();
    
    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = RgbColor::Red();
    array_push($template->Elements,$textElement);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_RGBColorSample_PdfOutput()
{
    $Name = "RGBColor";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf = new Pdf();
    
    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = new RgbColor(0,1,0);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_CMYKColorSample_PdfOutput()
{
    $Name = "CMYKColor";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf = new Pdf();
    
    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = new CmykColor(0,1,0,0);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_GrayScaleColorSample_PdfOutput()
{
    $Name = "GrayScale";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf = new Pdf();
    
    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = new Grayscale(0.8);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>