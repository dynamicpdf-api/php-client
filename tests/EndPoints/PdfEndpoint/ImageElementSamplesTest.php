<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/Elements/ImageElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/PageInput.php');




use PHPUnit\Framework\TestCase;

class ImageElementSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PdfInputUsingFilePath_WithTemplate_Pdfoutput()
{
    $Name = "WithTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Templatescale_Pdfoutput()
{
    $Name = "ScaleWithTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    $element->ScaleX = 3;
    $element->ScaleY = 3;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_TemplateWidth_Pdfoutput()
{
    $Name = "WidthWithTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    $element->MaxHeight = 350;
    $element->MaxWidth = 350;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_TemplateWithXY_Pdfoutput()
{
    $Name = "XYWithTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    $element->XOffset = 50;
    $element->YOffset = 50;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_Template_Pdfoutput()
{
    $Name = "PageTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInput_Page_Pdfoutput()
{
    $Name = "PageElement";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingStream_Template_Pdfoutput()
{
    /*$Name = "StreamTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfStream = new MemoryStream(File::ReadAllBytes((inputpath + "DocumentA100::pdf")));
    $pdfResource = new PdfResource($pdfStream);
    $input = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $imageStream = new MemoryStream(File::ReadAllBytes((inputpath + "Northwind Logo::gif")));
    $resource1 = new ImageResource($imageStream);
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputUsingBytes_Template_Pdfoutput()
{
    $Name = "BytesTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $resource1 = new ImageResource($this->inputpath."Northwind Logo.gif");
    $element = new ImageElement($resource1,ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudRoot_Template_Pdfoutput()
{
    $Name = "CloudRootTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;


    $input =  PdfInput::CreatePdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element =  ImageElement::CreateImageElement("Northwind Logo.gif",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageElementSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageElementSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>