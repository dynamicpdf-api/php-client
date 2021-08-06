<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/FormField.php');
require_once('../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;



 class FormFillingSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="test";
	
	/** @test */
	public function PdfInputFilePath_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"PdfInputFilePath";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."fw9AcroForm_14.pdf");
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
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputStream_PdfOutput()
	{


	/*	Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"PdfInputStream";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$memory = new MemoryStream(FormFillingSamples::$resoursePath.fw9AcroForm_14.pdf");
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
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples2.pdf",$response->PdfContent);
		}*/

			//if(isset($pdf->jsonData))/
		//file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples2.json",$pdf->jsonData);

		//$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputBytes_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"PdfInputBytes";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."fw9AcroForm_14.pdf");
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
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputCloudRoot_FormFill_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"PdfInputCloudRoot";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFillingSamples::$resoursePath."fw9AcroForm_14.pdf"));
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
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputCloudSubFolder_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"PdfInputCloudSubFolder";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFillingSamples::$resoursePath."fw9AcroForm_14.pdf"));
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
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_TextBox_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"TextBox";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("txtfname","My Text");
		array_push($pdf->Instructions->FormFields,$field);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_ComboBox_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"ComboBox";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("cmbname","Item3");
		array_push($pdf->Instructions->FormFields,$field);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_ListBox_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"ListBox";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("lbname","Item 4");
		array_push($pdf->Instructions->FormFields,$field);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_RadioButton_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"RadioButton";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("rbname","Radio2");
		array_push($pdf->Instructions->FormFields,$field);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputFilePath_CheckBox_PdfOutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"CheckBox";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."AllPageElements.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("cbxname","Yes");
		array_push($pdf->Instructions->FormFields,$field);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples10.pdf",$response->PdfContent);
		}
		
			if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);


	}

	
	/** @test */
	public function PdfInputFilePath_XfaFormFill_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"Xfa";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."All Fields Sample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("form1[0].#subform[0].TextField1[0]","text");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
		array_push($pdf->Instructions->FormFields,$field8);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples11.pdf",$response->PdfContent);
		}

			if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputStream_Xfa_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"XfaStream";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("All Fields Sample.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("form1[0].#subform[0].TextField1[0]","text");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
		array_push($pdf->Instructions->FormFields,$field8);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples12.pdf",$response->PdfContent);
		}
*/
		//	if(isset($pdf->jsonData))//
		//file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples12.json",$pdf->jsonData);

		//$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputBytes_Xfa_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"XfaBytes";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$resource = new PdfResource(FormFillingSamples::$resoursePath."All Fields Sample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("form1[0].#subform[0].TextField1[0]","text");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
		array_push($pdf->Instructions->FormFields,$field8);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples13.pdf",$response->PdfContent);
		}

			if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	
	/** @test */
	public function PdfInputCloudRoot_Xfa_Pdfoutput()
	{


		Pdf::$DefaultApiKey = FormFillingSamples::$key;
		Pdf::$DefaultBaseUrl = FormFillingSamples::$url;
		//$Name = $"XfaCloudRoot";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FormFillingSamples::$Author;
		$pdf->Instructions->Title = FormFillingSamples::$Title;
		$input = new PdfInput(new PdfResource(FormFillingSamples::$resoursePath."All Fields Sample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$field = new FormField("form1[0].#subform[0].TextField1[0]","text");
		array_push($pdf->Instructions->FormFields,$field);
		$field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
		array_push($pdf->Instructions->FormFields,$field1);
		$field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
		array_push($pdf->Instructions->FormFields,$field2);
		$field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
		array_push($pdf->Instructions->FormFields,$field3);
		$field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
		array_push($pdf->Instructions->FormFields,$field4);
		$field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
		array_push($pdf->Instructions->FormFields,$field5);
		$field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
		array_push($pdf->Instructions->FormFields,$field6);
		$field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
		array_push($pdf->Instructions->FormFields,$field7);
		$field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
		array_push($pdf->Instructions->FormFields,$field8);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples14.pdf",$response->PdfContent);
		}

			if(isset($pdf->jsonData))
		file_put_contents(FormFillingSamples::$outPutPath."FormFillingSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>