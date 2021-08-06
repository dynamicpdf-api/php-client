<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/Template.php');

use PHPUnit\Framework\TestCase;

 class PageInputSamples extends TestCase

{

	
	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public  function PageInput_TextElement_Pdfoutput()
	{

		echo("PageInputSamples1");
		Pdf::$DefaultApiKey = PageInputSamples::$key;
		Pdf::$DefaultBaseUrl = PageInputSamples::$url;
		//$Name = $"TextElement";
		$pdf = new Pdf();
		//$pdf->
		$pdf->Instructions->Author = PageInputSamples::$Author;
		$pdf->Instructions->Title = PageInputSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();

		if ($response->IsSuccessful)
		file_put_contents(PageInputSamples::$outPutPath."PageInputSamples1.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(PageInputSamples::$outPutPath."PageInputSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}

	/** @test */
	public  function PageInput_TextElementAddedToPageAndTemplate_Pdfoutput()
	{

		echo("PageInputSamples2");
		Pdf::$DefaultApiKey = PageInputSamples::$key;
		Pdf::$DefaultBaseUrl = PageInputSamples::$url;
		$pdf = new Pdf();
		$pdf->Instructions->Author = PageInputSamples::$Author;
		$pdf->Instructions->Title = PageInputSamples::$Title;
		$pageInput = new PageInput();
        $element = new TextElement("Hello World1", ElementPlacement::TopLeft);
        array_push($pageInput->Elements,$element);

		$template = new Template("Temp1");
        $element1 = new TextElement("Hello World", ElementPlacement::TopCenter);
        array_push($template->Elements,$element1);

        $pageInput->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		file_put_contents(PageInputSamples::$outPutPath."PageInputSamples2.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(PageInputSamples::$outPutPath."PageInputSamples2.json",$pdf->jsonData);
		
		$this->assertEquals($response->IsSuccessful,true);
	}


}

?>