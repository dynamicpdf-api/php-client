<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/PageNumberingElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/Font.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/ImageInput.php');

use PHPUnit\Framework\TestCase;

 class TemplatePagenumberingSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";


	/** @test */
	public function FilePathInputPNE_PdfOutput()
	{

		echo("TemplatePagenumberingSamples1");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathInputPNE";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamInputPNE_PdfOutput()
	{

/*echo("TemplatePagenumberingSamples2");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "StreamInputPNE";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfStream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$pdfResource = new PdfResource($pdfStream);
		$input = new PdfInput($pdfResource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesInputPNE_PdfOutput()
	{

		echo("TemplatePagenumberingSamples3");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "BytesInputPNE";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootInputPNE_PdfOutput()
	{

		echo("TemplatePagenumberingSamples4");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudRootInputPNE";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderInputPNE_PdfOutput()
	{

		echo("TemplatePagenumberingSamples5");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudSubFolderInputPNE";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathInputPNEWithProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples6");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathInputPNEWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
		$element->Font( $fontResource);
		$element->FontSize = 14.0;
		$element->Color = "red";
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathInputPNEs_PdfOutput()
	{

		echo("TemplatePagenumberingSamples7");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathInputPNEs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamInputPNEs_PdfOutput()
	{

/*echo("TemplatePagenumberingSamples8");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "StreamInputPNEs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceStream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		$invoiceResource = new PdfResource($invoiceStream);
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Stream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		$fw9AcroForm_18Resource = new PdfResource($fw9AcroForm_18Stream);
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Stream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$documentA100Resource = new PdfResource($documentA100Stream);
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesInputPNEs_PdfOutput()
	{

		echo("TemplatePagenumberingSamples9");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "BytesInputPNEs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootInputPNEs_PdfOutput()
	{

		echo("TemplatePagenumberingSamples10");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudRootInputPNEs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoice = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples10.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderInputPNEs_PdfOutput()
	{

		echo("TemplatePagenumberingSamples11");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudSubFolderInputPNEs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoice = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples11.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEWithProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples12");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);


		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$topElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
		$topElement->Font( $fontResource);
		$topElement->FontSize = 14.0;
		$topElement->Color = "red";
		array_push($templateA->Elements,$topElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter,50,-50);
		$bottomElement->FontSize = 14.0;
		$bottomElement->Color = "red";
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples12.pdf",$response->PdfContent);
		}
		else{
			echo( "\r\n  error message ".$response->ErrorMessage."\r\n");
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEsWithTokens_PdfOutput()
	{

		echo("TemplatePagenumberingSamples13");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEsWithTokens";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Emptypages.pdf");
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
		$emptypages->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$emptypages);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples13.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePath_PNEsWithTokensAndProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples14");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePath_PNEsWithTokensAndProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Emptypages.pdf");
		$emptypages = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$emptypages);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft,50,50);
		$topLeftElement->Font( $fontResource);
		$topLeftElement->FontSize = 14.0;
		array_push($templateA->Elements,$topLeftElement);
		$topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter,50,50);
		$topCenterElement->Font( $fontResource);
		$topCenterElement->FontSize = 14.0;
		array_push($templateA->Elements,$topCenterElement);
		$topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight,-50,50);
		$topRightElement->Font( $fontResource);
		$topRightElement->FontSize = 14.0;
		array_push($templateA->Elements,$topRightElement);
		$bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft,50,-50);
		$bottomLeftElement->Font( $fontResource);
		$bottomLeftElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomLeftElement);
		$bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter,50,-50);
		$bottomCenterElement->Font( $fontResource);
		$bottomCenterElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomCenterElement);
		$bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight,-50,-50);
		$bottomRightElement->Font( $fontResource);
		$bottomRightElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomRightElement);
		$emptypages->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$emptypages);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples14.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePath_PNEsWithTokens_PdfOutput()
	{

		echo("TemplatePagenumberingSamples15");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePath_PNEsWithTokens";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
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
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter);
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples15.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEsWithTokensAndProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples16");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEsWithTokensAndProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$topLeftElement = new PageNumberingElement("%%CP(1)%% of %%TP%%",ElementPlacement::TopLeft,50,50);
		$topLeftElement->Font( $fontResource);
		$topLeftElement->FontSize = 14.0;
		array_push($templateA->Elements,$topLeftElement);
		$topCenterElement = new PageNumberingElement("%%SP(I)%% of %%ST%%",ElementPlacement::TopCenter,50,50);
		$topCenterElement->Font( $fontResource);
		$topCenterElement->FontSize = 14.0;
		array_push($templateA->Elements,$topCenterElement);
		$topRightElement = new PageNumberingElement("%%CP(i)%% of %%TP%%",ElementPlacement::TopRight,-50,50);
		$topRightElement->Font( $fontResource);
		$topRightElement->FontSize = 14.0;
		array_push($templateA->Elements,$topRightElement);
		$bottomLeftElement = new PageNumberingElement("%%CP(I)%% of %%TP%%",ElementPlacement::BottomLeft,50,-50);
		$bottomLeftElement->Font( $fontResource);
		$bottomLeftElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomLeftElement);
		$bottomCenterElement = new PageNumberingElement("%%CP(b)%% of %%TP%%",ElementPlacement::BottomCenter,50,-50);
		$bottomCenterElement->Font( $fontResource);
		$bottomCenterElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomCenterElement);
		$bottomRightElement = new PageNumberingElement("%%CP(a)%% of %%TP%%",ElementPlacement::BottomRight,-50,-50);
		$bottomRightElement->Font( $fontResource);
		$bottomRightElement->FontSize = 14.0;
		array_push($templateA->Elements,$bottomRightElement);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomCenter,50,-50);
		$bottomElement->Font( $fontResource);
		$bottomElement->FontSize = 14.0;
		$bottomElement->Color = "blue";
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples16.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePath_PNEWithMultilineAndProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples17");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePath_PNEWithMultilineAndProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$input);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% \r\nof %%TP%%",ElementPlacement::TopCenter,50,50);
		$element->Font( $fontResource);
		$element->FontSize = 14.0;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples17.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEAddedToEvenPages_PdfOutput()
	{

		echo("TemplatePagenumberingSamples18");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEAddedToEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples18.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function Stream_PNEAddedToEvenPages_PdfOutput()
	{

/*echo("TemplatePagenumberingSamples19");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "Stream_PNEAddedToEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfStream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$pdfResource = new PdfResource($pdfStream);
		$input = new PdfInput($pdfResource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples19.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function Bytes_PNEAddedToEvenPages_PdfOutput()
	{

		echo("TemplatePagenumberingSamples20");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "Bytes_PNEAddedToEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples20.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootPNEAddedToEvenPages_PdfOutput()
	{

		echo("TemplatePagenumberingSamples21");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudRootPNEAddedToEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples21.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples21.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderPNEAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples22");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudSubFolderPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples22.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples22.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEWithPropertiesAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples23");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEWithPropertiesAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$pdfResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter,50,50);
		$element->Font( $fontResource);
		$element->FontSize = 14.0;
		$element->EvenPages = true;
		$element->Color = "red";
		array_push($templateA->Elements,$element);
		$input->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples23.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples23.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples24");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
		$bottomElement->OddPages = true;
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples24.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples24.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamInputPNEAddedToEO_PdfOutput()
	{

/*echo("TemplatePagenumberingSamples25");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "StreamInputPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceStream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		$invoiceResource = new PdfResource($invoiceStream);
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Stream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		$fw9AcroForm_18Resource = new PdfResource($fw9AcroForm_18Stream);
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100RStream = new MemoryStream(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		$documentA100Resource = new PdfResource($documentA100RStream);
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
		$bottomElement->OddPages = true;
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples25.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples25.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesInputPNEAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples26");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "BytesInputPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
		$bottomElement->OddPages = true;
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples26.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples26.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootPNEAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples27");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "CloudRootPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoice = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
		$bottomElement->OddPages = true;
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples27.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples27.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function ColudSubFolderPNEAddedToEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples28");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "ColudSubFolderPNEAddedToEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoice = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight);
		$element->EvenPages = true;
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft);
		$bottomElement->OddPages = true;
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples28.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples28.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPNEWithPropertiesEO_PdfOutput()
	{

		echo("TemplatePagenumberingSamples29");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "FilePathPNEWithPropertiesEO";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title;
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$fontResource = Font::FromFile(TemplatePagenumberingSamples::$resoursePath."ARIALNB.TTF", "arialfont");
		$templateA = new Template("TemplateA");
		$element = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopRight,-50,50);
		$element->Font( $fontResource);
		$element->FontSize = 14.0;
		$element->EvenPages = true;
		$element->Color = "red";
		array_push($templateA->Elements,$element);
		$invoice->SetTemplate( $templateA);
		$documentA100->SetTemplate( $templateA);
		$templateB = new Template("TemplateB");
		$bottomElement = new PageNumberingElement("%%CP%%",ElementPlacement::BottomLeft,50,-50);
		$bottomElement->Font( $fontResource);
		$bottomElement->FontSize = 14.0;
		$bottomElement->OddPages = true;
		$bottomElement->Color = "blue";
		array_push($templateB->Elements,$bottomElement);
		$fw9AcroForm_18->SetTemplate( $templateB);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples29.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples29.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputTextAndImageAndPNEWithProperties_PdfOutput()
	{

		echo("TemplatePagenumberingSamples30");
		Pdf::$DefaultApiKey = TemplatePagenumberingSamples::$key;
		Pdf::$DefaultBaseUrl = TemplatePagenumberingSamples::$url;
		//$Name = "PageInputTextAndImageAndPNEWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplatePagenumberingSamples::$Author;
		$pdf->Instructions->Title = TemplatePagenumberingSamples::$Title; ;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World1",ElementPlacement::TopLeft);
		$element->Color = "red";
		array_push($pageInput->Elements,$element);
		$template = new Template("Temp1");
		$element1 = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Color = "blue";
		array_push($template->Elements,$element1);
		$pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$invoiceResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Invoice.pdf");
		$invoicePdfInput = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoicePdfInput);
		$templateA = new Template("TemplateA");
		$pageNumberingElement = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::TopCenter);
		array_push($templateA->Elements,$pageNumberingElement);
		$invoicePdfInput->SetTemplate( $templateA);
		$documentA100Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."DocumentA100.pdf");
		$documentA100PdfInput = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100PdfInput);
		$templateB = new Template("TemplateB");
		$pageNumberingElement1 = new PageNumberingElement("%%CP%%",ElementPlacement::TopCenter);
		$pageNumberingElement1->OddPages = true;
		array_push($templateB->Elements,$pageNumberingElement1);
		$documentA100PdfInput->SetTemplate( $templateB);
		$singlePageResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."SinglePage.pdf");
		$singlePagePdfInput = new PdfInput($singlePageResource);
		array_push($pdf->Instructions->Inputs,$singlePagePdfInput);
		$fw9AcroForm_14Resource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."fw9AcroForm_14.pdf");
		$fw9AcroForm_14PdfInput = new PdfInput($fw9AcroForm_14Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_14PdfInput);
		$pageInput1 = new PageInput();
		$element2 = new TextElement("Hello World1",ElementPlacement::TopLeft);
		array_push($pageInput1->Elements,$element2);
		array_push($pdf->Instructions->Inputs,$pageInput1);
		$resource = new ImageResource(TemplatePagenumberingSamples::$resoursePath."Northwind Logo.gif");
		$imageInput = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$imageInput);
		$imageInput->Align = Align::Center;
		$imageInput->VAlign = VAlign::Center;
		$imageInput->PageWidth = 400;
		$imageInput->PageHeight = 400;
		$templateC = new Template("TemplateB");
		$pageNumberingElement2 = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::BottomCenter);
		array_push($templateC->Elements,$pageNumberingElement2);
		$imageInput->SetTemplate( $templateC);
		$emptyPageResource = new PdfResource(TemplatePagenumberingSamples::$resoursePath."Emptypages.pdf");
		$emptyPagesPdfInput = new PdfInput($emptyPageResource);
		$emptyPagesPdfInput->SetTemplate( $templateA);
		array_push($pdf->Instructions->Inputs,$emptyPagesPdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples30.pdf",$response->PdfContent);
		}
	
	
		if(isset($pdf->jsonData))	
		file_put_contents(TemplatePagenumberingSamples::$outPutPath."TemplatePagenumberingSamples30.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);		

	}


}

?>