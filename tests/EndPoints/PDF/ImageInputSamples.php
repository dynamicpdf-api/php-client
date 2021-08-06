<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/ImageResource.php');
require_once('../../../src/ImageInput.php');
require_once('../../../src/PdfResponse.php');

use PHPUnit\Framework\TestCase;


 class ImageInputSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";


	/** @test */
	public function FilePathTiffImage_Pdfoutput()
	{

		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."CCITT_1.tif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples1.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamTiffImage_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"StreamTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("CCITT_1.tif")));
		$resource = new ImageResource($memory);
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples2.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		*/

	}

	/** @test */
	public function BytesTiffImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."CCITT_1.tif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples3.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function ImageInputUsingCloudRoot_TiffImageAddedToInput_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudRootTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."Small.jpg"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples4.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
		
		

	}

	/** @test */
	public function ImageInputUsingCloudSubFolder_TiffImageAdded_Pdfoutput()
	{

		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesTiffImage";
		$pdf = new Pdf();

            $input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."CCITT_1.tif"));
            array_push($pdf->Instructions->Inputs,$input);

            $response = $pdf->Process();


           //if (response->IsSuccesful)
		{
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples5.pdf",$response->PdfContent);
			}
			
			if(isset($pdf->jsonData))
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples5.json",$pdf->jsonData);
	
			$this->assertEquals($response->IsSuccessful,true);
		}
	/** @test */
	public function FilePathTiffImageWithProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathTiffImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."CCITT_1.tif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$input->RightMargin = 50;
		$input->BottomMargin = 50;
		$input->TopMargin = 50;
		$input->LeftMargin = 50;
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples6.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathMulitiTiffImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathMulitiTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."PalaisDuLouvre.tif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples7.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamMulitiTiffImage_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"StreamMulitiTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("PalaisDuLouvre.tif")));
		$resource = new ImageResource($memory);
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples8.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);*/

	}

	/** @test */
	public function BytesMulitiTiffImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesMulitiTiffImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."PalaisDuLouvre.tif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples9.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
		
	}

	/** @test */
	public function CloudRootMulitiTiffImage_Pdfoutput()
	{

		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesTiffImage";
		$pdf = new Pdf();

		$input = new ImageInput( new ImageResource(ImageInputSamples::$resoursePath."PalaisDuLouvre.tif"));

		array_push($pdf->Instructions->Inputs,$input);

		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples10.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples10.json",$pdf->jsonData);
	
			$this->assertEquals($response->IsSuccessful,true);
	}

	/** @test */
	public function CloudSubFolderMulitiTiffImage_Pdfoutput()
	{

		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesTiffImage";
		$pdf = new Pdf();

		$input = new ImageInput( new ImageResource(ImageInputSamples::$resoursePath."PalaisDuLouvre.tif"));

		array_push($pdf->Instructions->Inputs,$input);

		$response = $pdf->Process();
		if ($response->IsSuccessful)
		{
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples11.pdf",$response->PdfContent);
		}

		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples11.json",$pdf->jsonData);
	
			$this->assertEquals($response->IsSuccessful,true);
	}

	/** @test */
	public function FilePathMulitiTiffImageWithProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathMulitiTiffImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."PalaisDuLouvre.tif");
		$input = new ImageInput($resource);
		$input->RightMargin = 50;
		$input->BottomMargin = 50;
		$input->TopMargin = 50;
		$input->LeftMargin = 50;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples12.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPngImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathPngImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."170x220_T.png");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples13.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamPngImage_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"StreamPngImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("170x220_T.png"));
		$resource = new ImageResource($memory);
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples14.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesPngImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesPngImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."170x220_T.png");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples15.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootPngImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudRootPngImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."170x220_T.png"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples16.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderPngImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudSubFolderPngImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."170x220_T.png"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples17.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathPngImageWithProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathPngImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."170x220_T.png");
		$input = new ImageInput($resource);
		$input->ScaleX = 4;
		$input->ScaleY = 4;
		$input->PageWidth = 400;
		$input->PageHeight = 400;
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples18.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples18.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathGifImage_Pdfouput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathGifImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples19.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples19.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamGifImage_Pdfouput()
	{

/*
		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"StreamGifImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("Northwind Logo.gif"));
		$resource = new ImageResource($memory);
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$input->Align = Align::Left;
		$input->VAlign = VAlign::Center;
		$input->PageWidth = $400;
		$input->PageHeight = $400;
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples20.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples20.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesGifImage_Pdfouput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesGifImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples21.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples21.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootGifImage_Pdfouput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudRootGifImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples22.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples22.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderGifImage_Pdfouput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudSubFolderGifImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif"));
		array_push($pdf->Instructions->Inputs,$input);
		$input->Align = Align::Left;
		$input->VAlign = VAlign::Center;
		$input->PageWidth = 400;
		$input->PageHeight = 400;
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples23.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples23.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathGifImageWithProperties_Pdfouput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathGifImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$input->Align = Align::Left;
		$input->VAlign = VAlign::Center;
		$input->PageWidth = 400;
		$input->PageHeight = 400;
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples24.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples24.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathJpegImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathJpegImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Small.jpg");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples25.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples25.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function StreamJpegImage_Pdfoutput()
	{

/*
		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"StreamJpegImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$memory = new MemoryStream($File->ReadAllBytes(base->GetResourcePath("Small->jpg")));
		$resource = new ImageResource($memory);
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples26.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples26.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
*/
	}

	/** @test */
	public function BytesJpegImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"BytesJpegImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Small.jpg");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples27.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples27.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudRootJpegImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudRootJpegImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."Small.jpg"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples28.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples28.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function CloudSubFolderJpegImage_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"CloudSubFolderJpegImage";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$input = new ImageInput(new ImageResource(ImageInputSamples::$resoursePath."Small.jpg"));
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples29.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples29.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);

	}

	/** @test */
	public function FilePathJpegImageWithProperties_Pdfoutput()
	{


		Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathJpegImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;
		$resource = new ImageResource(ImageInputSamples::$resoursePath."Small.jpg");
		$input = new ImageInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$input->ShrinkToFit = true;
		$input->PageWidth = 500;
		$input->PageHeight = 500;
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples30.pdf",$response->PdfContent);
		}
		
		if(isset($pdf->jsonData))
		file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples30.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	
	/** @test */}
	public function FilePathImageWithPropertiesAddedToTemplate_Pdfoutput()
    {
            Pdf::$DefaultApiKey = ImageInputSamples::$key;
		Pdf::$DefaultBaseUrl = ImageInputSamples::$url;
		//$Name = $"FilePathJpegImageWithProperties";
		$pdf = new Pdf();
		$pdf->Instructions->Author = ImageInputSamples::$Author;
		$pdf->Instructions->Title = ImageInputSamples::$Title;

    	$resource = new ImageResource(ImageInputSamples::$resoursePath."Northwind Logo.gif");
        $imageInput = new ImageInput($resource);
        array_push($pdf->Instructions->Inputs,$imageInput);
        $imageInput->Align = Align::Left;
        $imageInput->VAlign = VAlign::Center;
        $imageInput->PageWidth = 400;
        $imageInput->PageHeight = 400;


            //create EvenAddTemplate with pagenumbering label
        $templateC = new Template("TemplateB");
        $pageNumberingElement2 = new PageNumberingElement("%%CP%% of %%TP%%", ElementPlacement::BottomLeft);
        array_push($templateC->Elements,$pageNumberingElement2);

        $imageInput->Template = $templateC;

        $response = $pdf->Process();


        if ($response->IsSuccesful)
		{
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples31.pdf",$response->PdfContent);
			}
			
			if(isset($pdf->jsonData))
			file_put_contents(ImageInputSamples::$outPutPath."ImageInputSamples31.json",$pdf->jsonData);
	
			$this->assertEquals($response->IsSuccessful,true);
        
	}


}

?>