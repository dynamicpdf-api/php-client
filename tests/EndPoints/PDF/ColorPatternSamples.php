﻿<?php


require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/Elements/TextElement.php');
require_once('../../../src/Elements/ElementPlacement.php');
require_once('../../../src/RgbColor.php');
require_once('../../../src/CmykColor.php');
require_once('../../../src/Grayscale.php');


use PHPUnit\Framework\TestCase;

class ColorPatternSamples extends TestCase
 {
    private $inputpath =  "./../../Resources/";
    private $outPutPath =  "./Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PdfPageInput_NamedColorSample_PdfOutput()
{
    $Name = "NamedColor";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."ColorPatternSamples1.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_RGBColorSample_PdfOutput()
{
    $Name = "RGBColor";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = RgbColor::CreateRgbColor(0,1,0);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples2.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_CMYKColorSample_PdfOutput()
{
    $Name = "CMYKColor";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = CmykColor::CreateCmykColor(0,1,0,0);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples3.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_GrayScaleColorSample_PdfOutput()
{
    $Name = "GrayScale";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
    $textElement->Color = Grayscale::CreateGrayscale(0.8);
    array_push($input->Elements,$textElement);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ColorPatternSamples4.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ColorPatternSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>