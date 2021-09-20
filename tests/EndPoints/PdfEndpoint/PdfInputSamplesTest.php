<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');


require_once(__DIR__.'/../../../src/MergeOptions.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../KeyAndUrl.php'); 

use PHPUnit\Framework\TestCase;

class PdfInputSamplesTest extends TestCase
 {
    private $inputpath = KeyAndUrl::Inputpath;
    private $outPutPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;


/** @test */
public function FilePath_PdfOutput()
{
    $Name = "FilePath";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Bytes_PdfOutput()
{
    $Name = "Bytes";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples2.json",$pdf->jsonData);

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

    $file = fopen($this->inputpath. "Emptypages.pdf", "r");
    $pdfResource = new PdfResource($file);
    fclose($file);

    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples3.json",$pdf->jsonData);

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

    $pdfInput = new PdfInput("Emptypages.pdf");

    array_push($pdf->Inputs,$pdfInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples4.json",$pdf->jsonData);

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

    $pdfInput = new PdfInput("Resources/Emptypages.pdf");

    array_push($pdf->Inputs,$pdfInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPdfInputs_PdfOutput()
{
    $Name = "FilePathInputs";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesPdfInputs_PdfOutput()
{
    $Name = "BytesInputs";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamPdfInputs_PdfOutput()
{
    $Name = "StreamInputs";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootPdfInputs_PdfOutput()
{
    $Name = "CloudRootPdfInputs";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderPdfInputs_PdfOutput()
{
    $Name = "CloudSubFolderPdfInputs";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice =new PdfInput("Resources/Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 =new PdfInput("Resources/fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 =new PdfInput("Resources/DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeMultipleDocuments_PdfOutput()
{
    $Name = "FilePathMergeMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesMergeMultipleDocuments_PdfOutput()
{
    $Name = "BytesPathMergeMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamMergeMultipleDocuments_PdfOutput()
{
    $Name = "StreamPathMergeMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "AllPageElements.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($resource);
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $file1 = fopen($this->inputpath. "All Fields Sample.pdf", "r");
    $resource1 = new PdfResource($file1);
    fclose($file1);
    $input1 = new PdfInput($resource1);
    array_push($pdf->Inputs,$input1);

    $file2 = fopen($this->inputpath. "fw9AcroForm_14.pdf", "r");
    $resource2 = new PdfResource($file2);
    fclose($file2);

    $input2 = new PdfInput($resource2);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootMergeMultipleDocuments_PdfOutput()
{
    $Name = "CloudRootMergeMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("AllPageElements.pdf");
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $input1 =new PdfInput("All Fields Sample.pdf");
    array_push($pdf->Inputs,$input1);

    $input2 =new PdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderMergeMultipleDocuments_PdfOutput()
{
    $Name = "CloudSubFolderMergeMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new PdfInput("Resources/AllPageElements.pdf");
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $input1 =new PdfInput("Resources/All Fields Sample.pdf");
    array_push($pdf->Inputs,$input1);

    $input2 =new PdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathSimpleMerge_PdfOutput()
{
    $Name = "FilePathSimpleMerge";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeStartPageAndPageCount_PdfOutput()
{
    $Name = "FilePathSimpleMergePpty";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    $input->StartPage = 2;
    $input->PageCount = 10;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeWithSameInput_PdfOutput()
{
    $Name = "FilePathMergeWithSameInput";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input1 = new PdfInput($resource1);
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input2 = new PdfInput($resource2);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples18.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptions_PdfOutput()
{
    $Name = "FilePathMergeOptions";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples19.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithMultipleDocuments_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithMultipleDocuments";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    $input1->StartPage = 1;
    $input1->PageCount = 1;

    $mergeOptions1 = new MergeOptions();
    $mergeOptions1->FormsXfaData = true;
    $input1->MergeOptions = $mergeOptions1;
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);

    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples20.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples20.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentInfo_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentInfo";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->DocumentInfo = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples21.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples21.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentJavaScript_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentJavaScript";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."JavaScriptSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->DocumentJavaScript = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples22.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples22.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentProperties_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentProperties";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentPropertiesSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->DocumentProperties = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples23.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsEmbeddedFiles_PdfOutput()
{
    $Name = "FilePathMergeOptionsEmbeddedFiles";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmbedFilesSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->EmbeddedFiles = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples24.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples24.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsFormFields_PdfOutput()
{
    $Name = "FilePathMergeOptionsFormFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->FormFields = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples25.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples25.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsFormsXfaData_PdfOutput()
{
    $Name = "FilePathMergeOptionsFormsXfaData";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->FormsXfaData = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples26.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples26.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsLogicalStructure_PdfOutput()
{
    $Name = "FilePathMergeOptionsLogicalStructure";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->LogicalStructure = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples27.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples27.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOpenAction_PdfOutput()
{
    $Name = "FilePathMergeOptionsOpenAction";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."OpenActionSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->OpenAction = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples28.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples28.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOptionalContentInfo_PdfOutput()
{
    $Name = "FilePathMergeOptionsOptionalContentInfo";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."OptionalContentInfoSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->OptionalContentInfo = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples29.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples29.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOutlines_PdfOutput()
{
    $Name = "FilePathMergeOptionsOutlines";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->Outlines = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples30.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples30.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOutputIntent_PdfOutput()
{
    $Name = "FilePathMergeOptionsOutputIntent";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."OutputIntentSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->OutputIntent = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples31.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples31.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsPageAnnotations_PdfOutput()
{
    $Name = "FilePathMergeOptionsPageAnnotations";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."NoteAnnotSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->PageAnnotations = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples32.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples32.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsPageLabelsAndSections_PdfOutput()
{
    $Name = "FilePathMergeOptionsPageLabelsAndSections";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."PageSectionSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->PageLabelsAndSections = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples33.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples33.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsRootFormField_PdfOutput()
{
    $Name = "FilePathMergeOptionsRootFormField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->RootFormField = "RootName";
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples34.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples34.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsXmpMetadata_PdfOutput()
{
    $Name = "FilePathMergeOptionsXmpMetadata";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->XmpMetadata = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples35.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples35.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsAllTrue_PdfOutput()
{
    $Name = "FilePathMergeOptionsAllTrue";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->DocumentInfo = true;
    $mergeOptions->DocumentJavaScript = true;
    $mergeOptions->DocumentProperties = true;
    $mergeOptions->EmbeddedFiles = true;
    $mergeOptions->FormFields = true;
    $mergeOptions->FormsXfaData = true;
    $mergeOptions->LogicalStructure = true;
    $mergeOptions->OpenAction = true;
    $mergeOptions->OptionalContentInfo = true;
    $mergeOptions->Outlines = true;
    $mergeOptions->OutputIntent = true;
    $mergeOptions->PageAnnotations = true;
    $mergeOptions->PageLabelsAndSections = true;
    $mergeOptions->XmpMetadata = true;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples36.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples36.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsAllFalse_PdfOutput()
{
    $Name = "FilePathMergeOptionsAllFalse";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);

    $mergeOptions = new MergeOptions();
    $mergeOptions->DocumentInfo = false;
    $mergeOptions->DocumentJavaScript = false;
    $mergeOptions->DocumentProperties = false;
    $mergeOptions->EmbeddedFiles = false;
    $mergeOptions->FormFields = false;
    $mergeOptions->FormsXfaData = false;
    $mergeOptions->LogicalStructure = false;
    $mergeOptions->OpenAction = false;
    $mergeOptions->OptionalContentInfo = false;
    $mergeOptions->Outlines = false;
    $mergeOptions->OutputIntent = false;
    $mergeOptions->PageAnnotations = false;
    $mergeOptions->PageLabelsAndSections = false;
    $mergeOptions->XmpMetadata = false;
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples37.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples37.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateAllPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateAllPages";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $template = new Template("Temp1");
    $element = new TextElement("Merger with Template(All Pages)",ElementPlacement::TopCenter);
    array_push($template->Elements,$element);

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->SetTemplate($template);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    $input1->SetTemplate($template);
    $input1->StartPage = 1;
    $input1->PageCount = 1;
    $mergeOptions1 = new MergeOptions();
    $mergeOptions1->FormsXfaData = true;
    $input1->MergeOptions = $mergeOptions1;
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    $input2->SetTemplate($template);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples38.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples38.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateEvenPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateEvenPages";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $template = new Template("Temp1");
    $element = new TextElement("Merger with Template(Even Pages)",ElementPlacement::TopCenter);
    $element->EvenPages = true;
    array_push($template->Elements,$element);

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->SetTemplate($template);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    $input1->SetTemplate($template);

    $input1->StartPage = 1;
    $input1->PageCount = 1;
    $mergeOptions1 = new MergeOptions();
    $mergeOptions1->FormsXfaData = true;
    $input1->MergeOptions = $mergeOptions1;
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    $input2->SetTemplate($template);

    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples39.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples39.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateOddPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateOddPages";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $template = new Template("Temp1");
    $element = new TextElement("Merger with Template(Odd Pages)",ElementPlacement::TopCenter);
    $element->OddPages = true;
    array_push($template->Elements,$element);

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->SetTemplate($template);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    $input1->SetTemplate($template);

    $input1->StartPage = 1;
    $input1->PageCount = 1;
    $mergeOptions1 = new MergeOptions();
    $mergeOptions1->FormsXfaData = true;
    $input1->MergeOptions = $mergeOptions1;
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    $input2->SetTemplate($template);

    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples40.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples40.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplates_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplates";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $template1 = new Template("Temp1");
    $element1 = new TextElement("Merger with Template(First Dcoument)",ElementPlacement::TopCenter);
    array_push($template1->Elements,$element1);

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    $input->SetTemplate($template1);

    $mergeOptions = new MergeOptions();
    $input->MergeOptions = $mergeOptions;
    array_push($pdf->Inputs,$input);

    $template2 = new Template("Temp2");
    $element2 = new TextElement("Merger with Template(Second Dcoument)",ElementPlacement::TopCenter);
    array_push($template2->Elements,$element2);

    $resource1 = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input1 = new PdfInput($resource1);
    $input1->SetTemplate($template2);

    $input1->StartPage = 1;
    $input1->PageCount = 1;
    $mergeOptions1 = new MergeOptions();
    $mergeOptions1->FormsXfaData = true;
    $input1->MergeOptions = $mergeOptions1;
    array_push($pdf->Inputs,$input1);

    $template3 = new Template("Temp3");
    $element3 = new TextElement("Merger with Template(Third Dcoument)",ElementPlacement::TopCenter);
    array_push($template3->Elements,$element3);

    $resource2 = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input2 = new PdfInput($resource2);
    $input2->SetTemplate($template3);

    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples41.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples41.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_AddPdf_PdfOutput()
{
    $Name = "FilePath_AddPdf";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = $pdf->AddPdf($pdfResource);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples42.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples42.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_AddPdfParameters_PdfOutput()
{
    $Name = "FilePath_AddPdfParameters";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $mergeOptions = new MergeOptions();

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = $pdf->AddPdf($pdfResource,$mergeOptions);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples43.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples43.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Cloud_AddPdf_PdfOutput()
{
    $Name = "Cloud_AddPdf";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfInput = $pdf->AddPdf("DocumentA100.pdf");

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples44.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples44.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>