<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/PageNumberingElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');


require_once(__DIR__.'/../../../src/Font.php');
require_once(__DIR__.'/../../../src/RgbColor.php');
require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/ImageInput.php');
require_once(__DIR__.'/../../../src/Align.php');
require_once(__DIR__.'/../../../src/VAlign.php');
require_once(__DIR__.'/../KeyAndUrl.php'); 

use PHPUnit\Framework\TestCase;

class TemplatePagenumberingSamplesTest extends TestCase
 {
    private $inputpath = KeyAndUrl::Inputpath;
    private $outPutPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;


/** @test */
public function FilePathInputPNE_PdfOutput()
{
    $Name = "FilePathInputPNE";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamInputPNE_PdfOutput()
{
    $Name = "StreamInputPNE";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $pdfResource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesInputPNE_PdfOutput()
{
    $Name = "BytesInputPNE";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $length = filesize($this->inputpath . "DocumentA100.pdf");
    $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);

    $pdfResource = new PdfResource(unpack('C*',$array));
    $input = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootInputPNE_PdfOutput()
{
    $Name = "CloudRootInputPNE";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("DocumentA100.pdf");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderInputPNE_PdfOutput()
{
    $Name = "CloudSubFolderInputPNE";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("Resources/DocumentA100.pdf");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathInputPNEWithProperties_PdfOutput()
{
    $Name = "FilePathInputPNEWithProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($pdfResource);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
    $element->Font($fontResource);
    $element->FontSize = 14.0;

    $element->Color = RgbColor::Red();
    array_push($templateA->Elements,$element);

    $input->SetTemplate($templateA);


    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathInputPNEs_PdfOutput()
{
    $Name = "FilePathInputPNEs";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamInputPNEs_PdfOutput()
{
    $Name = "StreamInputPNEs";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "Invoice.pdf", "r");
    $invoiceResource = new PdfResource($file);
    fclose($file);

    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $file2 = fopen($this->inputpath. "fw9AcroForm_18.pdf", "r");
    $fw9AcroForm_18Resource = new PdfResource($file2);
    fclose($file2);

    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $file3 = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $documentA100Resource = new PdfResource($file3);
    fclose($file3);

    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesInputPNEs_PdfOutput()
{
    $Name = "BytesInputPNEs";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $length = filesize($this->inputpath . "Invoice.pdf");
    $file = fopen($this->inputpath . "Invoice.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);

    $invoiceResource = new PdfResource(unpack('C*',$array));
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $length = filesize($this->inputpath . "fw9AcroForm_18.pdf");
    $file = fopen($this->inputpath . "fw9AcroForm_18.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $fw9AcroForm_18Resource = new PdfResource(unpack('C*',$array));
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $length = filesize($this->inputpath . "DocumentA100.pdf");
    $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $documentA100Resource = new PdfResource(unpack('C*',$array));
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootInputPNEs_PdfOutput()
{
    $Name = "CloudRootInputPNEs";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderInputPNEs_PdfOutput()
{
    $Name = "CloudSubFolderInputPNEs";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Resources/Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("Resources/fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("Resources/DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEWithProperties_PdfOutput()
{
    $Name = "FilePathPNEWithProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
    $topElement->Font($fontResource);
    $topElement->FontSize = 14.0;
    $topElement->Color = RgbColor::Red();
    array_push($templateA->Elements,$topElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter,50,-50);
    $bottomElement->FontSize = 14.0;
    $bottomElement->Color = RgbColor::Red();
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEsWithTokens_PdfOutput()
{
    $Name = "FilePathPNEsWithTokens";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $emptypages = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft);
    array_push($templateA->Elements,$topLeftElement);

    $topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topCenterElement);

    $topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight);
    array_push($templateA->Elements,$topRightElement);

    $bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft);
    array_push($templateA->Elements,$bottomLeftElement);

    $bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter);
    array_push($templateA->Elements,$bottomCenterElement);

    $bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight);
    array_push($templateA->Elements,$bottomRightElement);

    $emptypages->SetTemplate($templateA);

    array_push($pdf->Inputs,$emptypages);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_PNEsWithTokensAndProperties_PdfOutput()
{
    $Name = "FilePath_PNEsWithTokensAndProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $emptypages = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$emptypages);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");


    $templateA = new Template("TemplateA");
    $topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft,50,50);
    $topLeftElement->Font($fontResource);
    $topLeftElement->FontSize = 14.0;
    array_push($templateA->Elements,$topLeftElement);

    $topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter,50,50);
    $topCenterElement->Font($fontResource);
    $topCenterElement->FontSize = 14.0;
    array_push($templateA->Elements,$topCenterElement);

    $topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight,-50,50);
    $topRightElement->Font($fontResource);
    $topRightElement->FontSize = 14.0;
    array_push($templateA->Elements,$topRightElement);

    $bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft,50,-50);
    $bottomLeftElement->Font($fontResource);
    $bottomLeftElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomLeftElement);

    $bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter,50,-50);
    $bottomCenterElement->Font($fontResource);
    $bottomCenterElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomCenterElement);

    $bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight,-50,-50);
    $bottomRightElement->Font($fontResource);
    $bottomRightElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomRightElement);

    $emptypages->SetTemplate($templateA);
    array_push($pdf->Inputs,$emptypages);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_PNEsWithTokens_PdfOutput()
{
    $Name = "FilePath_PNEsWithTokens";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft);
    array_push($templateA->Elements,$topLeftElement);

    $topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$topCenterElement);

    $topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight);
    array_push($templateA->Elements,$topRightElement);

    $bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft);
    array_push($templateA->Elements,$bottomLeftElement);

    $bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter);
    array_push($templateA->Elements,$bottomCenterElement);

    $bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight);
    array_push($templateA->Elements,$bottomRightElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
    array_push($templateB->Elements,$bottomElement);
    $fw9AcroForm_18->SetTemplate($templateB);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEsWithTokensAndProperties_PdfOutput()
{
    $Name = "FilePathPNEsWithTokensAndProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft,50,50);
    $topLeftElement->Font($fontResource);
    $topLeftElement->FontSize = 14.0;
    array_push($templateA->Elements,$topLeftElement);

    $topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter,50,50);
    $topCenterElement->Font($fontResource);
    $topCenterElement->FontSize = 14.0;
    array_push($templateA->Elements,$topCenterElement);

    $topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight,-50,50);
    $topRightElement->Font($fontResource);
    $topRightElement->FontSize = 14.0;
    array_push($templateA->Elements,$topRightElement);

    $bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft,50,-50);
    $bottomLeftElement->Font($fontResource);
    $bottomLeftElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomLeftElement);

    $bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter,50,-50);
    $bottomCenterElement->Font($fontResource);
    $bottomCenterElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomCenterElement);

    $bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight,-50,-50);
    $bottomRightElement->Font($fontResource);
    $bottomRightElement->FontSize = 14.0;
    array_push($templateA->Elements,$bottomRightElement);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter,50,-50);
    $bottomElement->Font($fontResource);
    $bottomElement->FontSize = 14.0;
    $bottomElement->Color = RgbColor::Blue();
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_PNEWithMultilineAndProperties_PdfOutput()
{
    $Name = "FilePath_PNEWithMultilineAndProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$input);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% \r\nof %%TP%%",ElementPlacement::TopCenter,50,50);
    $element->Font($fontResource);
    $element->FontSize = 14.0;
    array_push($templateA->Elements,$element);


    $input->SetTemplate($templateA);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEAddedToEvenPages_PdfOutput()
{
    $Name = "FilePathPNEAddedToEvenPages";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples18.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Stream_PNEAddedToEvenPages_PdfOutput()
{
    $Name = "Stream_PNEAddedToEvenPages";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $pdfResource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples19.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Bytes_PNEAddedToEvenPages_PdfOutput()
{
    $Name = "Bytes_PNEAddedToEvenPages";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $length = filesize($this->inputpath . "DocumentA100.pdf");
    $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $pdfResource = new PdfResource(unpack('C*',$array));
    $input = new PdfInput($pdfResource);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples20.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples20.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootPNEAddedToEvenPages_PdfOutput()
{
    $Name = "CloudRootPNEAddedToEvenPages";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("DocumentA100.pdf");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples21.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples21.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderPNEAddedToEO_PdfOutput()
{
    $Name = "CloudSubFolderPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("Resources/DocumentA100.pdf");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples22.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples22.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEWithPropertiesAddedToEO_PdfOutput()
{
    $Name = "FilePathPNEWithPropertiesAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($pdfResource);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
    $element->Font($fontResource);
    $element->FontSize = 14.0;
    $element->EvenPages = true;
    $element->Color = RgbColor::Red();
    array_push($templateA->Elements,$element);
    $input->SetTemplate($templateA);

    array_push($pdf->Inputs,$input);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples23.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEAddedToEO_PdfOutput()
{
    $Name = "FilePathPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
    $bottomElement->OddPages = true;
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples24.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples24.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamInputPNEAddedToEO_PdfOutput()
{
    $Name = "StreamInputPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "Invoice.pdf", "r");
    $invoiceResource = new PdfResource($file);
    fclose($file);

    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $file2 = fopen($this->inputpath. "fw9AcroForm_18.pdf", "r");
    $fw9AcroForm_18Resource = new PdfResource($file2);
    fclose($file2);

    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $file3 = fopen($this->inputpath. "DocumentA100.pdf", "r");
    $documentA100Resource = new PdfResource($file3);
    fclose($file3);

    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
    $bottomElement->OddPages = true;
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples25.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples25.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesInputPNEAddedToEO_PdfOutput()
{
    $Name = "BytesInputPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $length = filesize($this->inputpath . "Invoice.pdf");
    $file = fopen($this->inputpath . "Invoice.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $invoiceResource = new PdfResource(unpack('C*',$array));
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $length = filesize($this->inputpath . "fw9AcroForm_18.pdf");
    $file = fopen($this->inputpath . "fw9AcroForm_18.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $fw9AcroForm_18Resource = new PdfResource(unpack('C*',$array));
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $length = filesize($this->inputpath . "DocumentA100.pdf");
    $file = fopen($this->inputpath . "DocumentA100.pdf", "r");
    $array =  fread($file, $length);
    fclose($file);
    $documentA100Resource = new PdfResource(unpack('C*',$array));
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
    $bottomElement->OddPages = true;
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples26.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples26.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootPNEAddedToEO_PdfOutput()
{
    $Name = "CloudRootPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
    $bottomElement->OddPages = true;
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples27.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples27.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function ColudSubFolderPNEAddedToEO_PdfOutput()
{
    $Name = "ColudSubFolderPNEAddedToEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Resources/Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("Resources/fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("Resources/DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
    $element->EvenPages = true;
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
    $bottomElement->OddPages = true;
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples28.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples28.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPNEWithPropertiesEO_PdfOutput()
{
    $Name = "FilePathPNEWithPropertiesEO";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Resource = new PdfResource($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $fontResource = Font::FromFile($this->inputpath."ARIALNB.TTF","arialfont");

    $templateA = new Template("TemplateA");
    $element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight,-50,50);
    $element->Font($fontResource);
    $element->FontSize = 14.0;
    $element->EvenPages = true;
    $element->Color = RgbColor::Red();
    array_push($templateA->Elements,$element);

    $invoice->SetTemplate($templateA);
    $documentA100->SetTemplate($templateA);

    $templateB = new Template("TemplateB");
    $bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft,50,-50);
    $bottomElement->Font($fontResource);
    $bottomElement->FontSize = 14.0;
    $bottomElement->OddPages = true;
    $bottomElement->Color = RgbColor::Blue();
    array_push($templateB->Elements,$bottomElement);

    $fw9AcroForm_18->SetTemplate($templateB);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples29.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples29.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInputTextAndImageAndPNEWithProperties_PdfOutput()
{
    $Name = "PageInputTextAndImageAndPNEWithProperties";

    $pdf = new Pdf();
    $pdf->ApiKey = $this->key;
    $pdf->BaseUrl = $this->url;
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;;

    //Add Blank Page
    $pageInput = new PageInput();

    //Add element into the page
    $element = new TextElement("Hello World1",ElementPlacement::TopLeft);
    $element->Color = RgbColor::Red();
    array_push($pageInput->Elements,$element);


    //Create template and add text element
    $template = new Template("Temp1");
    $element1 = new TextElement("Hello World",ElementPlacement::TopCenter);
    $element->Color = RgbColor::Blue();
    array_push($template->Elements,$element1);

    $pageInput->SetTemplate($template);

    array_push($pdf->Inputs,$pageInput);

    // Add Pdfinput
    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoicePdfInput = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoicePdfInput);

    //Create template and add pagenumbering element
    $templateA = new Template("TemplateA");
    $pageNumberingElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
    array_push($templateA->Elements,$pageNumberingElement);

    $invoicePdfInput->SetTemplate($templateA);

    //Add pdfinput
    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100PdfInput = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100PdfInput);

    //create EvenAddTemplate with pagenumbering label
    $templateB = new Template("TemplateB");
    $pageNumberingElement1 = new PageNumberingElement("%%CP%%",ElementPlacement::TopCenter);
    $pageNumberingElement1->OddPages = true;
    array_push($templateB->Elements,$pageNumberingElement1);

    $documentA100PdfInput->SetTemplate($templateB);

    //Add pdfinput

    $singlePageResource = new PdfResource($this->inputpath."SinglePage.pdf");
    $singlePagePdfInput = new PdfInput($singlePageResource);
    array_push($pdf->Inputs,$singlePagePdfInput);

    $fw9AcroForm_14Resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $fw9AcroForm_14PdfInput = new PdfInput($fw9AcroForm_14Resource);
    array_push($pdf->Inputs,$fw9AcroForm_14PdfInput);


    //Add Blank Page
    $pageInput1 = new PageInput();

    //Add element into the page
    $element2 = new TextElement("Hello World1",ElementPlacement::TopLeft);
    array_push($pageInput1->Elements,$element2);

    array_push($pdf->Inputs,$pageInput1);

    $resource = new ImageResource($this->inputpath."Northwind Logo.gif");
    $imageInput = new ImageInput($resource);
    array_push($pdf->Inputs,$imageInput);
    $imageInput->Align = Align::Center;
    $imageInput->VAlign = VAlign::Center;
    $imageInput->PageWidth = 400;
    $imageInput->PageHeight = 400;


    //create EvenAddTemplate with pagenumbering label
    $templateC = new Template("TemplateC");
    $pageNumberingElement2 = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::BottomCenter);
    array_push($templateC->Elements,$pageNumberingElement2);

    $imageInput->SetTemplate($templateC);

    $emptyPageResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $emptyPagesPdfInput = new PdfInput($emptyPageResource);
    $emptyPagesPdfInput->SetTemplate($templateA);

    array_push($pdf->Inputs,$emptyPagesPdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples30.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."TemplatePagenumberingSamples30.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>