<?php


require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/Elements/TextElement.php');
require_once('../../../src/Elements/ElementPlacement.php');




use PHPUnit\Framework\TestCase;

class TemplateSamples extends TestCase
 {
    private $inputpath =  "./../../Resources/";
    private $outPutPath =  "./Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function FilePathInputTextElement_Pdfoutput()
{
    $Name = "FilePathInputTextElement";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath.@"DocumentA100.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples1.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamInputTextElement_Pdfoutput()
{
   /* $Name = "StreamInputTextElement";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + @"DocumentA100::pdf")));
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples2.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesTextElement_Pdfoutput()
{
   /* $Name = "BytesInputTextElement";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource(File::ReadAllBytes((inputpath + @"DocumentA100::pdf")));
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples3.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function CloudRootTextElement_Pdfoutput()
{
    $Name = "CloudRootInputTextElement";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  PdfInput::CreatePdfInput("DocumentA100.pdf");

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples4.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderTextElement_Pdfoutput()
{
    $Name = "CloudSubFolderInputTextElement";

    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = PdfInput::CreatePdfInput("Resources/DocumentA100.pdf");

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();


    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples5.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>