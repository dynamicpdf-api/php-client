<?php


require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');


require_once('../../../src/MergeOptions.php');
require_once('../../../src/Template.php');
require_once('../../../src/Elements/TextElement.php');
require_once('../../../src/Elements/ElementPlacement.php');


use PHPUnit\Framework\TestCase;

class PdfInputSamples extends TestCase
 {
    private $inputpath =  "./../../Resources/";
    private $outPutPath =  "./Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function FilePath_PdfOutput()
{
    $Name = "FilePath";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples1.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Bytes_PdfOutput()
{
    $Name = "Bytes";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples2.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Stream_PdfOutput()
{
  /*  $Name = "Stream";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceStream = new MemoryStream($this->inputpath."Emptypages.pdf");
    $pdfResource = new PdfResource($invoiceStream);
    $pdfInput = new PdfInput($pdfResource);
    array_push($pdf->Inputs,$pdfInput);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples3.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function CloudRoot_PdfOutput()
{
    $Name = "CloudRoot";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfInput =  PdfInput::CreatePdfInput("Emptypages.pdf");

    array_push($pdf->Inputs,$pdfInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples4.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolder_PdfOutput()
{
    $Name = "CloudSubFolder";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfInput =  PdfInput::CreatePdfInput("Resources/Emptypages.pdf");

    array_push($pdf->Inputs,$pdfInput);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples5.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPdfInputs_PdfOutput()
{
    $Name = "FilePathInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples6.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesPdfInputs_PdfOutput()
{
    $Name = "BytesInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples7.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamPdfInputs_PdfOutput()
{
   /* $Name = "StreamInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceStream = new MemoryStream($this->inputpath."Invoice.pdf");
    $invoiceResource = new PdfResource($invoiceStream);
    $invoice = new PdfInput($invoiceResource);
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18Stream = new MemoryStream($this->inputpath."fw9AcroForm_18.pdf");
    $fw9AcroForm_18Resource = new PdfResource($fw9AcroForm_18Stream);
    $fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100Stream = new MemoryStream($this->inputpath."DocumentA100.pdf");
    $documentA100Resource = new PdfResource($documentA100Stream);
    $documentA100 = new PdfInput($documentA100Resource);
    array_push($pdf->Inputs,$documentA100);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples8.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function CloudRootPdfInputs_PdfOutput()
{
    $Name = "CloudRootPdfInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice = PdfInput::CreatePdfInput("Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 = PdfInput::CreatePdfInput("fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 = PdfInput::CreatePdfInput("DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples9.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderPdfInputs_PdfOutput()
{
    $Name = "CloudSubFolderPdfInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoice = PdfInput::CreatePdfInput("Resources/Invoice.pdf");
    array_push($pdf->Inputs,$invoice);

    $fw9AcroForm_18 = PdfInput::CreatePdfInput("Resources/fw9AcroForm_18.pdf");
    array_push($pdf->Inputs,$fw9AcroForm_18);

    $documentA100 = PdfInput::CreatePdfInput("Resources/DocumentA100.pdf");
    array_push($pdf->Inputs,$documentA100);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples10.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeMultipleDocuments_PdfOutput()
{
    $Name = "FilePathMergeMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples11.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesMergeMultipleDocuments_PdfOutput()
{
    $Name = "BytesPathMergeMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples12.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamMergeMultipleDocuments_PdfOutput()
{
   /* $Name = "StreamPathMergeMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream($this->inputpath."AllPageElements.pdf");
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $memory1 = new MemoryStream($this->inputpath."All Fields Sample.pdf");
    $resource1 = new PdfResource($memory1);
    $input1 = new PdfInput($resource1);
    array_push($pdf->Inputs,$input1);

    $memory2 = new MemoryStream($this->inputpath."fw9AcroForm_14.pdf");
    $resource2 = new PdfResource($memory2);
    $input2 = new PdfInput($resource2);
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples13.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function CloudRootMergeMultipleDocuments_PdfOutput()
{
    $Name = "CloudRootMergeMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = PdfInput::CreatePdfInput("AllPageElements.pdf");
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $input1 = PdfInput::CreatePdfInput("All Fields Sample.pdf");
    array_push($pdf->Inputs,$input1);

    $input2 = PdfInput::CreatePdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples14.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderMergeMultipleDocuments_PdfOutput()
{
    $Name = "CloudSubFolderMergeMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = PdfInput::CreatePdfInput("Resources/AllPageElements.pdf");
    $input->StartPage = 1;
    $input->PageCount = 6;
    array_push($pdf->Inputs,$input);

    $input1 = PdfInput::CreatePdfInput("Resources/All Fields Sample.pdf");
    array_push($pdf->Inputs,$input1);

    $input2 = PdfInput::CreatePdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples15.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathSimpleMerge_PdfOutput()
{
    $Name = "FilePathSimpleMerge";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples16.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeStartPageAndPageCount_PdfOutput()
{
    $Name = "FilePathSimpleMergePpty";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples17.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeWithSameInput_PdfOutput()
{
    $Name = "FilePathMergeWithSameInput";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples18.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptions_PdfOutput()
{
    $Name = "FilePathMergeOptions";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples19.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithMultipleDocuments_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithMultipleDocuments";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples20.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples20.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentInfo_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentInfo";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples21.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples21.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentJavaScript_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentJavaScript";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples22.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples22.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsDocumentProperties_PdfOutput()
{
    $Name = "FilePathMergeOptionsDocumentProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples23.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsEmbeddedFiles_PdfOutput()
{
    $Name = "FilePathMergeOptionsEmbeddedFiles";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples24.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples24.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsFormFields_PdfOutput()
{
    $Name = "FilePathMergeOptionsFormFields";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples25.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples25.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsFormsXfaData_PdfOutput()
{
    $Name = "FilePathMergeOptionsFormsXfaData";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples26.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples26.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsLogicalStructure_PdfOutput()
{
    $Name = "FilePathMergeOptionsLogicalStructure";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples27.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples27.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOpenAction_PdfOutput()
{
    $Name = "FilePathMergeOptionsOpenAction";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples28.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples28.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOptionalContentInfo_PdfOutput()
{
    $Name = "FilePathMergeOptionsOptionalContentInfo";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples29.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples29.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOutlines_PdfOutput()
{
    $Name = "FilePathMergeOptionsOutlines";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples30.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples30.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsOutputIntent_PdfOutput()
{
    $Name = "FilePathMergeOptionsOutputIntent";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples31.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples31.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsPageAnnotations_PdfOutput()
{
    $Name = "FilePathMergeOptionsPageAnnotations";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples32.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples32.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsPageLabelsAndSections_PdfOutput()
{
    $Name = "FilePathMergeOptionsPageLabelsAndSections";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples33.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples33.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsRootFormField_PdfOutput()
{
    $Name = "FilePathMergeOptionsRootFormField";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples34.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples34.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsXmpMetadata_PdfOutput()
{
    $Name = "FilePathMergeOptionsXmpMetadata";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples35.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples35.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsAllTrue_PdfOutput()
{
    $Name = "FilePathMergeOptionsAllTrue";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples36.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples36.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsAllFalse_PdfOutput()
{
    $Name = "FilePathMergeOptionsAllFalse";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples37.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples37.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateAllPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateAllPages";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples38.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples38.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateEvenPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateEvenPages";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples39.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples39.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplateOddPages_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplateOddPages";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples40.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples40.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMergeOptionsWithTemplates_PdfOutput()
{
    $Name = "FilePathMergeOptionsWithTemplates";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

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
    file_put_contents($this->outPutPath."PdfInputSamples41.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples41.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_AddPdf_PdfOutput()
{
    $Name = "FilePath_AddPdf";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = $pdf->AddPdf($pdfResource);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples42.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples42.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePath_AddPdfParameters_PdfOutput()
{
    $Name = "FilePath_AddPdfParameters";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $mergeOptions = new MergeOptions();

    $pdfResource = new PdfResource($this->inputpath."Emptypages.pdf");
    $pdfInput = $pdf->AddPdf($pdfResource,$mergeOptions);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples43.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples43.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function Cloud_AddPdf_PdfOutput()
{
    $Name = "Cloud_AddPdf";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $pdfInput = $pdf->AddPdfCloud("DocumentA100.pdf");

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."PdfInputSamples44.pdf",$response->PdfContent);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."PdfInputSamples44.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>