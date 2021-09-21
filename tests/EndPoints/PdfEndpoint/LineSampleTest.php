<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/Elements/LineElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/LineStyle.php');
require_once(__DIR__.'/../../../src/RgbColor.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../KeyAndUrl.php'); 



use PHPUnit\Framework\TestCase;

class LineSampleTest extends TestCase
 {
    private $inputpath = KeyAndUrl::Inputpath;
    private $outPutPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;

/** @test */
public function PageInput_Pdfoutput()
{
    $Name = "PageInput";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::BottomRight,20,20);
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputLineStyle_Pdfoutput()
{
    $Name = "PageInputLineStyle";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::TopCenter,200,200);
    $element->LineStyle = new LineStyle(array( 2, 4, 2 ), 0.5);
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputXYOffset_Pdfoutput()
{
    $Name = "PageInputWithXYOffset";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::TopCenter,200,200);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::Dash();
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputColor_Pdfoutput()
{
    $Name = "PageInputWithColor";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::TopCenter,200,200);
    $element->Color = RgbColor::Red();
    $element->LineStyle = LineStyle::Dots();
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputProperties_Pdfoutput()
{
    $Name = "PageInputWithProperties";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = new RgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfPageInputPropertiesWithTemplate_Pdfoutput()
{
    $Name = "PageInputPropertiesWithTemplate";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = new RgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Template_Pdfoutput()
{
    $Name = "PdfInputPropertiesWithTemplate";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = new RgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingStream_Template_Pdfoutput()
{
    $Name = "PdfInputStreamPropertiesWithTemplate";
    
    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;


    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = new RgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>