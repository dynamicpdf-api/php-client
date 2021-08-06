<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/RectangleElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');

use PHPUnit\Framework\TestCase;

 class RectangleSamples extends TestCase

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


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputPlacement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputPlacement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->Placement = ElementPlacement::BottomRight;
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputXYOffset_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputXYOffset";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopLeft,100,50);
		$element->XOffset = 50;
		$element->YOffset = 50;
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputCornerRadius_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputCornerRadius";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->CornerRadius = 10;
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputtBorderWidth_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputtBorderWidth";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->BorderWidth = 5;
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputBorderStyle_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputBorderStyle";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->BorderStyle = "dots";
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputBorderStyleArray_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputBorderStyleArray";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->BorderStyle = "[2,1,4,2]";
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputBorderColor_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputBorderColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->BorderColor = "blue";
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInputFillColor_Pdfoutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"PageInputFillColor";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$pageInput = new PageInput();
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->FillColor = "green";
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePath_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"FilePath";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$resource = new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples10.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function Bytes_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"FilePath";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$resource = new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples11.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function Stream_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"Stream";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("DocumentA100.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples12.pdf",$response->PdfContent);
		}*/
			
		//if(isset($pdf->jsonData))/
		///file_put_contents(RectangleSamples::$outPutPath."RectangleSamples12.json",$pdf->jsonData);

		//$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRoot_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"CloudRoot";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$input = new PdfInput(new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples13.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolder_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"CloudSubFolder";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$input = new PdfInput(new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples14.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathEvenOddTemplate_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"FilePathEvenOddTemplateEven";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$resource = new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples15.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	/** @test */
	public function FilePathOddPages_PdfOutput()
	{


		Pdf::$DefaultApiKey = RectangleSamples::$key;
		Pdf::$DefaultBaseUrl = RectangleSamples::$url;
		//$Name = $"FilePathEvenOddTemplateEven";
		$pdf = new Pdf();
		$pdf->Instructions->Author = RectangleSamples::$Author;
		$pdf->Instructions->Title = RectangleSamples::$Title;
		$resource = new PdfResource(RectangleSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new RectangleElement(ElementPlacement::TopCenter,100,50);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples16.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(RectangleSamples::$outPutPath."RectangleSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>