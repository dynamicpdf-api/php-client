<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');


use PHPUnit\Framework\TestCase;

 class TemplateSamples extends TestCase
{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function FilePathInputTextElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"FilePathInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$resource = new PdfResource(TemplateSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamInputTextElement_Pdfoutput()
	{


		/*Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"StreamInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$memory = new MemoryStream(TemplateSamples::$resoursePath."DocumentA100.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->->SetTemplate($template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples2.pdf",$response->PdfContent);
		}*/
		
		//if(isset($pdf->jsonData))
		//file_put_contents(TemplateSamples::$outPutPath."TemplateSamples2.json",$pdf->jsonData);

		//$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function BytesTextElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"BytesInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$resource = new PdfResource(TemplateSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootTextElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"CloudRootInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate($template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderTextElement_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"CloudSubFolderInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$input = new PdfInput(new PdfResource(TemplateSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$input->SetTemplate($template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}
	/** @test */
	public function FilePathTextElementWithProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = TemplateSamples::$key;
		Pdf::$DefaultBaseUrl = TemplateSamples::$url;
		//$Name = $"CloudSubFolderInputTextElement";
		$pdf = new Pdf();
		$pdf->Instructions->Author = TemplateSamples::$Author;
		$pdf->Instructions->Title = TemplateSamples::$Title;
		$resource = new PdfResource(TemplateSamples::$resoursePath."DocumentA100.pdf");

        $input = new PdfInput($resource);

        array_push($pdf->Instructions->Inputs,$input);

        $template = new Template("Temp1");
        $element = new TextElement("Hello World", ElementPlacement::TopCenter);
        $element->XOffset = 0;
        $element->YOffset = 0;
        $element->Color = "Green";
        $element->FontSize = 20;
        $element->Font ( Font::TimesRoman());
        array_push($template->Elements,$element);
        $input->SetTemplate( $template);

		$response = $pdf->Process();
		if ($response->IsSuccessful==true)
		{
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(TemplateSamples::$outPutPath."TemplateSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

}

?>