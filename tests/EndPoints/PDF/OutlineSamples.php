<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Outline.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/ImageInput.php');
require_once('../../../src/MergeOptions.php');
require_once('../../../src/GoToAction.php');
require_once('../../../src/UrlAction.php');

use PHPUnit\Framework\TestCase;



 class OutlineSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function PdfInputUsingFilePath_Outline_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."Emptypages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "2";
		array_push($pdf->Instructions->Inputs,$input);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineAll_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "PdfInputFilePathOutlineAll";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."Invoice.pdf");
		$input = new PdfInput($resource);
		$input->Id = "invoice";
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new ImageResource(OutlineSamples::$resoursePath."CCITT_1.tif");
		$input1 = new ImageInput($resource1);
		$input1->Id = "picture";
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(OutlineSamples::$resoursePath."MergeOutlineInput.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Id = "docA100";
		array_push($pdf->Instructions->Inputs,$input2);
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = false;
		$input2->MergeOptions = $mergeOptions;
		$outline = new Outline("Invoice");
		$action = new GoToAction("invoice");
		$action->InputID = "invoice";
		$outline->Action = $action;
		$outline1 = new Outline("Picture");
		$action1 = new GoToAction("picture");
		$action1->InputID = "picture";
		$outline1->Action = $action1;
		$outline2 = new Outline("Outlines in Doc A 100");
		$outline2A = new Outline("docA100");
		$outline2A->FromInputID = "docA100";
		array_push($outline2->Children,$outline2A);
		$outline3 = new Outline("DynamicPDF is Cool!");
		$action3 = new UrlAction("https://www.dynamicpdf.com");
		$outline3->Action = $action3;
		array_push($pdf->Instructions->Outlines,$outline);
		array_push($pdf->Instructions->Outlines,$outline1);
		array_push($pdf->Instructions->Outlines,$outline2);
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_ChildrenSimplegoto_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "PdfInputFilePathOutlineChildrenGoto";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(OutlineSamples::$resoursePath."DocumentA100.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Id = "document2";
		array_push($pdf->Instructions->Inputs,$input1);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$linkTo = new GoToAction("document1");
		$linkTo->InputID = "document1";
		$linkTo->PageOffset = 5;
		$linkTo->PageZoom = PageZoom::FitPage;
		$outline->Action = $linkTo;
		$OutlineA1 = new Outline("OutlineA1");
		$OutlineA1->Color = "Red";
		$OutlineA1->Style = OutlineStyle::Bold;
		$OutlineA1->Expanded = true;
		$linkTo1 = new GoToAction("document2");
		$linkTo1->InputID = "document2";
		$linkTo1->PageOffset = 10;
		$linkTo1->PageZoom = PageZoom::FitPage;
		$OutlineA1->Action = $linkTo1;
		array_push($outline->Children,$OutlineA1);
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	/** @test */
	public function PdfInputUsingFilePath_ChildrenSimpleGotoOutOfPageIndex_Exception()
	{
/*

		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
*/
	}

	/** @test */
	public function PdfInputUsingFilePath_children_simplegotoOutOfPageIndexLeve1_Exception()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "PdfInputFilePathOutlineOutOfPageIndex";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input);
		$resource2 = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input2);
		$resource1 = new PdfResource(OutlineSamples::$resoursePath."DocumentA100.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Id = "document2";
		array_push($pdf->Instructions->Inputs,$input1);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$linkTo = new GoToAction("document1");
		$linkTo->PageOffset = 5;
		$linkTo->PageZoom = PageZoom::FitPage;
		$outline->Action = $linkTo;
		$OutlineA1 = new Outline("OutlineA1");
		$OutlineA1->Color = "Red";
		$OutlineA1->Style = OutlineStyle::Bold;
		$OutlineA1->Expanded = true;
		$linkTo1 = new GoToAction("document2");
		$linkTo1->PageOffset = -10;
		$linkTo1->PageZoom = PageZoom::FitPage;
		$OutlineA1->Action = $linkTo1;
		array_push($outline->Children,$OutlineA1);
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineFrominputidFromChildren_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineFrominputidFromChildren";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource2 = new PdfResource(OutlineSamples::$resoursePath."MergeOutlineInput.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Id = "docA100";
		array_push($pdf->Instructions->Inputs,$input2);
		$outline2 = new Outline("Outlines in Doc A 100");
		$outline2A = new Outline("docA100");
		$outline2A->FromInputID = "docA100";
		array_push($outline2->Children,$outline2A);
		array_push($pdf->Instructions->Outlines,$outline2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineFrominputidFromParent_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineFrominputidFromParent";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."Invoice.pdf");
		$input = new PdfInput($resource);
		$input->Id = "invoice";
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new ImageResource(OutlineSamples::$resoursePath."CCITT_1.tif");
		$input1 = new ImageInput($resource1);
		$input1->Id = "picture";
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(OutlineSamples::$resoursePath."MergeOutlineInput.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Id = "docA100";
		array_push($pdf->Instructions->Inputs,$input2);
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = false;
		$input2->MergeOptions = $mergeOptions;
		$outline = new Outline("Invoice");
		$action = new GoToAction("invoice");
		$outline->Action = $action;
		$outline1 = new Outline("Picture");
		$action1 = new GoToAction("picture");
		$outline1->Action = $action1;
		$outline2 = new Outline();
		$outline2->FromInputID = "docA100";
		$outline3 = new Outline("DynamicPDF is Cool!");
		$action3 = new UrlAction("https://www.dynamicpdf.com");
		$action3->Url = "https://www.dynamicpdf.com";
		$outline3->Action = $action3;
		array_push($pdf->Instructions->Outlines,$outline);
		array_push($pdf->Instructions->Outlines,$outline1);
		array_push($pdf->Instructions->Outlines,$outline2);
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Outline_GotoAction_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineGoToAction";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(OutlineSamples::$resoursePath."SinglePage.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Id = "3";
		array_push($pdf->Instructions->Inputs,$input1);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$linkTo = new GoToAction("3");
		$linkTo->PageOffset = -5;
		$linkTo->PageZoom = PageZoom::FitPage;
		$outline->Action = $linkTo;
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Outline_KidsBlankPageGotoAction_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineKidsGoToAction";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "2";
		array_push($pdf->Instructions->Inputs,$input);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$outline1 = new Outline("OutlineA1");
		$outline1->Color = "Blue";
		$linkTo = new GoToAction("2");
		$linkTo->PageOffset = 3;
		$outline1->Action = $linkTo;
		$outline2 = new Outline("OutlineA2");
		$outline2->Color = "Blue";
		$linkTo2 = new GoToAction("2");
		$linkTo2->InputID = "2";
		$linkTo2->PageOffset = 5;
		$outline2->Action = $linkTo2;
		array_push($outline->Children,$outline1);
		array_push($outline->Children,$outline2);
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineSameLevel_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSameLevel";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."Invoice.pdf");
		$input = new PdfInput($resource);
		$input->Id = "invoice";
		array_push($pdf->Instructions->Inputs,$input);
		$outline = new Outline("Invoice");
		$action = new GoToAction("invoice");
		$outline->Action = $action;
		$outline3 = new Outline("DynamicPDF is Cool!");
		$action3 = new UrlAction("https://www.dynamicpdf.com");
		$action3->Url = "https://www.dynamicpdf.com";
		$outline3->Action = $action3;
		array_push($pdf->Instructions->Outlines,$outline);
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples10.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineSimple_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSameLevel";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input);
		$outline3 = new Outline("OutlineA");
		$outline3->Expanded = true;
		$outline3->Style = OutlineStyle::BoldItalic;
		$outline3->Color = "rgb(255, 0, 0)";
		$action3 = new UrlAction("https://www.dynamicpdf.com");
		$action3->Url = "https://www.dynamicpdf.com";
		$outline3->Action = $action3;
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples11.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineSimpleFromInputId_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSimpleFromInputId";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."OutlineInput.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$outline3 = new Outline("outlineroot");
		$outline3->Expanded = true;
		$outline3->Style = OutlineStyle::Italic;
		$outline3->Color = "rgb(1, 0, 0)";
		$outline = new Outline();
		$outline->FromInputID = "document1";
		array_push($pdf->Instructions->Outlines,$outline3);
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples12.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlineSimpleFromInputId_Children_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSimpleFromInputIdChildren";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."OutlineInput.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$outline3 = new Outline("outlineroot");
		$outline3->Expanded = true;
		$outline3->Style = OutlineStyle::Bold;
		$outline3->Color = "red";
		$outline = new Outline();
		$outline->FromInputID = "document1";
		array_push($outline3->Children,$outline);
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples13.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Outlines_simplegoto_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSimpleGoTo";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(OutlineSamples::$resoursePath."DocumentA100.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Id = "document2";
		array_push($pdf->Instructions->Inputs,$input1);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$linkTo = new GoToAction("document2");
		$linkTo->InputID = "document2";
		$linkTo->PageOffset = -2;
		$linkTo->PageZoom = PageZoom::FitPage;
		$outline->Action = $linkTo;
		array_push($pdf->Instructions->Outlines,$outline);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples14.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Outlines_simplegoto_mulitiple_inputs_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineSimpleGoToMultipleInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(OutlineSamples::$resoursePath."DocumentA100.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Id = "document2";
		array_push($pdf->Instructions->Inputs,$input1);
		$outline = new Outline("OutlineA");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$linkTo = new GoToAction("document2");
		$linkTo->InputID = "document2";
		$linkTo->PageOffset = -2;
		$linkTo->PageZoom = PageZoom::FitPage;
		$outline->Action = $linkTo;
		$outline2 = new Outline("Outline2A");
		$outline2->Color = "blue";
		$outline2->Style = OutlineStyle::Bold;
		$outline2->Expanded = true;
		$linkTo1 = new GoToAction("document3");
		$linkTo1->InputID = "document3";
		$linkTo1->PageOffset = 1;
		$linkTo1->PageZoom = PageZoom::FitPage;
		$outline2->Action = $linkTo1;
		array_push($outline->Children,$outline2);
		$OutlineA1 = new Outline("OutlineA1");
		$OutlineA1->Color = "Red";
		$OutlineA1->Style = OutlineStyle::Bold;
		$OutlineA1->Expanded = true;
		$linkTo2 = new GoToAction("document2");
		$linkTo2->InputID = "document2";
		$linkTo2->PageOffset = 10;
		$linkTo2->PageZoom = PageZoom::FitPage;
		$OutlineA1->Action = $linkTo2;
		array_push($pdf->Instructions->Outlines,$outline);
		array_push($pdf->Instructions->Outlines,$OutlineA1);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples15.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	
	}

	/** @test */
	public function PdfInputUsingFilePath_Outlines_simplegoto_outsidepageindex_Exception()
	{

/*
		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;


		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples16.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function PdfInputUsingFilePath_Outline_urlaction_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineUrlAction";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$outline3 = new Outline("OutlineA");
		$outline3->Expanded = true;
		$outline3->Style = OutlineStyle::Bold;
		$outline3->Color = "red";
		$linkTo = new UrlAction("https://www.dynamicpdf.com/");
		$linkTo->Url = "https://www.dynamicpdf.com/";
		array_push($pdf->Instructions->Outlines,$outline3);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples17.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	/** @test */
	public function PdfInputUsingFilePath_OutlinesWithChildNegative_Exception()
	{

/*
		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;


		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples18.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function PdfInputUsingFilePath_Outlines_with_children_one_level_Pdfoutput()
	{


		Pdf::$DefaultApiKey = OutlineSamples::$key;
		Pdf::$DefaultBaseUrl = OutlineSamples::$url;
		//$Name = "OutlineChildOneLevel";
		$pdf = new Pdf();
		$pdf->Instructions->Author = OutlineSamples::$Author;
		$pdf->Instructions->Title = OutlineSamples::$Title;
		$resource = new PdfResource(OutlineSamples::$resoursePath."EmptyPages.pdf");
		$input = new PdfInput($resource);
		$input->Id = "document1";
		array_push($pdf->Instructions->Inputs,$input);
		$outline = new Outline("Outline1");
		$outline->Color = "Red";
		$outline->Style = OutlineStyle::Bold;
		$outline->Expanded = true;
		$outline1A = new Outline("Outline1A");
		$outline1A->Color = "blue";
		$outline1A->Style = OutlineStyle::Bold;
		$outline1A->Expanded = true;
		array_push($outline->Children,$outline1A);
		$outline1 = new Outline("Outline2");
		$outline1->Color = "Red";
		$outline1->Style = OutlineStyle::Bold;
		$outline1->Expanded = true;
		$outline2A = new Outline("Outline2A");
		$outline2A->Color = "blue";
		$outline2A->Style = OutlineStyle::Bold;
		$outline2A->Expanded = true;
		array_push($outline1->Children,$outline2A);
		array_push($pdf->Instructions->Outlines,$outline);
		array_push($pdf->Instructions->Outlines,$outline1);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples19.pdf",$response->PdfContent);
		}
	
		if(isset($pdf->jsonData))
		file_put_contents(OutlineSamples::$outPutPath."OutlineSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>