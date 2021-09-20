<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/FormField.php');




use PHPUnit\Framework\TestCase;

class FormFlattenAndRemoveSamplesTest extends TestCase
 {
    private $inputpath = KeyAndUrl::Inputpath;
    private $outputPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;


/** @test */
public function PdfInputFilePath_Field_Pdfoutput()
{
    $Name = "FilePathField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    $field->Flatten = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    $field1->Flatten = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    $field2->Flatten = true;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field3->Flatten = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field4->Flatten = false;
    array_push($pdf->FormFields,$field4);

    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    $field5->Flatten = true;
    array_push($pdf->FormFields,$field5);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputStream_FormFlattenField_Pdfoutput()
{
    $Name = "StreamField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "fw9AcroForm_14.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    $field->Flatten = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    $field1->Flatten = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    $field2->Flatten = true;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field3->Flatten = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field4->Flatten = false;
    array_push($pdf->FormFields,$field4);

    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    $field5->Flatten = true;
    array_push($pdf->FormFields,$field5);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputBytes_FormFlattenField_Pdfoutput()
{
    $Name = "BytesField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    $field->Flatten = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    $field1->Flatten = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    $field2->Flatten = true;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field3->Flatten = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field4->Flatten = false;
    array_push($pdf->FormFields,$field4);

    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    $field5->Flatten = true;
    array_push($pdf->FormFields,$field5);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputCloudRoot_FormFlattenField_Pdfoutput()
{
    $Name = "CloudRootField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    $field->Flatten = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    $field1->Flatten = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    $field2->Flatten = true;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field3->Flatten = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field4->Flatten = false;
    array_push($pdf->FormFields,$field4);

    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    $field5->Flatten = true;
    array_push($pdf->FormFields,$field5);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputCloudSubFolder_FormFlattenField_Pdfoutput()
{
    $Name = "CloudSubFolderField";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    $field->Flatten = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    $field1->Flatten = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    $field2->Flatten = true;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field3->Flatten = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field4->Flatten = false;
    array_push($pdf->FormFields,$field4);

    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    $field5->Flatten = true;
    array_push($pdf->FormFields,$field5);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_FormFlattenFieldRemove_Pdfoutput()
{
    $Name = "FilePathFieldRemove";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
    $field->Remove = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
    $field1->Remove = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field2->Remove = false;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field3->Remove = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
    $field4->Remove = true;
    array_push($pdf->FormFields,$field4);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputStream_FormFlattenFieldRemove_Pdfoutput()
{
    $Name = "StreamFieldRemove";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "fw9AcroForm_14.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
    $field->Remove = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
    $field1->Remove = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field2->Remove = false;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field3->Remove = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
    $field4->Remove = true;
    array_push($pdf->FormFields,$field4);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputBytes_FormFlattenFieldRemove_Pdfoutput()
{
    $Name = "BytesFieldRemove";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;


    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
    $field->Remove = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
    $field1->Remove = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field2->Remove = false;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field3->Remove = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
    $field4->Remove = true;
    array_push($pdf->FormFields,$field4);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudRoot_FormFlattenFieldRemove_Pdfoutput()
{
    $Name = "CloudRootFieldRemove";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
    $field->Remove = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
    $field1->Remove = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field2->Remove = false;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field3->Remove = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
    $field4->Remove = true;
    array_push($pdf->FormFields,$field4);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudSubFolder_FormFlattenFieldRemove_Pdfoutput()
{
    $Name = "CloudSubFolderFieldRemove";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
    $field->Remove = true;
    array_push($pdf->FormFields,$field);

    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
    $field1->Remove = true;
    array_push($pdf->FormFields,$field1);

    $field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    $field2->Remove = false;
    array_push($pdf->FormFields,$field2);

    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    $field3->Remove = false;
    array_push($pdf->FormFields,$field3);

    $field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
    $field4->Remove = true;
    array_push($pdf->FormFields,$field4);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_FormFlattenAllFields_Pdfoutput()
{
    $Name = "FilePathAllFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $pdf->FlattenAllFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingStream_FormFlattenAllFields_Pdfoutput()
{
    $Name = "StreamAllFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "fw9AcroForm_14.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $pdf->FlattenAllFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingBytes_FormFlattenAllFields_Pdfoutput()
{
    $Name = "BytesAllFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $pdf->FlattenAllFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudRoot_AllFields_Pdfoutput()
{
    $Name = "CloudRootAllFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $pdf->FlattenAllFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudSubFolder_AllFields_Pdfoutput()
{
    $Name = "CloudSubFolderAllFields";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $pdf->FlattenAllFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RetainSignature_Pdfoutput()
{
    $Name = "FilePathRetainSignature";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."Org.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);
    $pdf->FlattenAllFormFields = true;
    $pdf->RetainSignatureFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingStream_RetainSignature_Pdfoutput()
{
    $Name = "StreamRetainSignature";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "Org.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);
    
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $pdf->FlattenAllFormFields = true;
    $pdf->RetainSignatureFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingBytes_RetainSignature_Pdfoutput()
{
    $Name = "BytesRetainSignature";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."Org.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $pdf->FlattenAllFormFields = true;
    $pdf->RetainSignatureFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples18.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudRoot_RetainSignature_Pdfoutput()
{
    $Name = "CloudRootRetainSignature";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Org.pdf");
    array_push($pdf->Inputs,$input);

    $pdf->FlattenAllFormFields = true;
    $pdf->RetainSignatureFormFields = true;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples19.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFlattenAndRemoveSamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>