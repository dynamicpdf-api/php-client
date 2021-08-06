<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/DlexResource.php');
require_once('../../../src/LayoutDataResource.php');
require_once('../../../src/DlexInput.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/Template.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PageNumberingElement.php');
use PHPUnit\Framework\TestCase;


 class DlexInputSamples extends TestCase

{
	
	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function SimpleDlex_Pdfoutput()
	{
		echo("DlexInputSamples1\r\n");
		Pdf::$DefaultApiKey = DlexInputSamples::$key;
		Pdf::$DefaultBaseUrl = DlexInputSamples::$url;
		//$Name = $"SimpleDlex_Pdfoutput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = DlexInputSamples::$Author;
		$pdf->Instructions->Title = DlexInputSamples::$Title;
		$img = new ImageResource(DlexInputSamples::$resoursePath."Northwind Logo.gif","northwind logo.gif");
		array_push($pdf->Resources,$img);
		$dlex = new DlexResource(DlexInputSamples::$resoursePath."SimpleReportWithCoverPage.dlex");
		$layoutData = new LayoutDataResource(DlexInputSamples::$resoursePath."SimpleReportData.json");
		
		$input = new DlexInput($dlex,$layoutData);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();

		if($response->IsSuccessful)
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples1.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}

	/** @test */
	public function Template_Pdfoutput()
	{

		echo("DlexInputSamples2\r\n");
		Pdf::$DefaultApiKey = DlexInputSamples::$key;
		Pdf::$DefaultBaseUrl = DlexInputSamples::$url;
		//$Name = $"Template_Pdfoutput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = DlexInputSamples::$Author;
		$pdf->Instructions->Title = DlexInputSamples::$Title;
		$img = new ImageResource(DlexInputSamples::$resoursePath."Northwind Logo.gif","northwind logo.gif");
		array_push($pdf->Resources,$img);
		$dlex = new DlexResource(DlexInputSamples::$resoursePath."SimpleReportWithCoverPage.dlex");
		$layoutData = new LayoutDataResource(DlexInputSamples::$resoursePath."SimpleReportData.json");
		$input = new DlexInput($dlex,$layoutData);
		$template = new Template("temp1");
		$textElement = new TextElement("HelloWorld",ElementPlacement::TopRight);
		array_push($template->Elements,$textElement);
		$input->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();

		if($response->IsSuccessful)
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples2.pdf",$response->PdfContent);

		if(isset($pdf->jsonData))
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}

	/** @test */
	public function LayoutDataUsingString_Pdfoutput()
	{

		echo("DlexInputSamples3\r\n");
		Pdf::$DefaultApiKey = DlexInputSamples::$key;
		Pdf::$DefaultBaseUrl = DlexInputSamples::$url;
		//$Name = $"LayoutDataUsingString";
		$pdf = new Pdf();
		$pdf->Instructions->Author = DlexInputSamples::$Author;
		$pdf->Instructions->Title = DlexInputSamples::$Title;
		$img = new ImageResource(DlexInputSamples::$resoursePath."Northwind Logo.gif","northwind logo.gif");
		array_push($pdf->Resources,$img);

		$dlex = new DlexResource(DlexInputSamples::$resoursePath."SimpleReportWithCoverPage.dlex");
		$file = fopen(DlexInputSamples::$resoursePath."SimpleReportData.json", "r");
		$layoutDataString =fread($file,filesize(DlexInputSamples::$resoursePath."SimpleReportData.json"));
		fclose($file);
		
		$layoutData = new LayoutDataResource($layoutDataString);
		$input = new DlexInput($dlex,$layoutData);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();

		if($response->IsSuccessful)
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples3.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}

	/** @test */
	public function PagenumberingLabelWithTemplate_Pdfoutput()
	{

		echo("DlexInputSamples4\r\n");
		Pdf::$DefaultApiKey = DlexInputSamples::$key;
		Pdf::$DefaultBaseUrl = DlexInputSamples::$url;
		//$Name = $"Template_Pdfoutput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = DlexInputSamples::$Author;
		$pdf->Instructions->Title = DlexInputSamples::$Title;
		$img = new ImageResource(DlexInputSamples::$resoursePath."Northwind Logo.gif","northwind logo.gif");
		array_push($pdf->Resources,$img);
		$dlex = new DlexResource(DlexInputSamples::$resoursePath."SimpleReportWithCoverPage.dlex");
		$layoutData = new LayoutDataResource(DlexInputSamples::$resoursePath."SimpleReportData.json");
		$input = new DlexInput($dlex,$layoutData);
		$template = new Template("temp1");
		$textElement =  new PageNumberingElement("%%CP%%", ElementPlacement::TopRight);
		array_push($template->Elements,$textElement);
		$input->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();

		if($response->IsSuccessful)
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples4.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(DlexInputSamples::$outPutPath."DlexInputSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}
}

?>