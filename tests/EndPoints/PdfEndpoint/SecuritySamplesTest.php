<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/Aes256Security.php');


require_once(__DIR__.'/../../../src/PageInput.php');
require_once(__DIR__.'/../../../src/EncryptDocumentComponents.php');
require_once(__DIR__.'/../../../src/Aes128Security.php');
require_once(__DIR__.'/../../../src/RC4128Security.php');


use PHPUnit\Framework\TestCase;

class SecuritySamplesTest extends TestCase
 {
    private $inputpath =  __DIR__."./../../Resources/";
    private $outPutPath =  __DIR__."./../Output/";
    private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
    private $url = "https://localhost:44397/v1.0"; 
    private $Author= "test";
    private $Title ="test";


/** @test */
public function PdfInputFilePathAes256Security_PdfOutput()
{
    $Name = "PdfInputFilePathAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputBytesAes256Security_PdfOutput()
{
   /* $Name = "PdfInputBytesAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputStream_Aes256Security_PdfOutput()
{
   /* $Name = "PdfInputStreamAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputCloudRoot_Aes256Security_PdfOutput()
{
    $Name = "PdfInputCloudRootAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input =  PdfInput::CreatePdfInput("XmpAndOtherSample.pdf");
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputSubFolder_Aes256Security_PdfOutput()
{
    $Name = "PdfInputCloudSubFolderAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = PdfInput::CreatePdfInput("Resources/XmpAndOtherSample.pdf");
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_Aes256Security_PdfOutput()
{
    $Name = "PageInputAes256Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("user","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInpuAes256SecurityOwnerPassword_PdfOutput()
{
    $Name = "PdfInputAes256SecurityOwnerPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $security = new Aes256Security("","owner");
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputAes256SecurityAllowFormFillingAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputAes256SecurityFormFilling";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("user","owner");
    $security->AllowFormFilling = false;
    $security->AllowUpdateAnnotsAndFields = false;
    $security->AllowEdit = false;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputAes256SecurityAllowPrintAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputAes256SecurityAllowPrint";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("user","owner");
    $security->AllowHighResolutionPrinting = true;
    $security->AllowPrint = true;
    $security->AllowCopy = true;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_Aes256SecurityOwnerUserPassword_PdfOutput()
{
    $Name = "PdfInputAes256SecurityOwnerUserPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("","");
    $security->AllowAccessibility = true;
    $security->AllowDocumentAssembly = false;
    $security->AllowEdit = false;
    $security->OwnerPassword = "owner";
    $security->UserPassword = "user";
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInput_Aes256SecurityDocumentComponentsAll_PdfOutput()
{
    $Name = "PdfInputAes256SecurityDocumentComponentsAll";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("user","owner");
    $security->DocumentComponents = EncryptDocumentComponents::All;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes256SecurityDocumentComponentsAllExceptMetadata_PdfOutput()
{
    $Name = "PdfInputAes256SecurityDocumentComponentsAllExceptMetadata";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("user","owner");
    $security->DocumentComponents = EncryptDocumentComponents::AllExceptMetadata;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes256SecurityWithoutPassword_PdfOutput()
{
    $Name = "PdfInputAes256SecurityWithoutPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes256Security("","");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128Security_PdfOutput()
{
    $Name = "PdfInputFilePathAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingBytes_Aes128Security_PdfOutput()
{
 /*   $Name = "PdfInputBytesPathAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $pdf->Security = $security;

    $resource = new PdfResource(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples15.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples15.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputUsingStream_Aes128Security_PdfOutput()
{
  /*  $Name = "PdfInputStreamPathAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $pdf->Security = $security;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples16.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples16.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputUsingCloudRoot_Aes128Security_PdfOutput()
{
    $Name = "PdfInputCloudRootPathAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $pdf->Security = $security;

    $input = PdfInput::CreatePdfInput("XmpAndOtherSample.pdf");
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples17.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples17.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudSubFolder_Aes128Security_PdfOutput()
{
    $Name = "PdfInputCloudSubFolderPathAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");

    $input = PdfInput::CreatePdfInput("Resources/XmpAndOtherSample.pdf");

    array_push($pdf->Inputs,$input);
    $pdf->Security = $security;

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples18.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples18.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_Aes128Security_PdfOutput()
{
    $Name = "PageInputAes128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $pdf->Security = $security;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples19.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples19.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityOwnerPassword_PdfOutput()
{
    $Name = "PdfInputAes128SecurityOwnerPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("","owner");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples20.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples20.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityAllowFormFillingAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputAes128SecurityAllowFormFillingAndOtherProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $security->AllowFormFilling = false;
    $security->AllowUpdateAnnotsAndFields = false;
    $security->AllowEdit = false;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples21.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples21.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityAllowPrintAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputAes128SecurityAllowFormFillingAndOtherProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $security->AllowHighResolutionPrinting = true;
    $security->AllowPrint = true;
    $security->AllowCopy = true;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples22.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples22.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityUserOwnerPassword_PdfOutput()
{
    $Name = "PdfInputAes128SecurityUserOwnerPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("","");
    $security->AllowAccessibility = true;
    $security->AllowDocumentAssembly = false;
    $security->AllowEdit = false;
    $security->OwnerPassword = "owner";
    $security->UserPassword = "user";
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples23.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples23.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityDocumentComponentsAll_PdfOutput()
{
    $Name = "PdfInputAes128SecurityDocumentComponentsAll";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $security->DocumentComponents = EncryptDocumentComponents::All;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples24.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples24.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityDocumentComponentsAllExceptMetadata_PdfOutput()
{
    $Name = "PdfInputAes128SecurityDocumentComponentsAllExceptMetadata";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("user","owner");
    $security->DocumentComponents = EncryptDocumentComponents::AllExceptMetadata;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples25.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples25.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_Aes128SecurityWithoutPassword_PdfOutput()
{
    $Name = "PdfInputAes128SecurityWithoutPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new Aes128Security("","");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples26.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples26.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128Security_PdfOutput()
{
    $Name = "PdfInputRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples27.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples27.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingBytes_RC4128Security_PdfOutput()
{
  /*  $Name = "PdfInputBytesRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $resource = new PdfResource(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples28.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples28.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputUsingStream_RC4128Security_PdfOutput()
{
    /*$Name = "PdfInputStreamRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $memory = new MemoryStream(File::ReadAllBytes((inputpath + "XmpAndOtherSample::pdf")));
    $resource = new PdfResource($memory);
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples29.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples29.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);*/

}


/** @test */
public function PdfInputUsingCloudRoot_RC4128Security_PdfOutput()
{
    $Name = "PdfInputCloudRootRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $input = PdfInput::CreatePdfInput("XmpAndOtherSample.pdf");
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples30.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples30.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingCloudSubFolder_RC4128Security_PdfOutput()
{
    $Name = "PdfInputCloudSubFolderRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $input = PdfInput::CreatePdfInput("Resources/XmpAndOtherSample.pdf");
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples31.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples31.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PageInput_RC4128Security_PdfOutput()
{
    $Name = "PageInputRC4128Security";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $pdf->Security = $security;

    $input = new PageInput();
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples32.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples32.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityOwnerPassword_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityOwnerPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("","owner");
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples33.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples33.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityAllowFormFillingAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityAllowFormFillingAndOtherProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $security->AllowFormFilling = false;
    $security->AllowUpdateAnnotsAndFields = false;
    $security->AllowEdit = false;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples34.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples34.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityAllowPrintAndOtherProperties_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityAllowPrintAndOtherProperties";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $security->AllowHighResolutionPrinting = true;
    $security->AllowPrint = true;
    $security->AllowCopy = true;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples35.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples35.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityOwnerUserPassword_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityOwnerUserPassword";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("","");
    $security->AllowAccessibility = true;
    $security->AllowDocumentAssembly = false;
    $security->AllowEdit = false;
    $security->OwnerPassword = "owner";
    $security->UserPassword = "user";
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);


    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples36.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples36.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityEncryptMetadata_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityEncryptMetadata";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $security->EncryptMetadata = true;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples37.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples37.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputUsingFilePath_RC4128SecurityEncryptExceptMetadata_PdfOutput()
{
    $Name = "PdfInputRC4128SecurityEncryptExceptMetadata";
    $pdf = new Pdf();
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $security = new RC4128Security("user","owner");
    $security->EncryptMetadata = false;
    $pdf->Security = $security;

    $resource = new PdfResource($this->inputpath."XmpAndOtherSample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."SecuritySamples38.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."SecuritySamples38.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>