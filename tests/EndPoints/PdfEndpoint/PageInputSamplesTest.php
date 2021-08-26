<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/LineElement.php');
require_once(__DIR__.'/../../../src/LineStyle.php');


use PHPUnit\Framework\TestCase;

class PageInputSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PageInput_TextElement_Pdfoutput()
{
    $Name = "TextElement";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PageInputSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PageInputSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_TextElementAddedToPageAndTemplate_Pdfoutput()
{
    $Name = "TextElementAddedToPageAndTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new TextElement("Hello World1",ElementPlacement::TopLeft);
    array_push($pageInput->Elements,$element);


    $template = new Template("Temp1");
    $element1 = new TextElement("Hello World",ElementPlacement::TopCenter);
    array_push($template->Elements,$element1);

    $pageInput->SetTemplate($template);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PageInputSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PageInputSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_AddPage_Pdfoutput()
{
    $Name = "PageInput_AddPage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = $pdf->AddPage();

    $element = new LineElement(ElementPlacement::TopCenter,200,200);
    $element->LineStyle = LineStyle::Dots();

    array_push($input->Elements,$element);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PageInputSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PageInputSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_AddPageTemplate_Pdfoutput()
{
    $Name = "PageInput_AddPageTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = $pdf->AddPage();

    $element = new TextElement("test",ElementPlacement::TopCenter);
    $template = new Template("temp");
    array_push($template->Elements,$element);

    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PageInputSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PageInputSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_AddPageParameters_Pdfoutput()
{
    $Name = "AddPageParameters";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = $pdf->AddPage(500,500);

    $element = new TextElement("test",ElementPlacement::TopCenter);
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PageInputSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PageInputSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>