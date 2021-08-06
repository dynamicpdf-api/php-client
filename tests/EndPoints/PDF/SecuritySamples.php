<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Aes256Security.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/Aes128Security.php');
require_once('../../../src/RC4128Security.php');

use PHPUnit\Framework\TestCase;


 class SecuritySamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

	/** @test */
	public function PdfInputFilePathAes256Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputFilePathAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputBytesAes256Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputBytesAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputStream_Aes256Security_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputStreamAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$memory = new MemoryStream(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf")));
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples3.pdf",$response->PdfContent);
		}
		
	
	if(isset($pdf->jsonData))	file_put_contents(SecuritySamples::$outPutPath."SecuritySamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	*/

	}

	/** @test */
	public function PdfInputCloudRoot_Aes256Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudRootAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputSubFolder_Aes256Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudSubFolderAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples5.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInput_Aes256Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PageInputAes256Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("user","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInpuAes256SecurityOwnerPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityOwnerPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$security = new Aes256Security("","owner");
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputAes256SecurityAllowFormFillingAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityFormFilling";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("user","owner");
		$security->AllowFormFilling = false;
		$security->AllowUpdateAnnotsAndFields = false;
		$security->AllowEdit = false;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputAes256SecurityAllowPrintAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityAllowPrint";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("user","owner");
		$security->AllowHighResolutionPrinting = true;
		$security->AllowPrint = true;
		$security->AllowCopy = true;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputFilePath_Aes256SecurityOwnerUserPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityOwnerUserPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("","");
		$security->AllowAccessibility = true;
		$security->AllowDocumentAssembly = false;
		$security->AllowEdit = false;
		$security->OwnerPassword = "owner";
		$security->UserPassword = "user";
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples10.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInput_Aes256SecurityDocumentComponentsAll_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityDocumentComponentsAll";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("user","owner");
		$security->DocumentComponents = EncryptDocumentComponents::All;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples11.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes256SecurityDocumentComponentsAllExceptMetadata_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityDocumentComponentsAllExceptMetadata";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("user","owner");
		$security->DocumentComponents = EncryptDocumentComponents::AllExceptMetadata;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples12.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes256SecurityWithoutPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes256SecurityWithoutPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes256Security("","");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples13.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputFilePathAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples14.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingBytes_Aes128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputBytesPathAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples15.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingStream_Aes128Security_PdfOutput()
	{

/*
		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputStreamPathAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$memory = new MemoryStream(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples16.pdf",$response->PdfContent);
		}
		
		
		if(isset($pdf->jsonData))file_put_contents(SecuritySamples::$outPutPath."SecuritySamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	*/

	}

	/** @test */
	public function PdfInputUsingCloudRoot_Aes128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudRootPathAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples17.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingCloudSubFolder_Aes128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudSubFolderPathAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$pdf->Instructions->Security = $security;
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples18.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInput_Aes128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PageInputAes128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples19.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityOwnerPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityOwnerPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples20.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityAllowFormFillingAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityAllowFormFillingAndOtherProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$security->AllowFormFilling = false;
		$security->AllowUpdateAnnotsAndFields = false;
		$security->AllowEdit = false;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples21.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples21.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityAllowPrintAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityAllowFormFillingAndOtherProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$security->AllowHighResolutionPrinting = true;
		$security->AllowPrint = true;
		$security->AllowCopy = true;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples22.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples22.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityUserOwnerPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityUserOwnerPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("","");
		$security->AllowAccessibility = true;
		$security->AllowDocumentAssembly = false;
		$security->AllowEdit = false;
		$security->OwnerPassword = "owner";
		$security->UserPassword = "user";
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples23.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples23.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityDocumentComponentsAll_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityDocumentComponentsAll";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$security->DocumentComponents = EncryptDocumentComponents::All;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples24.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples24.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityDocumentComponentsAllExceptMetadata_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityDocumentComponentsAllExceptMetadata";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("user","owner");
		$security->DocumentComponents = EncryptDocumentComponents::AllExceptMetadata;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples25.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples25.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_Aes128SecurityWithoutPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputAes128SecurityWithoutPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new Aes128Security("","");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples26.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples26.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples27.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples27.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingBytes_RC4128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputBytesRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples28.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples28.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingStream_RC4128Security_PdfOutput()
	{
/*

		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputStreamRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$memory = new MemoryStream(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$resource = new PdfResource($memory);
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples29.pdf",$response->PdfContent);
		}
		
		
		if(isset($pdf->jsonData))file_put_contents(SecuritySamples::$outPutPath."SecuritySamples29.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	*/

	}

	/** @test */
	public function PdfInputUsingCloudRoot_RC4128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudRootRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples30.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples30.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingCloudSubFolder_RC4128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputCloudSubFolderRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$input = new PdfInput(new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples31.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples31.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PageInput_RC4128Security_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PageInputRC4128Security";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$pdf->Instructions->Security = $security;
		$input = new PageInput();
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples32.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples32.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityOwnerPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityOwnerPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("","owner");
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples33.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples33.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityAllowFormFillingAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityAllowFormFillingAndOtherProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$security->AllowFormFilling = false;
		$security->AllowUpdateAnnotsAndFields = false;
		$security->AllowEdit = false;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples34.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples34.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityAllowPrintAndOtherProperties_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityAllowPrintAndOtherProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$security->AllowHighResolutionPrinting = true;
		$security->AllowPrint = true;
		$security->AllowCopy = true;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples35.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples35.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityOwnerUserPassword_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityOwnerUserPassword";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("","");
		$security->AllowAccessibility = true;
		$security->AllowDocumentAssembly = false;
		$security->AllowEdit = false;
		$security->OwnerPassword = "owner";
		$security->UserPassword = "user";
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples36.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples36.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityEncryptMetadata_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityEncryptMetadata";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$security->EncryptMetadata = true;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples37.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples37.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function PdfInputUsingFilePath_RC4128SecurityEncryptExceptMetadata_PdfOutput()
	{


		Pdf::$DefaultApiKey = SecuritySamples::$key;
		Pdf::$DefaultBaseUrl = SecuritySamples::$url;
		//$Name = "PdfInputRC4128SecurityEncryptExceptMetadata";
		$pdf = new Pdf();
		$pdf->Instructions->Author = SecuritySamples::$Author;
		$pdf->Instructions->Title = SecuritySamples::$Title;
		$security = new RC4128Security("user","owner");
		$security->EncryptMetadata = false;
		$pdf->Instructions->Security = $security;
		$resource = new PdfResource(SecuritySamples::$resoursePath."XmpAndOtherSample.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples38.pdf",$response->PdfContent);
		}


		if(isset($pdf->jsonData))		
		file_put_contents(SecuritySamples::$outPutPath."SecuritySamples38.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}


}

?>