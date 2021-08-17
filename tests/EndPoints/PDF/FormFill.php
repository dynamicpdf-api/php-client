<?php

    require_once('../../../src/Pdf.php');
    require_once('../../../src/PdfResource.php');
    require_once('../../../src/PdfInput.php');
    require_once('../../../src/FormField.php');
    require_once('../../../src/PdfResponse.php');

    use PHPUnit\Framework\TestCase;

    class FormFill extends TestCase
    {
        static $resoursePath =  "./../../Resources/";
        static $outPutPath =  "./Output/";
        static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
        static $url = "https://localhost:44397/v1.0"; 
    
        static $Author= "test";
        static $Title ="test";

        /** @test */
        public function AcroFormFilling()
        {
            Pdf::$DefaultApiKey = FormFill::$key;
		    Pdf::$DefaultBaseUrl = FormFill::$url;

		    $pdf = new Pdf();
		    $pdf->Instructions->Author = FormFill::$Author;
		    $pdf->Instructions->Title = FormFill::$Title;

            $resource = new PdfResource(FormFill::$resoursePath."fw9AcroForm_14.pdf");
            $input = new PdfInput($resource);
            array_push($pdf->Inputs,$input);

            $field = new FormField("topmostSubform[0].Page1[0].f1_1[0]", "Any Company, Inc.");
            array_push($pdf->FormFields,$field);
            $field1 = new FormField("topmostSubform[0].Page1[0].f1_2[0]", "Any Company");
            array_push($pdf->FormFields,$field1);
            $field2 = new FormField("topmostSubform[0].Page1[0].FederalClassification[0].c1_1[0]", "1");
            array_push($pdf->FormFields,$field2);
            $field3 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_7[0]", "123 Main Street");
            array_push($pdf->FormFields,$field3);
            $field4 = new FormField("topmostSubform[0].Page1[0].Address[0].f1_8[0]", "Washington, DC  22222");
            array_push($pdf->FormFields,$field4);
            $field5 = new FormField("topmostSubform[0].Page1[0].f1_9[0]", "Any Requester");
            array_push($pdf->FormFields,$field5);
            $field6 = new FormField("topmostSubform[0].Page1[0].f1_10[0]", "17288825617");
            array_push($pdf->FormFields,$field6);
            $field7 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_14[0]", "52");
            array_push($pdf->FormFields,$field7);
            $field8 = new FormField("topmostSubform[0].Page1[0].EmployerID[0].f1_15[0]", "1234567");
            array_push($pdf->FormFields,$field8);

            $response = $pdf->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents(FormFill::$outPutPath."Output.pdf",$response->PdfContent);
            }
            
        }
    }
?>
