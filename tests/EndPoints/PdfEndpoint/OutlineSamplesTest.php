﻿<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Outline.php');
require_once(__DIR__.'/../../../src/OutlineStyle.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/ImageInput.php');
require_once(__DIR__.'/../../../src/GoToAction.php');
require_once(__DIR__.'/../../../src/UrlAction.php');
require_once(__DIR__.'/../../../src/PageZoom.php');
require_once(__DIR__.'/../../../src/RgbColor.php');


use PHPUnit\Framework\TestCase;

class OutlineSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PdfInputUsingFilePath_Outline_Pdfoutput()
{
    $Name = "PdfInputFilePathOutline";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."Emptypages.pdf");
    $input = new PdfInput($resource);
    $input->Id = "2";
    array_push($pdf->Inputs,$input);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;
    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineAll_Pdfoutput()
{
    $Name = "PdfInputFilePathOutlineAll";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $invoiceResource = new PdfResource($this->inputpath."Invoice.pdf");
    $invoiceInput = new PdfInput($invoiceResource);
    $invoiceInput->Id = "invoice";
    array_push($pdf->Inputs,$invoiceInput);

    $imageResource = new ImageResource($this->inputpath."CCITT_1.tif");
    $imageInput = new ImageInput($imageResource);
    $imageInput->Id = "picture";
    array_push($pdf->Inputs,$imageInput);

    $mergeOutlineResource = new PdfResource($this->inputpath."MergeOutlineInput.pdf");
    $mergeOutlineInput = new PdfInput($mergeOutlineResource);
    $mergeOutlineInput->Id = "docA100";
    array_push($pdf->Inputs,$mergeOutlineInput);

    $outline = new Outline("Invoice");
    $action = new GoToAction($invoiceInput);
    $outline->Action = $action;

    $outline1 = new Outline("Picture");
    $action1 = new GoToAction($imageInput);
    $outline1->Action = $action1;

    $outline2 = new Outline("Outlines in Doc A 100");
    $outline2A = new Outline($mergeOutlineInput);
    array_push($outline2->Children,$outline2A);

    $outline3 = new Outline("DynamicPDF is Cool!");
    $action3 = new UrlAction("https://www.dynamicpdf.com");
    $outline3->Action = $action3;

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outline1);
    array_push($pdf->Outlines,$outline2);
    array_push($pdf->Outlines,$outline3);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_ChildrenSimplegoto_Pdfoutput()
{
    $Name = "PdfInputFilePathOutlineChildrenGoto";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $emptyPagesresource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $emptyInput = new PdfInput($emptyPagesresource);
    $emptyInput->Id = "document1";
    array_push($pdf->Inputs,$emptyInput);

    $documentA100Resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $documentA100Input = new PdfInput($documentA100Resource);
    $documentA100Input->Id = "document2";
    array_push($pdf->Inputs,$documentA100Input);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $linkTo = new GoToAction($emptyInput);
    $linkTo->PageOffset = 5;
    $linkTo->PageZoom = PageZoom::FitPage;

    $outline->Action = $linkTo;

    $outlineA1 = new Outline("OutlineA1");
    $outlineA1->Color = RgbColor::Red();
    $outlineA1->Style = OutlineStyle::Bold;
    $outlineA1->Expanded = true;

    $linkTo1 = new GoToAction($documentA100Input);
    $linkTo1->PageOffset = 10;
    $linkTo1->PageZoom = PageZoom::FitPage;

    $outlineA1->Action = $linkTo1;
    array_push($outline->Children,$outlineA1);

    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_children_simplegotoOutOfPageIndexLeve1_Exception()
{
    $Name = "PdfInputFilePathOutlineOutOfPageIndex";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $resource2 = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input2 = new PdfInput($resource2);
    $input2->Id = "document1";
    array_push($pdf->Inputs,$input2);

    $resource1 = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input1 = new PdfInput($resource1);
    $input1->Id = "document2";
    array_push($pdf->Inputs,$input1);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $linkTo = new GoToAction($input);
    $linkTo->PageOffset = 5;
    $linkTo->PageZoom = PageZoom::FitPage;

    $outline->Action = $linkTo;

    $outlineA1 = new Outline("OutlineA1");
    $outlineA1->Color = RgbColor::Red();
    $outlineA1->Style = OutlineStyle::Bold;
    $outlineA1->Expanded = true;

    $linkTo1 = new GoToAction($input1);
    $linkTo1->PageOffset = -10;
    $linkTo1->PageZoom = PageZoom::FitPage;

    $outlineA1->Action = $linkTo1;
    array_push($outline->Children,$outlineA1);

    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineFrominputidFromChildren_Pdfoutput()
{
    $Name = "OutlineFrominputidFromChildren";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource2 = new PdfResource($this->inputpath."MergeOutlineInput.pdf");
    $input2 = new PdfInput($resource2);
    $input2->Id = "docA100";
    array_push($pdf->Inputs,$input2);

    $outline2 = new Outline("Outlines in Doc A 100");
    $outline2A = new Outline($input2);
    array_push($outline2->Children,$outline2A);

    array_push($pdf->Outlines,$outline2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineFrominputidFromParent_Pdfoutput()
{
    $Name = "OutlineFrominputidFromParent";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."Invoice.pdf");
    $input = new PdfInput($resource);
    $input->Id = "invoice";
    array_push($pdf->Inputs,$input);

    $resource1 = new ImageResource($this->inputpath."CCITT_1.tif");
    $input1 = new ImageInput($resource1);
    $input1->Id = "picture";
    array_push($pdf->Inputs,$input1);

    $resource2 = new PdfResource($this->inputpath."MergeOutlineInput.pdf");
    $input2 = new PdfInput($resource2);
    $input2->Id = "docA100";
    array_push($pdf->Inputs,$input2);

    $outline = new Outline("Invoice");
    $action = new GoToAction($input);
    $outline->Action = $action;

    $outline1 = new Outline("Picture");
    $action1 = new GoToAction($input1);
    $outline1->Action = $action1;

    $outline2 = new Outline($input2);

    $outline3 = new Outline("DynamicPDF is Cool!");
    $action3 = new UrlAction("https://www.dynamicpdf.com");
    $action3->Url = "https://www.dynamicpdf.com";
    $outline3->Action = $action3;

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outline1);
    array_push($pdf->Outlines,$outline2);
    array_push($pdf->Outlines,$outline3);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outline_GotoAction_Pdfoutput()
{
    $Name = "OutlineGoToAction";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."SinglePage.pdf");
    $input1 = new PdfInput($resource1);
    $input1->Id = "3";
    array_push($pdf->Inputs,$input1);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $linkTo = new GoToAction($input1);
    $linkTo->PageOffset = -5;
    $linkTo->PageZoom = PageZoom::FitPage;

    $outline->Action = $linkTo;

    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outline_KidsBlankPageGotoAction_Pdfoutput()
{
    $Name = "OutlineKidsGoToAction";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    $input->Id = "2";
    array_push($pdf->Inputs,$input);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $outline1 = new Outline("OutlineA1");
    $outline1->Color = RgbColor::Blue();
    $linkTo = new GoToAction($input);
    $linkTo->PageOffset = 3;

    $outline1->Action = $linkTo;

    $outline2 = new Outline("OutlineA2");
    $outline2->Color = RgbColor::Blue();
    $linkTo2 = new GoToAction($input,5);

    $outline2->Action = $linkTo2;

    array_push($outline->Children,$outline1);
    array_push($outline->Children,$outline2);

    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineSameLevel_Pdfoutput()
{
    $Name = "OutlineSameLevel";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."Invoice.pdf");
    $input = new PdfInput($resource);
    $input->Id = "invoice";
    array_push($pdf->Inputs,$input);

    $outline = new Outline("Invoice");
    $action = new GoToAction($input);
    $outline->Action = $action;

    $outline3 = new Outline("DynamicPDF is Cool!");
    $action3 = new UrlAction("https://www.dynamicpdf.com");
    $action3->Url = "https://www.dynamicpdf.com";
    $outline3->Action = $action3;

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outline3);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineSimple_Pdfoutput()
{
    $Name = "OutlineSameLevel";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $outline3 = new Outline("OutlineA");
    $outline3->Expanded = true;
    $outline3->Style = OutlineStyle::BoldItalic;
    $outline3->Color = new RgbColor(1,0,0);
    $action3 = new UrlAction("https://www.dynamicpdf.com");
    $action3->Url = "https://www.dynamicpdf.com";
    $outline3->Action = $action3;

    array_push($pdf->Outlines,$outline3);
    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineSimpleFromInputId_Pdfoutput()
{
    $Name = "OutlineSimpleFromInputId";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."OutlineInput.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $outline3 = new Outline("outlineroot");
    $outline3->Expanded = true;
    $outline3->Style = OutlineStyle::Italic;
    $outline3->Color = new  RgbColor(1,0,0);

    $outline = new Outline($input);

    array_push($pdf->Outlines,$outline3);
    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_OutlineSimpleFromInputId_Children_Pdfoutput()
{
    $Name = "OutlineSimpleFromInputIdChildren";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."OutlineInput.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $outline3 = new Outline("outlineroot");
    $outline3->Expanded = true;
    $outline3->Style = OutlineStyle::Bold;
    $outline3->Color = RgbColor::Red();

    $outline = new Outline($input);

    array_push($outline3->Children,$outline);

    array_push($pdf->Outlines,$outline3);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outlines_simplegoto_Pdfoutput()
{
    $Name = "OutlineSimpleGoTo";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input1 = new PdfInput($resource1);
    $input1->Id = "document2";
    array_push($pdf->Inputs,$input1);

    $outline = new Outline("OutlineA",new GoToAction($input1,-2,PageZoom::FitPage));
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    array_push($pdf->Outlines,$outline);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outlines_simplegoto_mulitiple_inputs_Pdfoutput()
{
    $Name = "OutlineSimpleGoToMultipleInputs";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $resource1 = new PdfResource($this->inputpath."DocumentA100.pdf");
    $input1 = new PdfInput($resource1);
    $input1->Id = "document2";
    array_push($pdf->Inputs,$input1);

    $outline = new Outline("OutlineA");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $linkTo = new GoToAction($input1);
    $linkTo->PageOffset = -2;
    $linkTo->PageZoom = PageZoom::FitPage;

    $outline->Action = $linkTo;

    $outline2 = new Outline("Outline2A");
    $outline2->Color = RgbColor::Blue();
    $outline2->Style = OutlineStyle::Bold;
    $outline2->Expanded = true;

    $linkTo1 = new GoToAction($input1);
    $linkTo1->PageOffset = 1;
    $linkTo1->PageZoom = PageZoom::FitPage;
    $outline2->Action = $linkTo1;
    array_push($outline->Children,$outline2);

    $outlineA1 = new Outline("OutlineA1");
    $outlineA1->Color = RgbColor::Red();
    $outlineA1->Style = OutlineStyle::Bold;
    $outlineA1->Expanded = true;

    $linkTo2 = new GoToAction($input1);
    $linkTo2->PageOffset = 10;
    $linkTo2->PageZoom = PageZoom::FitPage;

    $outlineA1->Action = $linkTo2;

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outlineA1);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outline_urlaction_Pdfoutput()
{
    $Name = "OutlineUrlAction";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $outline3 = new Outline("OutlineA");
    $outline3->Expanded = true;
    $outline3->Style = OutlineStyle::Bold;
    $outline3->Color = RgbColor::Red();

    $linkTo = new UrlAction("https://www.dynamicpdf.com/");
    $linkTo->Url = "https://www.dynamicpdf.com/";

    array_push($pdf->Outlines,$outline3);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Outlines_with_children_one_level_Pdfoutput()
{
    $Name = "OutlineChildOneLevel";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    $input->Id = "document1";
    array_push($pdf->Inputs,$input);

    $outline = new Outline("Outline1");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $outline1A = new Outline("Outline1A");
    $outline1A->Color = RgbColor::Blue();
    $outline1A->Style = OutlineStyle::Bold;
    $outline1A->Expanded = true;
    array_push($outline->Children,$outline1A);

    $outline1 = new Outline("Outline2");
    $outline1->Color = RgbColor::Red();
    $outline1->Style = OutlineStyle::Bold;
    $outline1->Expanded = true;

    $outline2A = new Outline("Outline2A");
    $outline2A->Color = RgbColor::Blue();
    $outline2A->Style = OutlineStyle::Bold;
    $outline2A->Expanded = true;
    array_push($outline1->Children,$outline2A);

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outline1);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_ChildrenFrominputIds_Pdfoutput()
{
    $Name = "OutlineChildFromInputIds";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."EmptyPages.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $resource2 = new PdfResource($this->inputpath."Invoice.pdf");
    $input2 = new PdfInput($resource2);
    $input2->Id = "invoice";
    array_push($pdf->Inputs,$input2);

    $resource1 = new PdfResource($this->inputpath."PdfOutlineInput.pdf");
    $input1 = new PdfInput($resource1);
    $input1->Id = "outlineDoc1";
    array_push($pdf->Inputs,$input1);

    $resource3 = new ImageResource($this->inputpath."CCITT_1.TIF");
    $input3 = new ImageInput($resource3);
    $input3->Id = "cciti";
    array_push($pdf->Inputs,$input3);

    $outline = new Outline("Outline1");
    $outline->Color = RgbColor::Red();
    $outline->Style = OutlineStyle::Bold;
    $outline->Expanded = true;

    $outline1A = new Outline("Outline1A");
    $outline1A->Color = RgbColor::Blue();
    $outline1A->Style = OutlineStyle::Bold;
    $outline1A->Expanded = true;

    $outline1A1 = new Outline("Outline1A1");
    $outline1A1->Color = RgbColor::Green();
    $outline1A1->Style = OutlineStyle::Bold;
    $outline1A1->Expanded = true;

    $outline1A2 = new Outline("Outline1A2");
    $outline1A2->Color = RgbColor::Green();
    $outline1A2->Style = OutlineStyle::Bold;
    $outline1A2->Expanded = true;
    $linkTo = new GoToAction($input3);
    $outline1A2->Action = $linkTo;

    array_push($outline1A->Children,$outline1A1);
    array_push($outline1A->Children,$outline1A2);

    $outline1B = new Outline("Outline1B");
    $outline1B->Color = RgbColor::Red();
    $outline1B->Style = OutlineStyle::Bold;
    $outline1B->Expanded = true;

    $outline2 = new Outline("Outline2");
    $outline2->Color = RgbColor::Red();
    $outline2->Style = OutlineStyle::Bold;
    $outline2->Expanded = true;

    $outline2A = new Outline("Outline2A");
    $outline2A->Color = RgbColor::Blue();
    $outline2A->Style = OutlineStyle::Bold;
    $outline2A->Expanded = true;

    $outline2A1 = new Outline("Outline2A1");
    $outline2A1->Color = RgbColor::Green();
    $outline2A1->Style = OutlineStyle::Bold;
    $outline2A1->Expanded = true;

    $outline2A2 = new Outline("Outline2A2");
    $outline2A2->Color = RgbColor::Green();
    $outline2A2->Style = OutlineStyle::Bold;
    $outline2A2->Expanded = true;

    $outline2B = new Outline($input1);

    array_push($outline->Children,$outline1A);
    array_push($outline->Children,$outline1B);

    array_push($outline2A->Children,$outline2A1);
    array_push($outline2A->Children,$outline2A2);

    array_push($outline2->Children,$outline2A);
    array_push($outline2->Children,$outline2B);

    array_push($pdf->Outlines,$outline);
    array_push($pdf->Outlines,$outline2);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."OutlineSamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."OutlineSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>