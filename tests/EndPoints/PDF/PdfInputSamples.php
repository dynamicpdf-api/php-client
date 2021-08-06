<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/MergeOptions.php');
require_once('../../../src/Template.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');


use PHPUnit\Framework\TestCase;

 class PdfInputSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function FilePath_PdfOutput()
	{

		echo("PdfInputSamples1");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePath";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$pdfResource = new PdfResource(PdfInputSamples::$resoursePath."Emptypages.pdf");
		$pdfInput = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples1.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function Bytes_PdfOutput()
	{

		echo("PdfInputSamples2");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "Bytes";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$pdfResource = new PdfResource(PdfInputSamples::$resoursePath."Emptypages.pdf");
		$pdfInput = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples2.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function Stream_PdfOutput()
	{

/*		echo("PdfInputSamples3");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "Stream";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoiceStream = new MemoryStream(PdfInputSamples::$resoursePath."Emptypages.pdf");
		$pdfResource = new PdfResource($invoiceStream);
		$pdfInput = new PdfInput($pdfResource);
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples3.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

*/
	}

	/** @test */
	public function CloudRoot_PdfOutput()
	{

		echo("PdfInputSamples4");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudRoot";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$pdfInput = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."Emptypages.pdf"));
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples4.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function CloudSubFolder_PdfOutput()
	{

		echo("PdfInputSamples5");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudSubFolder";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$pdfInput = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."Emptypages.pdf"));
		array_push($pdf->Instructions->Inputs,$pdfInput);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples5.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathPdfInputs_PdfOutput()
	{

		echo("PdfInputSamples6");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoiceResource = new PdfResource(PdfInputSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);

		$fw9AcroForm_18Resource = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);

		$documentA100Resource = new PdfResource(PdfInputSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples6.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function BytesPdfInputs_PdfOutput()
	{

		echo("PdfInputSamples7");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "BytesInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoiceResource = new PdfResource(PdfInputSamples::$resoursePath."Invoice.pdf");
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Resource = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Resource = new PdfResource(PdfInputSamples::$resoursePath."DocumentA100.pdf");
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples7.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function StreamPdfInputs_PdfOutput()
	{
/*
		echo("PdfInputSamples8");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "StreamInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoiceStream = new MemoryStream(PdfInputSamples::$resoursePath."Invoice.pdf");
		$invoiceResource = new PdfResource($invoiceStream);
		$invoice = new PdfInput($invoiceResource);
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18Stream = new MemoryStream(PdfInputSamples::$resoursePath."fw9AcroForm_18.pdf");
		$fw9AcroForm_18Resource = new PdfResource($fw9AcroForm_18Stream);
		$fw9AcroForm_18 = new PdfInput($fw9AcroForm_18Resource);
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100Stream = new MemoryStream(PdfInputSamples::$resoursePath."DocumentA100.pdf");
		$documentA100Resource = new PdfResource($documentA100Stream);
		$documentA100 = new PdfInput($documentA100Resource);
		array_push($pdf->Instructions->Inputs,$documentA100);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples8.pdf",$response->PdfContent);
		}
		
		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		*/

	}

	/** @test */
	public function CloudRootPdfInputs_PdfOutput()
	{

		echo("PdfInputSamples9");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudRootPdfInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoice = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples9.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function CloudSubFolderPdfInputs_PdfOutput()
	{

		echo("PdfInputSamples10");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudSubFolderPdfInputs";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$invoice = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."Invoice.pdf"));
		array_push($pdf->Instructions->Inputs,$invoice);
		$fw9AcroForm_18 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_18.pdf"));
		array_push($pdf->Instructions->Inputs,$fw9AcroForm_18);
		$documentA100 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."DocumentA100.pdf"));
		array_push($pdf->Instructions->Inputs,$documentA100);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples10.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeMultipleDocuments_PdfOutput()
	{

		echo("PdfInputSamples11");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$input->StartPage = 1;
		$input->PageCount = 6;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples11.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function BytesMergeMultipleDocuments_PdfOutput()
	{

		echo("PdfInputSamples12");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "BytesPathMergeMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$input->StartPage = 1;
		$input->PageCount = 6;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples12.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function StreamMergeMultipleDocuments_PdfOutput()
	{

/*		echo("PdfInputSamples13");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "StreamPathMergeMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$memory = new MemoryStream(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		$input->StartPage = 1;
		$input->PageCount = 6;
		array_push($pdf->Instructions->Inputs,$input);
		$memory1 = new MemoryStream(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$resource1 = new PdfResource($memory1);
		$input1 = new PdfInput($resource1);
		array_push($pdf->Instructions->Inputs,$input1);
		$memory2 = new MemoryStream(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$resource2 = new PdfResource($memory2);
		$input2 = new PdfInput($resource2);
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples13.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

*/
	}

	/** @test */
	public function CloudRootMergeMultipleDocuments_PdfOutput()
	{

		echo("PdfInputSamples14");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudRootMergeMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$input = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf"));
		$input->StartPage = 1;
		$input->PageCount = 6;
		array_push($pdf->Instructions->Inputs,$input);
		$input1 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf"));
		array_push($pdf->Instructions->Inputs,$input1);
		$input2 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples14.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function CloudSubFolderMergeMultipleDocuments_PdfOutput()
	{

		echo("PdfInputSamples15");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "CloudSubFolderMergeMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$input = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf"));
		$input->StartPage = 1;
		$input->PageCount = 6;
		array_push($pdf->Instructions->Inputs,$input);
		$input1 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf"));
		array_push($pdf->Instructions->Inputs,$input1);
		$input2 = new PdfInput(new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples15.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathSimpleMerge_PdfOutput()
	{

		echo("PdfInputSamples16");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathSimpleMerge";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples16.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeStartPageAndPageCount_PdfOutput()
	{

		echo("PdfInputSamples17");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathSimpleMergePpty";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."DocumentA100.pdf");
		$input = new PdfInput($resource);
		$input->StartPage = 2;
		$input->PageCount = 10;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples17.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeWithSameInput_PdfOutput()
	{

		echo("PdfInputSamples18");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeWithSameInput";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input1 = new PdfInput($resource1);
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input2 = new PdfInput($resource2);
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples18.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptions_PdfOutput()
	{

		echo("PdfInputSamples19");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptions";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples19.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsWithMultipleDocuments_PdfOutput()
	{

		echo("PdfInputSamples20");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsWithMultipleDocuments";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		$input1->StartPage = 1;
		$input1->PageCount = 1;
		$mergeOptions1 = new MergeOptions();
		$mergeOptions1->formsXfaData = true;
		$input1->MergeOptions = $mergeOptions1;
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples20.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsDocumentInfo_PdfOutput()
	{

		echo("PdfInputSamples21");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsDocumentInfo";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->documentInfo = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples21.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples21.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsDocumentJavaScript_PdfOutput()
	{

		echo("PdfInputSamples22");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsDocumentJavaScript";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."JavaScriptSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->documentJavaScript = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples22.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples22.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsDocumentProperties_PdfOutput()
	{

		echo("PdfInputSamples23");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsDocumentProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."DocumentPropertiesSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->documentProperties = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples23.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples23.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

		

	}

	/** @test */
	public function FilePathMergeOptionsEmbeddedFiles_PdfOutput()
	{

		echo("PdfInputSamples24");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsEmbeddedFiles";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."EmbedFilesSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->embeddedFiles = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples24.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples24.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsFormFields_PdfOutput()
	{

		echo("PdfInputSamples25");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsFormFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->formFields = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples25.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples25.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsFormsXfaData_PdfOutput()
	{

		echo("PdfInputSamples26");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsFormsXfaData";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->formsXfaData = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples26.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples26.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsLogicalStructure_PdfOutput()
	{

		echo("PdfInputSamples27");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsLogicalStructure";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->logicalStructure = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples27.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples27.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsOpenAction_PdfOutput()
	{

		echo("PdfInputSamples28");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsOpenAction";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."OpenActionSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->openAction = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples28.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples28.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsOptionalContentInfo_PdfOutput()
	{

		echo("PdfInputSamples29");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsOptionalContentInfo";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."OptionalContentInfoSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->optionalContentInfo = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples29.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples29.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsOutlines_PdfOutput()
	{

		echo("PdfInputSamples30");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsOutlines";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->outlines = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples30.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples30.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsOutputIntent_PdfOutput()
	{

		echo("PdfInputSamples31");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsOutputIntent";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."OutputIntentSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->outputIntent = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples31.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples31.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsPageAnnotations_PdfOutput()
	{

		echo("PdfInputSamples32");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsPageAnnotations";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."NoteAnnotSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->pageAnnotations = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples32.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples32.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsPageLabelsAndSections_PdfOutput()
	{

		echo("PdfInputSamples33");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsPageLabelsAndSections";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."PageSectionSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->pageLabelsAndSections = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples33.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples33.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsRootFormField_PdfOutput()
	{

		echo("PdfInputSamples34");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsRootFormField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->rootFormField = "RootName";
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples34.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples34.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsXmpMetadata_PdfOutput()
	{

		echo("PdfInputSamples35");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsXmpMetadata";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->xmpMetadata = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples35.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples35.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsAllTrue_PdfOutput()
	{

		echo("PdfInputSamples36");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsAllTrue";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->documentInfo = true;
		$mergeOptions->documentJavaScript = true;
		$mergeOptions->documentProperties = true;
		$mergeOptions->embeddedFiles = true;
		$mergeOptions->formFields = true;
		$mergeOptions->formsXfaData = true;
		$mergeOptions->logicalStructure = true;
		$mergeOptions->openAction = true;
		$mergeOptions->optionalContentInfo = true;
		$mergeOptions->outlines = true;
		$mergeOptions->outputIntent = true;
		$mergeOptions->pageAnnotations = true;
		$mergeOptions->pageLabelsAndSections = true;
		$mergeOptions->xmpMetadata = true;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples36.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples36.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsAllFalse_PdfOutput()
	{

		echo("PdfInputSamples37");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsAllFalse";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$mergeOptions = new MergeOptions();
		$mergeOptions->documentInfo = false;
		$mergeOptions->documentJavaScript = false;
		$mergeOptions->documentProperties = false;
		$mergeOptions->embeddedFiles = false;
		$mergeOptions->formFields = false;
		$mergeOptions->formsXfaData = false;
		$mergeOptions->logicalStructure = false;
		$mergeOptions->openAction = false;
		$mergeOptions->optionalContentInfo = false;
		$mergeOptions->outlines = false;
		$mergeOptions->outputIntent = false;
		$mergeOptions->pageAnnotations = false;
		$mergeOptions->pageLabelsAndSections = false;
		$mergeOptions->xmpMetadata = false;
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples37.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples37.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsWithTemplateAllPages_PdfOutput()
	{

		echo("PdfInputSamples38");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsWithTemplateAllPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$template = new Template("Temp1");
		$element = new TextElement("Merger with Template(All Pages)",ElementPlacement::TopCenter);
		array_push($template->Elements,$element);
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$input->Template = $template;
		$mergeOptions = new MergeOptions();
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Template = $template;
		$input1->StartPage = 1;
		$input1->PageCount = 1;
		$mergeOptions1 = new MergeOptions();
		$mergeOptions1->formsXfaData = true;
		$input1->MergeOptions = $mergeOptions1;
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Template = $template;
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples38.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples38.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsWithTemplateEvenPages_PdfOutput()
	{

		echo("PdfInputSamples39");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsWithTemplateEvenPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$template = new Template("Temp1");
		$element = new TextElement("Merger with Template(Even Pages)",ElementPlacement::TopCenter);
		$element->EvenPages = true;
		array_push($template->Elements,$element);
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$input->Template = $template;
		$mergeOptions = new MergeOptions();
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Template = $template;
		$input1->StartPage = 1;
		$input1->PageCount = 1;
		$mergeOptions1 = new MergeOptions();
		$mergeOptions1->formsXfaData = true;
		$input1->MergeOptions = $mergeOptions1;
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Template = $template;
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples39.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples39.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	/** @test */
	public function FilePathMergeOptionsWithTemplateOddPages_PdfOutput()
	{

		echo("PdfInputSamples40");
		Pdf::$DefaultApiKey = PdfInputSamples::$key;
		Pdf::$DefaultBaseUrl = PdfInputSamples::$url;
		//$Name = "FilePathMergeOptionsWithTemplateOddPages";
		$pdf = new Pdf();
		$pdf->Instructions->Author = PdfInputSamples::$Author;
		$pdf->Instructions->Title = PdfInputSamples::$Title;
		$template = new Template("Temp1");
		$element = new TextElement("Merger with Template(Odd Pages)",ElementPlacement::TopCenter);
		$element->OddPages = true;
		array_push($template->Elements,$element);
		$resource = new PdfResource(PdfInputSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		$input->Template = $template;
		$mergeOptions = new MergeOptions();
		$input->MergeOptions = $mergeOptions;
		array_push($pdf->Instructions->Inputs,$input);
		$resource1 = new PdfResource(PdfInputSamples::$resoursePath."All Fields Sample.pdf");
		$input1 = new PdfInput($resource1);
		$input1->Template = $template;
		$input1->StartPage = 1;
		$input1->PageCount = 1;
		$mergeOptions1 = new MergeOptions();
		$mergeOptions1->formsXfaData = true;
		$input1->MergeOptions = $mergeOptions1;
		array_push($pdf->Instructions->Inputs,$input1);
		$resource2 = new PdfResource(PdfInputSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input2 = new PdfInput($resource2);
		$input2->Template = $template;
		array_push($pdf->Instructions->Inputs,$input2);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples40.pdf",$response->PdfContent);
		}

		

		if(isset($pdf->jsonData))
		file_put_contents(PdfInputSamples::$outPutPath."PdfInputSamples40.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}


}

?>