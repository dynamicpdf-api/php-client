<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');




use PHPUnit\Framework\TestCase;

class TemplateSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function FilePathInputTextElement_Pdfoutput()
{
    $Name = "FilePathInputTextElement";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamInputTextElement_Pdfoutput()
{
   $Name = "StreamInputTextElement";

   Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url; 
   $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesTextElement_Pdfoutput()
{
    $Name = "BytesInputTextElement";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $length = filesize($this->inputpath . "DocumentA100.pdf");
    $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $resource = new PdfResource(unpack('C*',$array));
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootTextElement_Pdfoutput()
{
    $Name = "CloudRootInputTextElement";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("DocumentA100.pdf");

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderTextElement_Pdfoutput()
{
    $Name = "CloudSubFolderInputTextElement";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("Resources/DocumentA100.pdf");

    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();


    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplateSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplateSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>