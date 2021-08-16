<?php


require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/Elements/LineElement.php');
require_once('../../../src/Elements/ElementPlacement.php');
require_once('../../../src/LineStyle.php');
require_once('../../../src/RgbColor.php');
require_once('../../../src/Template.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');




use PHPUnit\Framework\TestCase;

class LineSample extends TestCase
 {
    private $inputpath =  "./../../Resources/";
    private $outPutPath =  "./Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PageInput_Pdfoutput()
{
    $Name = "PageInput";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::BottomRight,20,20);
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample1.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."LineSample2.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."LineSample3.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."LineSample4.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color =  RgbColor::CreateRgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($input->Elements,$element);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample5.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = RgbColor::CreateRgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample6.pdf",$response->PdfContent);
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
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color =  RgbColor::CreateRgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge();
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample7.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingStream_Template_Pdfoutput()
{
    /*$Name = "PdfInputStreamPropertiesWithTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "DocumentA100::pdf")));
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $template = new Template("temp");
    $element = new LineElement(ElementPlacement::TopLeft,200,200);
    $element->Color = new RgbColor(0,0,1);
    $element->XOffset = 100;
    $element->YOffset = 100;
    $element->LineStyle = LineStyle::DashLarge;
    $element->Width = 4;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."LineSample8.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."LineSample8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


}

?>