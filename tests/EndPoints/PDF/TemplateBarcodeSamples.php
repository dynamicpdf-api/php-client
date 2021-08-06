<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/AztecBarcodeElement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/DataMatrixBarcodeElement.php');
require_once('../../../src/DataMatrixSymbolSize.php');
require_once('../../../src/DataMatrixEncodingType.php');
require_once('../../../src/DataMatrixFunctionCharacter.php');
require_once('../../../src/Pdf417BarcodeElement.php');
require_once('../../../src/QrCodeElement.php');
require_once('../../../src/Code128BarcodeElement.php');
require_once('../../../src/Code39BarcodeElement.php');
require_once('../../../src/Code25BarcodeElement.php');
require_once('../../../src/Code93BarcodeElement.php');
require_once('../../../src/Code11BarcodeElement.php');
require_once('../../../src/Gs1DataBarBarcodeElement.php');
require_once('../../../src/Gs1DataBarType.php');
require_once('../../../src/StackedGs1DataBarBarcodeElement.php');
require_once('../../../src/StackedGs1DataBarType.php');
require_once('../../../src/Iata25BarcodeElement.php');
require_once('../../../src/Font.php');
require_once('../../../src/MsiBarcodeElement.php');
require_once('../../../src/ValueType.php');
require_once('../../../src/QrCodeFnc1.php');
require_once('../../../src/MsiBarcodeCheckDigitMode.php');

