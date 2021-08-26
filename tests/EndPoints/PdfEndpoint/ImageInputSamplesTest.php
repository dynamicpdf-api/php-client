<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/ImageInput.php');


require_once(__DIR__.'/../../../src/Align.php');
require_once(__DIR__.'/../../../src/VAlign.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/PageNumberingElement.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');


use PHPUnit\Framework\TestCase;

class ImageInputSamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function FilePathTiffImage_Pdfoutput()
{
    $Name = "FilePathTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."CCITT_1.tif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamTiffImage_Pdfoutput()
{
   /* $Name = "StreamTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "CCITT_1::tif")));
    $resource = new ImageResource($memory);
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesTiffImage_Pdfoutput()
{
    $Name = "BytesTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."CCITT_1.tif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function ImageInputUsingCloudRoot_TiffImageAddedToInput_Pdfoutput()
{
   $Name = "CloudRootTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  ImageInput::CreateImageInput("Small.jpg");
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathTiffImageWithProperties_Pdfoutput()
{
    $Name = "FilePathTiffImageWithProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."CCITT_1.tif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);
    $input->RightMargin = 50;
    $input->BottomMargin = 50;
    $input->TopMargin = 50;
    $input->LeftMargin = 50;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMulitiTiffImage_Pdfoutput()
{
    $Name = "FilePathMulitiTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."PalaisDuLouvre.tif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamMulitiTiffImage_Pdfoutput()
{
   /* $Name = "StreamMulitiTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "PalaisDuLouvre::tif")));
    $resource = new ImageResource($memory);
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesMulitiTiffImage_Pdfoutput()
{
    $Name = "BytesMulitiTiffImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."PalaisDuLouvre.tif");

    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathMulitiTiffImageWithProperties_Pdfoutput()
{
    $Name = "FilePathMulitiTiffImageWithProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."PalaisDuLouvre.tif");
    $input = new ImageInput($resource);
    $input->RightMargin = 50;
    $input->BottomMargin = 50;
    $input->TopMargin = 50;
    $input->LeftMargin = 50;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPngImage_Pdfoutput()
{
    $Name = "FilePathPngImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."170x220_T.png");
    $input = new ImageInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamPngImage_Pdfoutput()
{
   /* $Name = "StreamPngImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "170x220_T::png")));
    $resource = new ImageResource($memory);
    $input = new ImageInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesPngImage_Pdfoutput()
{
    $Name = "BytesPngImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."170x220_T.png");
    $input = new ImageInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootPngImage_Pdfoutput()
{
    $Name = "CloudRootPngImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  ImageInput::CreateImageInput("170x220_T.png");

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderPngImage_Pdfoutput()
{
   $Name = "CloudSubFolderPngImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  ImageInput::CreateImageInput("Resources/170x220_T.png");

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathPngImageWithProperties_Pdfoutput()
{
    $Name = "FilePathPngImageWithProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."170x220_T.png");
    $input = new ImageInput($resource);
    $input->ScaleX = 4;
    $input->ScaleY = 4;
    $input->PageWidth = 400;
    $input->PageHeight = 400;
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathGifImage_Pdfouput()
{
    $Name = "FilePathGifImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Northwind Logo.gif");

    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamGifImage_Pdfouput()
{
   /* $Name = "StreamGifImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "Northwind Logo::gif")));
    $resource = new ImageResource($memory);
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);
    $input->Align = Align::Left;
    $input->VAlign = VAlign::Center;
    $input->PageWidth = 400;
    $input->PageHeight = 400;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesGifImage_Pdfouput()
{
    $Name = "BytesGifImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Northwind Logo.gif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples18.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootGifImage_Pdfouput()
{
   $Name = "CloudRootGifImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  ImageInput::CreateImageInput("Northwind Logo.gif");

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples19.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderGifImage_Pdfouput()
{
    $Name = "CloudSubFolderGifImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  ImageInput::CreateImageInput("Resources/Northwind Logo.gif");

    array_push($pdf->Inputs,$input);
    $input->Align = Align::Left;
    $input->VAlign = VAlign::Center;
    $input->PageWidth = 400;
    $input->PageHeight = 400;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples20.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples20.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathGifImageWithProperties_Pdfouput()
{
    $Name = "FilePathGifImageWithProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Northwind Logo.gif");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);
    $input->Align = Align::Left;
    $input->VAlign = VAlign::Center;
    $input->PageWidth = 400;
    $input->PageHeight = 400;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples21.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples21.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathJpegImage_Pdfoutput()
{
    $Name = "FilePathJpegImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Small.jpg");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples22.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples22.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function StreamJpegImage_Pdfoutput()
{
  /*  $Name = "StreamJpegImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "Small::jpg")));
    $resource = new ImageResource($memory);
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples23.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function BytesJpegImage_Pdfoutput()
{
    $Name = "BytesJpegImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Small.jpg");
    $input = new ImageInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples24.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples24.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudRootJpegImage_Pdfoutput()
{
   $Name = "CloudRootJpegImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = ImageInput::CreateImageInput("Small.jpg");

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples25.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples25.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function CloudSubFolderJpegImage_Pdfoutput()
{
    $Name = "CloudSubFolderJpegImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = ImageInput::CreateImageInput("Resources/Small.jpg");

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples26.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples26.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathJpegImageWithProperties_Pdfoutput()
{
    $Name = "FilePathJpegImageWithProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Small.jpg");
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);
    $input->ShrinkToFit = true;
    $input->PageWidth = 500;
    $input->PageHeight = 500;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples27.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples27.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathImageWithPropertiesAddedToTemplate_Pdfoutput()
{
    $Name = "ImageWithPropertiesAddedToTemplate";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."Northwind Logo.gif");
    $imageInput = new ImageInput($resource);
    array_push($pdf->Inputs,$imageInput);
    $imageInput->Align = Align::Left;
    $imageInput->VAlign = VAlign::Center;
    $imageInput->PageWidth = 400;
    $imageInput->PageHeight = 400;


    //create EvenAddTemplate with pagenumbering label
    $templateC = new Template("TemplateB");
    $pageNumberingElement2 = new PageNumberingElement("%%CP%% of %%TP%%",ElementPlacement::BottomLeft);
    array_push($templateC->Elements,$pageNumberingElement2);

    $imageInput->SetTemplate($templateC);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples28.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples28.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function FilePathTiffImage_AddImage_Pdfoutput()
{
    $Name = "FilePathTiffImage_AddImage";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new ImageResource($this->inputpath."CCITT_1.tif");
    $input = $pdf->AddImage($resource);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples29.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples29.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>