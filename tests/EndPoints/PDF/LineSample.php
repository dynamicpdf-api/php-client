<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/LineElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/Template.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');


use PHPUnit\Framework\TestCase;

 class LineSample extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";


	
	/** @test */
	public function PageInput_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new LineElement(ElementPlacement::BottomRight,20,20);
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PageInputLineStyle_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInputLineStyle";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new LineElement(ElementPlacement::TopCenter,200,200);
		$element->LineStyle = "[2,4,2,6]";
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PageInputXYOffset_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInputWithXYOffset";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new LineElement(ElementPlacement::TopCenter,200,200);
		$element->X1Offset = 100;
		$element->Y1Offset = 100;
		$element->LineStyle = "dash";
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PageInputColor_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInputWithColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new LineElement(ElementPlacement::TopCenter,200,200);
		$element->Color = "RED";
		$element->LineStyle = "dots";
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PageInputProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInputWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$element = new LineElement(ElementPlacement::TopLeft,200,200);
		$element->Color = "Rgb(0,0,1)";
		$element->X1Offset = 100;
		$element->Y1Offset = 100;
		$element->LineStyle = "dashLarge";
		$element->Width = 4;
		array_push($input->Elements,$element);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PdfPageInputPropertiesWithTemplate_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PageInputPropertiesWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("temp");
		$element = new LineElement(ElementPlacement::TopLeft,200,200);
		$element->Color = "Rgb(0,0,1)";
		$element->X1Offset = 100;
		$element->Y1Offset = 100;
		$element->LineStyle = "dashLarge";
		$element->Width = 4;
		array_push($template->Elements,$element);
		$input->SetTemplate($template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PdfInputUsingFilePath_Template_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PdfInputPropertiesWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$resource = new PdfResource(LineSample::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("temp");
		$element = new LineElement(ElementPlacement::TopLeft,200,200);
		$element->Color = "Rgb(0,0,1)";
		$element->X1Offset = 100;
		$element->Y1Offset = 100;
		$element->LineStyle = "dashLarge";
		$element->Width = 4;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	
	/** @test */
	public function PdfInputUsingStream_Template_Pdfoutput()
	{


	/*	Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PdfInputStreamPropertiesWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("DocumentA100.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("temp");
		$element = new LineElement(ElementPlacement::TopLeft,200,200);
		$element->Color = $"Rgb(0,0,1)";
		$element->X1Offset = $100;
		$element->Y1Offset = $100;
		$element->LineStyle = $"dashLarge";
		$element->Width = $4;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample8.pdf",$response->PdfContent);
		}*/
		
		//if(isset($pdf->jsonData))
		//file_put_contents(LineSample::$outPutPath."LineSample8.json",$pdf->jsonData);

		//$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingCloudResource_Template_Pdfoutput()
	{


		Pdf::$DefaultApiKey = LineSample::$key;
		Pdf::$DefaultBaseUrl = LineSample::$url;
		//$Name = $"PdfInputStreamPropertiesWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = LineSample::$Author;
		$pdf->Instructions->Title = LineSample::$Title;
		$input = new PdfInput(new PdfResource(LineSample::$resoursePath."DocumentA100.pdf"));

		array_push($pdf->Instructions->Inputs,$input);

		$template = new Template("temp");
		$element = new LineElement(ElementPlacement::TopLeft, 200, 200);
		$element->Color = "Rgb(0,0,1)";
		$element->X1Offset = 100;
		$element->Y1Offset = 100;
		$element->LineStyle = "dashLarge";
		$element->Width = 4;
		array_push($template->Elements,$element);
		$input->SetTemplate($template);

		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(LineSample::$outPutPath."LineSample9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(LineSample::$outPutPath."LineSample9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

}

?>