use PHPUnit\Framework\TestCase;

 class TemplateBarcodeSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";
	
	/** @test */
	public function FilePathInputAztecBarcode_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathInputAztecBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::TopLeft,0);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathInputAztecBarcodeSize_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathInputAztecBarcodeSize";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",0,0);
		$element->Placement = ElementPlacement::TopLeft;
		$element->AztecSymbolSize = AztecSymbolSize::Full;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementError_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementError";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::TopRight);
		$element->AztecSymbolSize = AztecSymbolSize::Compact;
		$element->ErrorCorrection = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementTilde_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementTild";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R109xC109;
		$element->ProcessTilde = true;
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementReader_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementReader";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::TopCenter,50,50);
		$element->AztecSymbolSize = AztecSymbolSize::R109xC109;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePath_AztecBarcodeElementXDimension_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePath_AztecBarcodeElementXDimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::TopCenter);
		$element->AztecSymbolSize = AztecSymbolSize::R109xC109;
		$element->ProcessTilde = true;
		$element->XDimension = 3;
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementColor_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Blue";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesAztecBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesAztecBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamAztecBarcodeElementProperties_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamAztecBarcodeElementProperties_Pdfoutput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples10.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootAztecBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootAztecBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples11.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputAztecBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputAztecBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples12.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputAztecBarcodeElementPropertiesAddedToPage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputAztecBarcodeElementPropertiesAddedToPage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples13.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputAztecBarcodeAddedToPageAndPdf_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputAztecBarcodeAddedToPageAndPdf";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new AztecBarcodeElement("Hello World",ElementPlacement::BottomRight);
		$element->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element->XDimension = 3;
		$element->Color = "Red";
		$element->ErrorCorrection = 30;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		$element->Value = "test123";
		$element->XOffset = -100;
		$element->YOffset = -100;
		array_push($input->Elements,$element);
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$pdfInput = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$template = new Template("Temp1");
		$element1 = new AztecBarcodeElement("Hello World",ElementPlacement::TopLeft);
		$element1->AztecSymbolSize = AztecSymbolSize::R125xC125;
		$element1->XDimension = 3;
		$element1->Color = "Green";
		$element1->ErrorCorrection = 30;
		$element1->ProcessTilde = true;
		$element1->ReaderInitializationSymbol = true;
		$element1->XOffset = 100;
		$element1->YOffset = 100;
		array_push($template->Elements,$element1);
		$pdfInput->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples14.pdf",$response->PdfContent);
		}
		

		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementByteArray_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementByteArray";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$byte[] value = $System->Text->Encoding->UTF8->GetBytes("Hello World");
		$element = new AztecBarcodeElement($value,0,0);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples15.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function FilePathAztecBarcodeElementPageByteArray_Pdfoutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementPageByteArray";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$byte[] value = $System->Text->Encoding->UTF8->GetBytes("Hello World");
		$element = new AztecBarcodeElement($value,ElementPlacement::TopCenter);
		$element->Color = "Green";
		$element->ErrorCorrection = $45;
		$element->AztecSymbolSize = AztecSymbolSize::Full;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples16.pdf",$response->PdfContent);
		}
		

		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);*/

	}

	
	/** @test */
	public function FilePathAztecBarcodeElementPageXY_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathAztecBarcodeElementPageXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$byte[] value = $System->Text->Encoding->UTF8->GetBytes("Hello World");
		$element = new AztecBarcodeElement($value,ElementPlacement::TopCenter,0,100);
		$element->Color = "Green";
		$element->ErrorCorrection = $45;
		$element->AztecSymbolSize = AztecSymbolSize::Full;
		$element->ProcessTilde = true;
		$element->ReaderInitializationSymbol = true;
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples17.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	*/

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopLeft,0,0);
		$element->Placement = ElementPlacement::TopLeft;
		$element->XOffset = 50;
		$element->YOffset = 50;
		$element->XDimension = 3;
		$element->ProcessTilde = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples18.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementXDimension_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementXDimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopLeft,0,0);
		$element->XDimension = 2;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples19.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementColor_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopLeft,0,0);
		$element->Color = "Indigo";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples20.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementPlacement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementPlacement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopRight,-50,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples21.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples21.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementTilde_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementTilde";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0);
		$element->ProcessTilde = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples22.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples22.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementSymbolSize_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementSymbolSize";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::R120xC120);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples23.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples23.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementEncodingType_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementEncodingType";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::Auto,DataMatrixEncodingType::Base256);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples24.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples24.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementFucntionChar_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementFucntionChar";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::Auto,DataMatrixEncodingType::Auto,DataMatrixFunctionCharacter::FNC1);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples25.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples25.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementEnums_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementEnums";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::Auto,DataMatrixEncodingType::Ascii,DataMatrixFunctionCharacter::None);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples26.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples26.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathDataMatrixBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathDataMatrixBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::R132xC132,DataMatrixEncodingType::C40,DataMatrixFunctionCharacter::Macro05);
		$element->ProcessTilde = true;
		$element->XDimension = 5;
		$element->XOffset = 50;
		$element->YOffset = 50;
		$element->Color = "Yellow";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples27.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples27.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesDataMatrixBarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesDataMatrixBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::R132xC132,DataMatrixEncodingType::C40,DataMatrixFunctionCharacter::Macro05);
		$element->ProcessTilde = true;
		$element->XDimension = 5;
		$element->XOffset = 50;
		$element->YOffset = 50;
		$element->Color = "Yellow";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples28.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples28.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamDataMatrixBarcodeElementProperties_Pdfoutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamDataMatrixBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::R132xC132,DataMatrixEncodingType::C40,DataMatrixFunctionCharacter::Macro05);
		$element->ProcessTilde = true;
		$element->XDimension = 5;
		$element->XOffset = 50;
		$element->YOffset = 50;
		$element->Color = "Yellow";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples29.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples29.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootDataMatrixBarcodeElementProperties_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootDataMatrixBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new DataMatrixBarcodeElement("Hello World",ElementPlacement::TopCenter,0,0,DataMatrixSymbolSize::R132xC132,DataMatrixEncodingType::C40,DataMatrixFunctionCharacter::Macro05);
		$element->ProcessTilde = true;
		$element->XDimension = 5;
		$element->XOffset = 50;
		$element->YOffset = 50;
		$element->Color = "Yellow";
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples30.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples30.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	*/

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,3,0,0);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples31.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples31.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementTilde_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementTilde";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,3,0,0);
		$element->ProcessTilde = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples32.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples32.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementCompaction_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementCompaction";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopCenter,2);
		$element->Compaction = Compaction::Text;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples33.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples33.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementErrorCorrection_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementErrorCorrection";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->ErrorCorrection = ErrorCorrection::Level2;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples34.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples34.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementCompactPdf417_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementCompactPdf41";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->CompactPdf417 = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples35.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples35.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementYDimension_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementYDimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->YDimension = 3;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples36.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples36.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->Color = "Red";
		$element->Compaction = Compaction::Numeric;
		$element->CompactPdf417 = true;
		$element->ErrorCorrection = ErrorCorrection::Level6;
		$element->EvenPages = true;
		$element->Placement = ElementPlacement::TopRight;
		$element->ProcessTilde = true;
		$element->XDimension = 4;
		$element->YDimension = 5;
		$element->XOffset = -50;
		$element->YOffset = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples37.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples37.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamPdf417BarcodeElementProperties_Pdfoutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamPdf417BarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->Color = "Red";
		$element->Compaction = Compaction::Numeric;
		$element->CompactPdf417 = true;
		$element->ErrorCorrection = ErrorCorrection::Level6;
		$element->EvenPages = true;
		$element->Placement = ElementPlacement::TopRight;
		$element->ProcessTilde = true;
		$element->XDimension = 4;
		$element->YDimension = 5;
		$element->XOffset = -50;
		$element->YOffset = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples38.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples38.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function BytesPdf417BarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesPdf417BarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->Color = "Red";
		$element->Compaction = Compaction::Numeric;
		$element->CompactPdf417 = true;
		$element->ErrorCorrection = ErrorCorrection::Level6;
		$element->EvenPages = true;
		$element->Placement = ElementPlacement::TopRight;
		$element->ProcessTilde = true;
		$element->XDimension = 4;
		$element->YDimension = 5;
		$element->XOffset = -50;
		$element->YOffset = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples39.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples39.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudRootPdf417BarcodeElementProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootPdf417BarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Pdf417BarcodeElement("Hello World",ElementPlacement::TopLeft,2);
		$element->Color = "Red";
		$element->Compaction = Compaction::Numeric;
		$element->CompactPdf417 = true;
		$element->ErrorCorrection = ErrorCorrection::Level6;
		$element->EvenPages = true;
		$element->Placement = ElementPlacement::TopRight;
		$element->ProcessTilde = true;
		$element->XDimension = 4;
		$element->YDimension = 5;
		$element->XOffset = -50;
		$element->YOffset = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples40.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples40.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathPdf417BarcodeElementByteArray_Pdfoutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathPdf417BarcodeElementByteArray";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$byte[] value = $System->Text->Encoding->UTF8->GetBytes("Hello World");
		$element = new Pdf417BarcodeElement($value,ElementPlacement::TopLeft,3,0,0);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples41.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples41.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		*/

	}

	
	/** @test */
	public function FilePathQrcodeBarcodeElement_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathQrcodeBarcodeElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopLeft);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples42.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples42.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathQrcodeBarcodeElementVersion_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathQrcodeBarcodeElementVersion";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopLeft);
		$element->Version = 25;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples43.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples43.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathQrcodeBarcodeElementFnc1_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathQrcodeBarcodeElementFnc1";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::BottomRight);
		$element->Fnc1 = QrCodeFnc1::Industry;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples44.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples44.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathQrcodeBarcodeElementProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathQrcodeBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopCenter,50,50);
		$element->Color = "Orange";
		$element->Version = 20;
		$element->Fnc1 = QrCodeFnc1::Gs1;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples45.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples45.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesQrcodeBarcodeElementProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesQrcodeBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopCenter,50,50);
		$element->Color = "Orange";
		$element->Version = 20;
		$element->Fnc1 = QrCodeFnc1::Gs1;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples46.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples46.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamQrcodeBarcodeElementProperties_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamQrcodeBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopCenter,50,50);
		$element->Color = "Orange";
		$element->Version = 20;
		$element->Fnc1 = QrCodeFnc1::Gs1;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples47.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples47.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootQrcodeBarcodeElementProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootQrcodeBarcodeElementProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new QrCodeElement("Hello World",ElementPlacement::TopCenter,50,50);
		$element->Color = "Orange";
		$element->Version = 20;
		$element->Fnc1 = QrCodeFnc1::Gs1;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples48.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples48.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathQrcodeBarcodeElementByteArray_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathQrcodeBarcodeElementByteArray";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$byte[] value = $System->Text->Encoding->UTF8->GetBytes("Hello World");
		$element = new QrCodeElement($value,ElementPlacement::TopLeft);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples49.pdf",$response->PdfContent);
		}
		

		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples49.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);*/
		

	}

	
	/** @test */
	public function FilePathCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples50.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples50.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples51.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples51.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamCode128Barcode_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples52.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples52.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples53.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples53.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples54.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples54.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeWithOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeWithOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50,50,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples55.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples55.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeWithHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeWithHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopLeft,50);
		$element->Height = 60;
		$element->XOffset = 100;
		$element->YOffset = 100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples56.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples56.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopRight,25);
		$element->Color = "red";
		$element->XDimension = 2;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples57.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples57.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::BottomLeft,50);
		$element->ShowText = true;
		$element->TextColor = "blue";
		$element->Font( Font::Courier());
		$element->FontSize = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples58.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples58.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodePlacement_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodePlacement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopRight,50);
		$element->Placement = ElementPlacement::BottomRight;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples59.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples59.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeProcessTilde_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeProcessTilde";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 ~ABarcode.",ElementPlacement::TopCenter,50);
		$element->ProcessTilde = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples60.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples60.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeUccEan128_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeUccEan128";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		$element->UccEan128 = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples61.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples61.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples62.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples62.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode128BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode128BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples63.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples63.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples64.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples64.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputWithTemplateCode128Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputWithTemplateCode128Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Code128BarcodeElement("Code 128 Barcode.",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples65.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples65.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples66.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples66.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples67.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples67.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamCode39Barcode_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples68.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples68.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples69.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples69.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples70.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples70.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopLeft,40,50,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples71.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples71.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		$element->Height = 60;
		$element->XOffset = 100;
		$element->YOffset = 100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples72.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples72.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::BottomCenter,50);
		$element->Color = "red";
		$element->XDimension = 1.5;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples73.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples73.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::BottomLeft,50);
		$element->ShowText = true;
		$element->TextColor = "red";
		$element->Font( Font::CourierBold());
		$element->FontSize = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples74.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples74.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::BottomLeft,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples75.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples75.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::BottomLeft,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples76.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples76.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples77.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples77.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputTemplateCode39Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputTemplateCode39Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("CODE 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples78.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples178.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode39BarcodeExtended_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode39BarcodeExtended";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code39BarcodeElement("Code 39",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples79.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples79.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25Barcod";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples80.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples80.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples81.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples81.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamCode25Barcode_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples82.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples82.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples83.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples83.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples84.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples84.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopLeft,50,50,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples85.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples85.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,25);
		$element->Height = 60;
		$element->XOffset = 100;
		$element->YOffset = 100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples86.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples86.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->Color = "red";
		$element->XDimension = 1.5;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples87.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples87.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->TextColor = "red";
		$element->Font( Font::CourierBoldOblique());
		$element->FontSize = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples88.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples88.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples89.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples89.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode25BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode25BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples90.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples90.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples91.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples91.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputTemplateCode25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputTemplateCode25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Code25BarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples92.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples92.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples93.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples93.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples94.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples94.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamCode93Barcode_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples95.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples95.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples96.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples96.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples97.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples97.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopLeft,40,50,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples98.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples98.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		$element->Height = 60;
		$element->XOffset = 100;
		$element->YOffset = 100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples99.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples99.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::BottomCenter,50);
		$element->Color = "#FF0000";
		$element->XDimension = 2;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples100.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples100.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		$element->ShowText = true;
		$element->TextColor = "red";
		$element->Font( Font::TimesBoldItalic());
		$element->FontSize = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples101.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples101.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples102.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples102.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples103.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples103.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples104.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples104.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputTemplateCode93Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputTemplateCode93Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("CODE 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples105.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples105.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode93BarcodeExtended_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode93BarcodeExtended";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code93BarcodeElement("Code 93",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples106.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples106.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples107.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples107.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples108.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples108.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamCode11Barcode_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples109.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples109.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples110.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples110.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples111.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples111.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopLeft,50,10,20);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples112.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples112.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		$element->Height = 60;
		$element->XOffset = 20;
		$element->YOffset = 20;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples113.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples113.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::BottomLeft,25);
		$element->Color = "green";
		$element->XDimension = 3;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples114.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples114.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::BottomRight,40);
		$element->ShowText = true;
		$element->TextColor = "red";
		$element->Font( Font::HelveticaOblique());
		$element->FontSize = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples115.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples115.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeEvenPage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples116.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples116.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathCode11BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathCode11BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples117.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples117.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples118.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples118.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputTemplateCode11Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PdfInputTemplateCode11Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Code11BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples119.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples119.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples120.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples120.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples121.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples121.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamGs1DataBarBarcode_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples122.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples122.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples123.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples123.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples124.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples124.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopLeft,50,Gs1DataBarType::Omnidirectional,50,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples125.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples125.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,10,Gs1DataBarType::Expanded);
		$element->Height = 60;
		$element->Height = 50;
		$element->XOffset = 0;
		$element->YOffset = 100;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples126.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples126.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::BottomLeft,60,Gs1DataBarType::Limited);
		$element->Color = "#02F1A5";
		$element->XDimension = 1.4;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples127.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples127.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,40,Gs1DataBarType::Omnidirectional);
		$element->ShowText = true;
		$element->TextColor = "red";
		$element->FontSize = 10;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples128.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples128.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples129.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples129.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathGs1DataBarBarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathGs1DataBarBarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,40,Gs1DataBarType::Omnidirectional);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples130.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples130.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Omnidirectional);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples131.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples131.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputTamplateGs1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputTamplateGs1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Gs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,50,Gs1DataBarType::Expanded);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples132.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples132.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples133.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples133.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples134.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples134.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamStackedGS1DataBarBarcode_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples135.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples135.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples136.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples136.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples137.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples137.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,20,10,10);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples138.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples138.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeRowheightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeRowheightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopLeft,StackedGs1DataBarType::ExpandedStacked,50);
		$element->RowHeight = 60;
		$element->XOffset = 10;
		$element->YOffset = 20;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples139.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples139.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::StackedOmnidirectional,30);
		$element->Color = "maroon";
		$element->XDimension = 1;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples140.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples140.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::BottomCenter,StackedGs1DataBarType::Stacked,20);
		$element->ShowText = true;
		$element->TextColor = "gold";
		$element->Font( Font::HelveticaBold());
		$element->FontSize = 14;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples141.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples141.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::StackedOmnidirectional,30);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples142.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples142.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathStackedGS1DataBarBarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathStackedGS1DataBarBarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::StackedOmnidirectional,30);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples143.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples143.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,25);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples144.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples144.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputTemplateStackedGS1DataBarBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputTemplateStackedGS1DataBarBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new StackedGs1DataBarBarcodeElement("12345678",ElementPlacement::TopCenter,StackedGs1DataBarType::Stacked,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples145.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples145.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathIata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples146.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples146.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesIata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples147.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples147.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamIata25Barcode_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples148.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples148.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function PdfInputCloudRoot_Iata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PdfInputCloudRoot_Iata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples149.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples149.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderIata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples150.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples150.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50,10,20);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples151.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples151.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeHeightXY_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeHeightXY";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopLeft,50);
		$element->Height = 60;
		$element->XOffset = 10;
		$element->YOffset = 15;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples152.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples152.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::BottomRight,30);
		$element->Color = "yellow";
		$element->XDimension = 3;
		$element->ShowText = false;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples153.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples153.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		$element->TextColor = "pink";
		$font = Font::FromFile(TemplateBarcodeSamples::$resoursePath."aial.ttf");
		$element->Font($font);
		$element->FontSize = 11;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples154.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples154.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeIncludeCheckDigit_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeIncludeCheckDigit";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		$element->IncludeCheckDigit = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples155.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples155.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::BottomRight,30);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples156.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples156.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathIata25BarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathIata25BarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::BottomRight,30);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples157.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples157.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputIata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples158.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples158.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputWithTemplateIata25Barcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputWithTemplateIata25Barcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$template = new Template("Temp1");
		$element = new Iata25BarcodeElement("12345678",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples159.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples159.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		

	}

	
	/** @test */
	public function FilePathMsiBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples160.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples160.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function BytesMsiBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "BytesMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples161.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples161.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function StreamMsiBarcode_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "StreamMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$memory = new MemoryStream(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples162.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples162.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function CloudRootMsiBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudRootMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples163.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples163.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function CloudSubFolderMsiBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "CloudSubFolderMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples164.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples164.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeOptionalParameter_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeOptionalParameter";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopLeft,10,20);
		$element->Height = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples165.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples165.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeHeightXYAppendcheckdigit_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeHeightXYAppendcheckdigit";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,30);
		$element->Height = 60;
		$element->XOffset = 20;
		$element->YOffset = 20;
		$element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod11;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples166.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples166.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeColorXdimension_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeColorXdimension";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::BottomRight,40);
		$element->Color = "violet";
		$element->XDimension = 2;
		$element->ShowText = false;
		$element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod1010;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples167.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples167.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeTextProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeTextProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->TextColor = "aqua";
		$element->Font( Font::TimesItalic());
		$element->FontSize = 10;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples168.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples168.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeAppendCheckDigit_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		$element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod1110;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples169.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples169.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeEvenPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,30);
		$element->EvenPages = true;
		$element->AppendCheckDigit = MsiBarcodeCheckDigitMode::Mod10;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples170.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples170.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function FilePathMsiBarcodeOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "FilePathMsiBarcodeOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$resource = new PdfResource(TemplateBarcodeSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,30);
		$element->OddPages = true;
		$element->AppendCheckDigit = MsiBarcodeCheckDigitMode::None;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples171.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples171.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PageInputMsiBarcode_PdfOutput()
	{


		Pdf::$DefaultApiKey = TemplateBarcodeSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateBarcodeSamples::$url;

		//$Name = "PageInputMsiBarcode";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateBarcodeSamples::$Author;
		$pdf->Instructions->Title = TemplateBarcodeSamples::$Title;
		$pageInput = new PageInput();
		$element = new MsiBarcodeElement("1234567890",ElementPlacement::TopCenter,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples172.pdf",$response->PdfContent);
		}

	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplateBarcodeSamples::$outPutPath."TemplateBarcodeSamples172.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>