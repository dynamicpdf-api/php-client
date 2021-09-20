<?php


require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/FormField.php');
require_once(__DIR__.'/../KeyAndUrl.php');  



use PHPUnit\Framework\TestCase;

class FormFillingSamplesTest extends TestCase
 {
    private $inputpath = KeyAndUrl::Inputpath;
    private $outPutPath = KeyAndUrl::OutPutPath;
    private $key=KeyAndUrl::Key;
    private $url = KeyAndUrl::Url; 
    private $Author= KeyAndUrl::Author;
    private $Title =KeyAndUrl::Title;


/** @test */
public function PdfInputFilePath_PdfOutput()
{
    $Name = "PdfInputFilePath";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples1.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples1.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputStream_PdfOutput()
{
    $Name = "PdfInputStream";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $file = fopen($this->inputpath. "fw9AcroForm_14.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);
    
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples2.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples2.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputBytes_PdfOutput()
{
    $Name = "PdfInputBytes";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."fw9AcroForm_14.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples3.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples3.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputCloudRoot_FormFill_PdfOutput()
{
    $Name = "PdfInputCloudRoot";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples4.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples4.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputCloudSubFolder_PdfOutput()
{
    $Name = "PdfInputCloudSubFolder";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("Resources/fw9AcroForm_14.pdf");
    array_push($pdf->Inputs,$input);

    $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]","Any Company, Inc.");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]","Any Company");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]","1");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]","123 Main Street");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]","Washington, DC  22222");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]","Any Requester");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]","17288825617");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]","52");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]","1234567");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples5.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples5.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_TextBox_PdfOutput()
{
    $Name = "TextBox";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("txtfname","My Text");
    array_push($pdf->FormFields,$field);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples6.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples6.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_ComboBox_PdfOutput()
{
    $Name = "ComboBox";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("cmbname","Item3");
    array_push($pdf->FormFields,$field);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples7.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples7.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_ListBox_PdfOutput()
{
    $Name = "ListBox";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("lbname","Item 4");
    array_push($pdf->FormFields,$field);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples8.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples8.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_RadioButton_PdfOutput()
{
    $Name = "RadioButton";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("rbname","Radio2");
    array_push($pdf->FormFields,$field);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples9.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples9.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_CheckBox_PdfOutput()
{
    $Name = "CheckBox";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."AllPageElements.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("cbxname","Yes");
    array_push($pdf->FormFields,$field);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples10.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples10.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputFilePath_XfaFormFill_Pdfoutput()
{
    $Name = "Xfa";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource($this->inputpath."All Fields Sample.pdf");
    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("form1[0].#subform[0].TextField1[0]","text");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples11.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples11.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputStream_Xfa_Pdfoutput()
{
    $Name = "XfaStream";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;
    
    
    $file = fopen($this->inputpath. "All Fields Sample.pdf", "r");
    $resource = new PdfResource($file);
    fclose($file);

    $input = new PdfInput($resource);
    array_push($pdf->Inputs,$input);

    $field = new FormField("form1[0].#subform[0].TextField1[0]","text");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples12.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples12.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputBytes_Xfa_Pdfoutput()
{
    $Name = "XfaBytes";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $resource = new PdfResource(($this->inputpath."All Fields Sample.pdf"));
    $input = new PdfInput($resource);

    array_push($pdf->Inputs,$input);
    $field = new FormField("form1[0].#subform[0].TextField1[0]","text");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples13.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples13.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


/** @test */
public function PdfInputCloudRoot_Xfa_Pdfoutput()
{
    $Name = "XfaCloudRoot";
    
    Pdf::$DefaultApiKey = $this->key;
    Pdf::$DefaultBaseUrl = $this->url;
    $pdf = new Pdf();
    

    $pdf->Author = $this->Author;
    $pdf->Title = $this->Title;

    $input = new PdfInput("All Fields Sample.pdf");

    array_push($pdf->Inputs,$input);
    $field = new FormField("form1[0].#subform[0].TextField1[0]","text");
    array_push($pdf->FormFields,$field);
    $field1 = new FormField("form1[0].#subform[0].DateField1[0]","07/03/0217");
    array_push($pdf->FormFields,$field1);
    $field2 = new FormField("form1[0].#subform[0].NumericField1[0]","2594");
    array_push($pdf->FormFields,$field2);
    $field3 = new FormField("form1[0].#subform[0].DecimalField1[0]","25.94");
    array_push($pdf->FormFields,$field3);
    $field4 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[0]","1");
    array_push($pdf->FormFields,$field4);
    $field5 = new FormField("form1[0].#subform[0].Subform1[0].CheckBox1[2]","1");
    array_push($pdf->FormFields,$field5);
    $field6 = new FormField("form1[0].#subform[0].Subform1[1].RadioButtonList[1]","1");
    array_push($pdf->FormFields,$field6);
    $field7 = new FormField("form1[0].#subform[0].ListBox1[0]","Full Time");
    array_push($pdf->FormFields,$field7);
    $field8 = new FormField("form1[0].#subform[0].DropDownList1[0]","Third");
    array_push($pdf->FormFields,$field8);

    $response = $pdf->Process();



    if($response->IsSuccessful)
    {
    file_put_contents($this->outPutPath."FormFillingSamples14.pdf",$response->Content);
    }
    if(isset($pdf->jsonData))
    file_put_contents($this->outPutPath."FormFillingSamples14.json",$pdf->jsonData);

    $this->assertEquals($response->IsSuccessful,true);

}


}

?>