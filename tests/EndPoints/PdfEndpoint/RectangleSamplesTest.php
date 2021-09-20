<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/Elements/RectangleElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/LineStyle.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/RgbColor.php');




use PHPUnit\Framework\TestCase;

class RectangleSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PageInput_Pdfoutput()
{
    $Name = "PageInput";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputPlacement_Pdfoutput()
{
    $Name = "PageInputPlacement";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->Placement = ElementPlacement::BottomRight;
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputXYOffset_Pdfoutput()
{
    $Name = "PageInputXYOffset";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopLeft,100,50);
    $element->XOffset = 50;
    $element->YOffset = 50;
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputCornerRadius_Pdfoutput()
{
    $Name = "PageInputCornerRadius";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->CornerRadius = 10;
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputtBorderWidth_Pdfoutput()
{
    $Name = "PageInputtBorderWidth";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->BorderWidth = 5;
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputBorderStyle_Pdfoutput()
{
    $Name = "PageInputBorderStyle";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->BorderStyle = LineStyle::Dots();
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputBorderStyleArray_Pdfoutput()
{
    $Name = "PageInputBorderStyleArray";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->BorderStyle = new LineStyle(array ( 2, 1, 4, 2 ));
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputBorderColor_Pdfoutput()
{
    $Name = "PageInputBorderColor";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->BorderColor = RgbColor::Blue();
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputFillColor_Pdfoutput()
{
    $Name = "PageInputFillColor";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pageInput = new PageInput();
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->FillColor = RgbColor::Green();
    array_push($pageInput->Elements,$element);

    array_push($pdf->Inputs,$pageInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_PdfOutput()
{
    $Name = "FilePath";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);
    $template = new Template("Temp1");

    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Bytes_PdfOutput()
{
    $Name = "FilePath";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);
    $template = new Template("Temp1");

    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Stream_PdfOutput()
{
    $Name = "Stream";
    
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

    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRoot_PdfOutput()
{
    $Name = "CloudRoot";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$input);
    $template = new Template("Temp1");

    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolder_PdfOutput()
{
    $Name = "CloudSubFolder";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Resources/DocumentA100.pdf");
    array_push($pdf->Inputs,$input);
    $template = new Template("Temp1");

    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathEvenOddTemplate_PdfOutput()
{
    $Name = "FilePathEvenOddTemplateEven";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $template = new Template("Temp1");
    $element = new RectangleElement(ElementPlacement::TopCenter,100,50);
    $element->EvenPages = true;
    array_push($template->Elements,$element);
    $input->SetTemplate($template);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."RectangleSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."RectangleSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>