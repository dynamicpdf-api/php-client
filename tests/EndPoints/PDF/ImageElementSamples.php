<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/ImageElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/PageInput.php');


use PHPUnit\Framework\TestCase;

 class ImageElementSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function PdfInputUsingFilePath_WithTemplate_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"WithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$resource = new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples1.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Templatescale_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"ScaleWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$resource = new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		$element->ScaleX = 3;
		$element->ScaleY = 3;
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples2.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_TemplateWidth_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"WidthWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$resource = new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		$element->MaxHeight = 350;
		$element->MaxWidth = 350;
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples3.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_TemplateWithXY_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"XYWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$resource = new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		$element->XOffset = 50;
		$element->YOffset = 50;
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples4.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfPageInput_Template_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"PageTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples5.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfPageInput_Page_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"PageElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples6.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingStream_Template_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"StreamTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$pdfStream = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("DocumentA100.pdf");
		$pdfResource = new PdfResource($pdfStream);
		$input = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$imageStream = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("Northwind Logo.gif"));
		$resource1 = new ImageResource($imageStream);
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples7.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);*/

	}

	/** @test */
	public function PdfInputUsingBytes_Template_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"BytesTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$pdfResource = new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$resource1 = new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif");
		$element = new ImageElement($resource1,ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples8.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingCloudRoot_Template_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageElementSamples::$key;
		Pdf::$DefaultBaseUrl = ImageElementSamples::$url;
		//$Name = $"CloudRootTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageElementSamples::$Author;
		$pdf->Instructions->Title = ImageElementSamples::$Title;
		$input = new PdfInput( new PdfResource(ImageElementSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new ImageElement(new ImageResource(ImageElementSamples::$resoursePath."Northwind Logo.gif"),ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate ( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples9.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageElementSamples::$outPutPath."ImageElementSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>