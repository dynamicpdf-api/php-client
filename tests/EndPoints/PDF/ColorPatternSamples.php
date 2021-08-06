<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;

 class ColorPatternSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	
	/** @test */
	public function PdfPageInput_NamedColorSample_PdfOutput()
	{


		Pdf::$DefaultApiKey = ColorPatternSamples::$key;
		Pdf::$DefaultBaseUrl = ColorPatternSamples::$url;
		//$Name = $"NamedColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ColorPatternSamples::$Author;
		$pdf->Instructions->Title = ColorPatternSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
		$textElement->Color = "RED";
		array_push($template->Elements,$textElement);
		$input->SetTemplate($template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples1.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}
	
	/** @test */
	public function PdfPageInput_RGBColorSample_PdfOutput()
	{


		Pdf::$DefaultApiKey = ColorPatternSamples::$key;
		Pdf::$DefaultBaseUrl = ColorPatternSamples::$url;
		//$Name = $"RGBColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ColorPatternSamples::$Author;
		$pdf->Instructions->Title = ColorPatternSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
		$textElement->Color = "rgb(0,1,0)";
		array_push($input->Elements,$textElement);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples2.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}
	
	/** @test */
	public function PdfPageInput_CMYKColorSample_PdfOutput()
	{


		Pdf::$DefaultApiKey = ColorPatternSamples::$key;
		Pdf::$DefaultBaseUrl = ColorPatternSamples::$url;
		//$Name = $"CMYKColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ColorPatternSamples::$Author;
		$pdf->Instructions->Title = ColorPatternSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
		$textElement->Color = "cmyk(0,1,0,0)";
		array_push($input->Elements,$textElement);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples3.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}
	
	/** @test */
	public function PdfPageInput_GrayScaleColorSample_PdfOutput()
	{


		Pdf::$DefaultApiKey = ColorPatternSamples::$key;
		Pdf::$DefaultBaseUrl = ColorPatternSamples::$url;
		//$Name = "GrayScale";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ColorPatternSamples::$Author;
		$pdf->Instructions->Title = ColorPatternSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
		$textElement->Color = "gray(0.8)";
		array_push($input->Elements,$textElement);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples4.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}
	
	/** @test */
	public function PdfPageInput_InvalidColorSample_PdfOutput()
	{

		Pdf::$DefaultApiKey = ColorPatternSamples::$key;
		Pdf::$DefaultBaseUrl = ColorPatternSamples::$url;
		//$Name = "GrayScale";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ColorPatternSamples::$Author;
		$pdf->Instructions->Title = ColorPatternSamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$textElement = new TextElement("Hello World",ElementPlacement::TopCenter);
		$textElement->Color = "test";
		array_push($input->Elements,$textElement);

		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples5.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(ColorPatternSamples::$outPutPath."ColorPatternSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}

}

?>