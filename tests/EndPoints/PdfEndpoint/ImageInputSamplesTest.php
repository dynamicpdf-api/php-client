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
    private $inputpath = KeyAndUrl::Inputpath;
    private $outputPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;


/** @test */
public function FilePathTiffImage_Pdfoutput()
{
    $Name = "FilePathTiffImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    $Name = "StreamTiffImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "CCITT_1.tif", "r");
    $resource = new ImageResource($file);
    fclose($file);

    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesTiffImage_Pdfoutput()
{
    $Name = "BytesTiffImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

   Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url; 
   $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new ImageInput("Small.jpg");
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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    $Name = "StreamMulitiTiffImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "PalaisDuLouvre.tif", "r");
    $resource = new ImageResource($file);
    fclose($file);
    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesMulitiTiffImage_Pdfoutput()
{
    $Name = "BytesMulitiTiffImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    $Name = "StreamPngImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "170x220_T.png", "r");
    $resource = new ImageResource($file);
    fclose($file);

    $input = new ImageInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesPngImage_Pdfoutput()
{
    $Name = "BytesPngImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new ImageInput("170x220_T.png");

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

   Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url; 
   $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new ImageInput("Resources/170x220_T.png");

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    $Name = "StreamGifImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "Northwind Logo.gif", "r");
    $resource = new ImageResource($file);
    fclose($file);

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

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesGifImage_Pdfouput()
{
    $Name = "BytesGifImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

   Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url; 
   $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new ImageInput("Northwind Logo.gif");

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new ImageInput("Resources/Northwind Logo.gif");

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    $Name = "StreamJpegImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "Small.jpg", "r");
    $resource = new ImageResource($file);
    fclose($file);

    $input = new ImageInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."ImageInputSamples23.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."ImageInputSamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function BytesJpegImage_Pdfoutput()
{
    $Name = "BytesJpegImage";

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

   Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url; 
   $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new ImageInput("Small.jpg");

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =new ImageInput("Resources/Small.jpg");

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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

    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

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