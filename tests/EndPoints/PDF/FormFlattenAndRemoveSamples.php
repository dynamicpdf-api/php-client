<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/FormField.php');
require_once('../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;


 class FormFlattenAndRemoveSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	
	/** @test */
	public function PdfInputFilePath_Field_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"FilePathField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		$field->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		$field1->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		$field2->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field3->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field4->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		$field5->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field5);
		$response = $pdf->Process();
		//if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples1.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputStream_FormFlattenField_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"StreamField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("fw9AcroForm_14.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		$field->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		$field1->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		$field2->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field3->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field4->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		$field5->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field5);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples2.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		*/

	}

	
	/** @test */
	public function PdfInputBytes_FormFlattenField_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"BytesField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		$field->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		$field1->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		$field2->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field3->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field4->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		$field5->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field5);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples3.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputCloudRoot_FormFlattenField_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudRootField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		$field->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		$field1->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		$field2->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field3->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field4->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		$field5->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field5);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples4.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputCloudSubFolder_FormFlattenField_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudSubFolderField";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		$field->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		$field1->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		$field2->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field3->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field4->Flatten = false;
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		$field5->Flatten = true;
		array_push($pdf->Instructions->FormFields,$field5);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples5.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_FormFlattenFieldRemove_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"FilePathFieldRemove";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
		$field->Remove = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
		$field1->Remove = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field2->Remove = false;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field3->Remove = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
		$field4->Remove = true;
		array_push($pdf->Instructions->FormFields,$field4);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples6.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputStream_FormFlattenFieldRemove_Pdfoutput()
	{

		/*
		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"StreamFieldRemove";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("fw9AcroForm_14.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
		$field->Remove = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
		$field1->Remove = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field2->Remove = false;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field3->Remove = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
		$field4->Remove = true;
		array_push($pdf->Instructions->FormFields,$field4);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples7.pdf",$response->PdfContent);
		
			if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);*/

	}

	
	/** @test */
	public function PdfInputBytes_FormFlattenFieldRemove_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"BytesFieldRemove";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
		$field->Remove = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
		$field1->Remove = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field2->Remove = false;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field3->Remove = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
		$field4->Remove = true;
		array_push($pdf->Instructions->FormFields,$field4);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples8.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingCloudRoot_FormFlattenFieldRemove_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudRootFieldRemove";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
		$field->Remove = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
		$field1->Remove = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field2->Remove = false;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field3->Remove = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
		$field4->Remove = true;
		array_push($pdf->Instructions->FormFields,$field4);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples9.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingCloudSubFolder_FormFlattenFieldRemove_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudSubFolderFieldRemove";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]");
		$field->Remove = true;
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]");
		$field1->Remove = true;
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		$field2->Remove = false;
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		$field3->Remove = false;
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].f1_9[0]");
		$field4->Remove = true;
		array_push($pdf->Instructions->FormFields,$field4);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples10.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingFilePath_FormFlattenAllFields_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"FilePathAllFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
		array_push($pdf->Instructions->FormFields,$field8);
		$pdf->Instructions->FlattenAllFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples11.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingStream_FormFlattenAllFields_Pdfoutput()
	{

		/*
		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"StreamAllFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("fw9AcroForm_14.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
		array_push($pdf->Instructions->FormFields,$field8);
		$pdf->Instructions->FlattenAllFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples12.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		*/
	}

	
	/** @test */
	public function PdfInputUsingBytes_FormFlattenAllFields_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"BytesAllFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
		array_push($pdf->Instructions->FormFields,$field8);
		$pdf->Instructions->FlattenAllFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples13.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingCloudRoot_AllFields_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudRootAllFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
		array_push($pdf->Instructions->FormFields,$field8);
		$pdf->Instructions->FlattenAllFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples14.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingCloudSubFolder_AllFields_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudSubFolderAllFields";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."fw9AcroForm_14.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company,Inc.");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington,DC  22222");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
		array_push($pdf->Instructions->FormFields,$field8);
		$pdf->Instructions->FlattenAllFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples15.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingFilePath_RetainSignature_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"FilePathRetainSignature";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."Org.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$pdf->Instructions->FlattenAllFormFields = true;
		$pdf->Instructions->RetainSignatureFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples16.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingStream_RetainSignature_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"StreamRetainSignature";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("Org.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$pdf->Instructions->FlattenAllFormFields = true;
		$pdf->Instructions->RetainSignatureFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples17.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	
	/** @test */
	public function PdfInputUsingBytes_RetainSignature_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"BytesRetainSignature";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$resource = new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."Org.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$pdf->Instructions->FlattenAllFormFields = true;
		$pdf->Instructions->RetainSignatureFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples18.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputUsingCloudRoot_RetainSignature_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudRootRetainSignature";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."Org.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$pdf->Instructions->FlattenAllFormFields = true;
		$pdf->Instructions->RetainSignatureFormFields = true;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples19.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public  function PdfInputUsingCloudSubFolder_RetainSignature_Pdfoutput()
	{
		Pdf::$DefaultApiKey = FormFlattenAndRemoveSamples::$key;
		Pdf::$DefaultBaseUrl = FormFlattenAndRemoveSamples::$url;
		//$Name = $"CloudRootRetainSignature";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFlattenAndRemoveSamples::$Author;
		$pdf->Instructions->Title = FormFlattenAndRemoveSamples::$Title;

		$input = new PdfInput(new PdfResource(FormFlattenAndRemoveSamples::$resoursePath."Org.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
	   
		$pdf->Instructions->FlattenAllFormFields = true;
		$pdf->Instructions->RetainSignatureFormFields = true;

		$response = $pdf->Process();

		
		if ($response->IsSuccessful)
			file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples20.pdf",$response->PdfContent);
		
		if(isset($pdf->jsonData))
		file_put_contents(FormFlattenAndRemoveSamples::$outPutPath."FormFlattenAndRemoveSamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	   
	}
}

?>