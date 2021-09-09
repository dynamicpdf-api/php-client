<?php

require_once(__DIR__.'/../../../src/Pdf.php');
require_once(__DIR__.'/../../../src/PdfResource.php');
require_once(__DIR__.'/../../../src/PdfInput.php');
require_once(__DIR__.'/../../../src/PageInput.php');

require_once(__DIR__.'/../../../src/Font.php');
require_once(__DIR__.'/../../../src/Elements/ElementPlacement.php');
require_once(__DIR__.'/../../../src/ImageResource.php');
require_once(__DIR__.'/../../../src/Elements/ImageElement.php');
require_once(__DIR__.'/../../../src/RgbColor.php');
require_once(__DIR__.'/../../../src/ImageInput.php');
require_once(__DIR__.'/../../../src/Template.php');
require_once(__DIR__.'/../../../src/Elements/TextElement.php');
require_once(__DIR__.'/../../../src/DlexResource.php');
require_once(__DIR__.'/../../../src/LayoutDataResource.php');
  
require_once(__DIR__.'/../../../src/DlexInput.php');
require_once(__DIR__.'/../../../src/PageInput.php');

require_once(__DIR__.'/../../../src/Aes128Security.php');
require_once(__DIR__.'/../../../src/Elements/RectangleElement.php');
require_once(__DIR__.'/../../../src/Elements/LineElement.php');
require_once(__DIR__.'/../../../src/LineStyle.php');
require_once(__DIR__.'/../../../src/Elements/PageNumberingElement.php');
require_once(__DIR__.'/../../../src/Elements/Code128BarcodeElement.php');
require_once(__DIR__.'/../../../src/Outline.php');
require_once(__DIR__.'/../../../src/Elements/AztecBarcodeElement.php');
require_once(__DIR__.'/../../../src/MergeOptions.php');
require_once(__DIR__.'/../../../src/OutlineStyle.php');
require_once(__DIR__.'/../../../src/Elements/Code39BarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/Code25BarcodeElement.php');
         
require_once(__DIR__.'/../../../src/Elements/Code93BarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/Code11BarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/Gs1DataBarBarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/StackedGs1DataBarBarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/Iata25BarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/MsiBarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/Pdf417BarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/DataMatrixBarcodeElement.php');
require_once(__DIR__.'/../../../src/Elements/QrCodeElement.php');
require_once(__DIR__.'/../../../src/GoToAction.php');
require_once(__DIR__.'/../../../src/PageZoom.php');
require_once(__DIR__.'/../../../src/Elements/StackedGs1DataBarType.php');
require_once(__DIR__.'/../../../src/Elements/Gs1DataBarType.php');
require_once(__DIR__.'/../../../src/Elements/DataMatrixSymbolSize.php');  
require_once(__DIR__.'/../../../src/Elements/DataMatrixEncodingType.php');
require_once(__DIR__.'/../../../src/Elements/DataMatrixFunctionCharacter.php');
          
use PHPUnit\Framework\TestCase;

    class ComplexSamplesTest   extends TestCase
    {
        private $inputpath =  __DIR__."./../../Resources/";
        private $outputPath =  __DIR__."./../Output/";
        private $key="DP.04XCRJfZOpktQAEOlT7o4LmzhsvGDcQcpnpSKI6bwB/ZRZtuMDV42WyS";
        private $url = "https://localhost:44397/v1.0"; 
        private $Author= "test";
        private $Title ="test";

      
        /** @test */
        public function PdfInputPageInput_PageAndPdf_PdfOutput()
        {
            $Name = "PageAndPdf";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("First Page", ElementPlacement::TopLeft);

            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);

            $resource = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource);
            array_push($pdf->Inputs,$pdfInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples1.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PageInput_SamePageInput_PdfOutput()
        {
            $Name = "SamePageInput";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("Hello World", ElementPlacement::TopLeft);

            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);
            array_push($pdf->Inputs,$pageInput);
            array_push($pdf->Inputs,$pageInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples2.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PageInput_PageInputWithSameFont_PdfOutput()
        {
            $Name = "PageInputWithSameFont";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("Hello World", ElementPlacement::TopLeft);
            $font = Font::FromFile($this->inputpath. "verdanab.ttf");
            $element->Font($font);
            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);

            $pageInput1 = new PageInput();
            $element1 = new TextElement("Hello World", ElementPlacement::TopLeft);
            $font1 = Font::FromFile($this->inputpath. "verdanab.ttf");
            $element1->Font($font1);
            array_push($pageInput1->Elements,$element1);
            array_push($pdf->Inputs,$pageInput1);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples3.pdf", $response->Content);
            }
            else{
                echo ($response->ErrorMessage);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PageInput_SamePageInputWithImage_PdfOutput()
        {
            $Name = "SamePageInputWithImage";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $imageResource = new ImageResource($this->inputpath. "Image1.jpg");
            $imageElement = new ImageElement($imageResource, ElementPlacement::TopLeft);

            array_push($pageInput->Elements,$imageElement);
            array_push($pdf->Inputs,$pageInput);
            array_push($pdf->Inputs,$pageInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples4.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PdfInput_MergeSamePdfInput_PdfOutput()
        {
            $Name = "MergeSamePdfInput";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource);
            array_push($pdf->Inputs,$pdfInput);
            array_push($pdf->Inputs,$pdfInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples5.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }


        /** @test */
        public function PdfInputPageInput_MergeSamePdfAndAppendPage_PdfOutput()
        {
            $Name = "MergeSamePdfAndAppendPage";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("First Page", ElementPlacement::TopLeft);
            $element->Color = RgbColor::Red();
            $element->Font(Font::CourierBold());
            $element->FontSize = 20;
            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);

            $resource = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource);
            array_push($pdf->Inputs,$pdfInput);

            $resource1 = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput1 = new PdfInput($resource1);
            array_push($pdf->Inputs,$pdfInput1);

            $pdfInput2 = new PdfInput("DocumentA100.pdf");
            array_push($pdf->Inputs,$pdfInput2);

            $pageInput1 = new PageInput();
            $element1 = new TextElement("Last Page", ElementPlacement::TopLeft);
            $element1->Color = RgbColor::Blue();
            $element1->Font(Font::TimesItalic());
            $element1->FontSize = 20;
            array_push($pageInput1->Elements,$element1);
            array_push($pdf->Inputs,$pageInput1);


            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples6.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ImageInput_AddSameImageInput_PdfOutput()
        {
            $Name = "AddSameImageInput";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath. "Image1.jpg");
            $imageInput = new ImageInput($resource);
            array_push($pdf->Inputs,$imageInput);

            array_push($pdf->Inputs,$imageInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples7.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function ImageInputPageInputPdfInput_AddSameImages_PdfOutput()
        {
            $Name = "AddSameImages";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("Add Same Image Resource", ElementPlacement::TopLeft);
            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);

            $resource = new ImageResource($this->inputpath. "Image1.jpg");
            $imageInput = new ImageInput($resource);
            array_push($pdf->Inputs,$imageInput);

            $resource1 = new ImageResource($this->inputpath. "Image1.jpg");
            $imageInput1 = new ImageInput($resource1);
            $imageInput1->TopMargin = 50;
            $imageInput1->BottomMargin = 50;
            $imageInput1->LeftMargin = 50;
            $imageInput1->RightMargin = 50;
            array_push($pdf->Inputs,$imageInput1);

            $resource2 = new ImageResource($this->inputpath. "170x220_T.png");
            $imageInput2 = new ImageInput($resource2);
            array_push($pdf->Inputs,$imageInput2);

            $imageInput3 = new ImageInput("Image1.jpg");
            array_push($pdf->Inputs,$imageInput3);

            $resource3 = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource3);
            $imageElement = new ImageElement($resource1, ElementPlacement::TopLeft);
            $imageElement->XOffset = 25;
            $imageElement->YOffset = 25;
            $template = new Template("Temp1");
            array_push($template->Elements,$imageElement);
            $pdfInput->SetTemplate( $template);
            array_push($pdf->Inputs,$pdfInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples8.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function DlexInputPageInput_AddSameDlexInput_PdfOutput()
        {
            $Name = "AddSameDlexInput";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $img = new ImageResource($this->inputpath. "Northwind Logo.gif", "northwind logo.gif");
            array_push($pdf->Resources,$img);

            $dlex = new DlexResource($this->inputpath. "SimpleReportWithCoverPage.dlex");
            $layoutData = new LayoutDataResource($this->inputpath. "SimpleReportData.json");
            $input = new DlexInput($dlex, $layoutData);
            array_push($pdf->Inputs,$input);

            array_push($pdf->Inputs,$input);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples9.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }


        /** @test */
        public function DlexInputPageInput_AddSameDlex_PdfOutput()
        {
            $Name = "AddSameDlex";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $element = new TextElement("Hello World", ElementPlacement::TopLeft);
            $element->FontSize = 20;
            array_push($pageInput->Elements,$element);
            array_push($pdf->Inputs,$pageInput);

            $img = new ImageResource($this->inputpath. "Northwind Logo.gif", "northwind logo.gif");
            array_push($pdf->Resources,$img);

            $dlex = new DlexResource($this->inputpath. "SimpleReportWithCoverPage.dlex");
            $layoutData = new LayoutDataResource($this->inputpath. "SimpleReportData.json");
            $input = new DlexInput($dlex, $layoutData);
            array_push($pdf->Inputs,$input);

            $dlex1 = new DlexResource($this->inputpath. "SimpleReportWithCoverPage.dlex");
            $layoutData1 = new LayoutDataResource($this->inputpath. "SimpleReportData.json");
            $input1 = new DlexInput($dlex1, $layoutData1);
            array_push($pdf->Inputs,$input1);

            $input2 = new DlexInput("SimpleReportWithCoverPage.dlex", "SimpleReportData.json");
            array_push($pdf->Inputs,$input2);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples10.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

      

        /** @test */
        public function PdfInputPageInput_ElemetsWithSecurity_PdfOutput()
        {
            $Name = "ElemetsWithSecurity";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $aes128Security = new Aes128Security("", "owner");
            $aes128Security->AllowPrint = false;
            $pdf->Security = $aes128Security;

            $pageInput = new PageInput();
            $rectangleElement = new RectangleElement(ElementPlacement::TopLeft, 100, 100);
            $rectangleElement->BorderColor = RgbColor::Red();
            $rectangleElement->FillColor = RgbColor::Green();
            $rectangleElement->BorderWidth = 3;
            array_push($pageInput->Elements,$rectangleElement);

            $textElement = new TextElement("Rectangle Element", ElementPlacement::TopCenter);
            array_push($pageInput->Elements,$textElement);
            array_push($pdf->Inputs,$pageInput);

            $resource = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource);
            $template = new Template("Temp1");

            $lineElement = new LineElement(ElementPlacement::TopLeft, 600, 50);
            $lineElement->Color = RgbColor::Blue();
            $lineElement->XOffset = 10;
            $lineElement->YOffset = 50;
            $lineElement->Width = 2;
            $lineElement->LineStyle = LineStyle::Dots();
            array_push($template->Elements,$lineElement);
            $pdfInput->SetTemplate( $template);
            array_push($pdf->Inputs,$pdfInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples11.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        

        /** @test */
        public function PageInputImageInput_DifferentElemnts_PdfOutput()
        {
            $Name = "DifferentElemnts";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $textElement = new TextElement("Hello World", ElementPlacement::TopLeft);
            $textElement->FontSize = 40;
            array_push($pageInput->Elements,$textElement);

            $pageNumbering = new PageNumberingElement("%%CP%% of %%TP%%", ElementPlacement::TopCenter);
            $pageNumbering->YOffset = -20;
            array_push($pageInput->Elements,$pageNumbering);

            $rectangleElement = new RectangleElement(ElementPlacement::TopLeft, 200, 150);
            $rectangleElement->YOffset = 100;
            array_push($pageInput->Elements,$rectangleElement);

            $lineElement = new LineElement(ElementPlacement::TopLeft, 400, 400);
            $lineElement->YOffset = 400;
            $lineElement->Color = RgbColor::Red();
            array_push($pageInput->Elements,$lineElement);

            $font = Font::FromFile($this->inputpath. "Calibri.otf");
            $code128BarcodeElement = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::BottomLeft, 50);
            $code128BarcodeElement->Font($font);
            array_push($pageInput->Elements,$code128BarcodeElement);

            $aztecBarcodeElement = new AztecBarcodeElement("Hello World", ElementPlacement::BottomRight);
            $aztecBarcodeElement->Color = RgbColor::Blue();
            array_push($pageInput->Elements,$aztecBarcodeElement);
            array_push($pdf->Inputs,$pageInput);

            $pageInput1 = new PageInput();
            $imageResource = new ImageResource($this->inputpath. "Image1.jpg");
            $imageElement = new ImageElement($imageResource, ElementPlacement::TopLeft);
            $imageElement->ScaleX = 0.5;
            $imageElement->ScaleY = 0.5;
            array_push($pageInput1->Elements,$imageElement);
            array_push($pageInput1->Elements,$pageNumbering);
            array_push($pdf->Inputs,$pageInput1);

            $template = new Template("TempA");
            array_push($template->Elements,$pageNumbering);

            $imageInput = new ImageInput($imageResource);
            $imageInput->TopMargin = 50;
            $imageInput->SetTemplate( $template);
            array_push($pdf->Inputs,$imageInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples12.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

       

        /** @test */
        public function Inputs_DifferentInputs_PdfOutput()
        {
            $Name = "DifferentInputs";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pdfInput = new PdfInput("DocumentA100.pdf");
            $mergeOptions = new MergeOptions();
            $pdfInput->MergeOptions = $mergeOptions;
            array_push($pdf->Inputs,$pdfInput);

            $pageInput = new PageInput();
            $textElement = new TextElement("Hello World", ElementPlacement::TopLeft);
            $textElement->FontSize = 40;
            array_push($pageInput->Elements,$textElement);
            array_push($pdf->Inputs,$pageInput);

            $img = new ImageResource($this->inputpath. "Northwind Logo.gif", "northwind logo.gif");
            array_push($pdf->Resources,$img);
            $dlexInput = new DlexInput("SimpleReportWithCoverPage.dlex", "SimpleReportData.json");
            array_push($pdf->Inputs,$dlexInput);

            $imageInput = new ImageInput("Image1.jpg");
            $imageInput->TopMargin = 10;
            $imageInput->LeftMargin = 10;
            $imageInput->RightMargin = 10;
            $imageInput->BottomMargin = 10;
            array_push($pdf->Inputs,$imageInput);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples13.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function PageInputs_DifferentBarcode_PdfOutput()
        {
            $Name = "DifferentBarcode";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $textElement = new TextElement("1D Barcodes", ElementPlacement::TopCenter, 0, -20);
            array_push($pageInput->Elements,$textElement);

            $element1 = new TextElement("Code128Barcode", ElementPlacement::TopLeft, 0, 20);
            array_push($pageInput->Elements,$element1);
            $code128BarcodeElement = new Code128BarcodeElement("Code 128 Barcode.", ElementPlacement::TopLeft, 50);
            $code128BarcodeElement->YOffset = 50;
            array_push($pageInput->Elements,$code128BarcodeElement);

            $element2 = new TextElement("Code39Barcode", ElementPlacement::TopRight, 0, 20);
            array_push($pageInput->Elements,$element2);
            $code39BarcodeElement = new Code39BarcodeElement("CODE 39", ElementPlacement::TopRight, 50);
            $code39BarcodeElement->YOffset = 50;
            array_push($pageInput->Elements,$code39BarcodeElement);

            $element3 = new TextElement("Code25Barcode", ElementPlacement::TopLeft, 0, 220);
            array_push($pageInput->Elements,$element3);
            $code25BarcodeElement = new Code25BarcodeElement("1234567890", ElementPlacement::TopLeft, 50);
            $code25BarcodeElement->YOffset = 250;
            array_push($pageInput->Elements,$code25BarcodeElement);

            $element4 = new TextElement("Code93Barcode", ElementPlacement::TopCenter, 0, 220);
            array_push($pageInput->Elements,$element4);
            $code93BarcodeElement = new Code93BarcodeElement("CODE 93", ElementPlacement::TopCenter, 50);
            $code93BarcodeElement->YOffset = 250;
            array_push($pageInput->Elements,$code93BarcodeElement);

          

            $element5 = new TextElement("Code11Barcode", ElementPlacement::TopRight, 0, 220);
            array_push($pageInput->Elements,$element5);
            $code11BarcodeElement = new Code11BarcodeElement("12345678", ElementPlacement::TopRight, 50);
            $code11BarcodeElement->YOffset = 250;
            array_push($pageInput->Elements,$code11BarcodeElement);

            $element6 = new TextElement("Gs1DataBarBarcode", ElementPlacement::TopLeft, 0, 420);
            array_push($pageInput->Elements,$element6);
            $gs1DataBarBarcodeElement = new Gs1DataBarBarcodeElement("12345678", ElementPlacement::TopLeft, 50, Gs1DataBarType::Omnidirectional);
            $gs1DataBarBarcodeElement->YOffset = 450;
            array_push($pageInput->Elements,$gs1DataBarBarcodeElement);

            $element7 = new TextElement("StackedGs1DataBarBarcode", ElementPlacement::TopCenter, 0, 420);
            array_push($pageInput->Elements,$element7);
            $stackedGs1DataBarBarcodeElement = new StackedGs1DataBarBarcodeElement("12345678", ElementPlacement::TopCenter, StackedGs1DataBarType::Stacked, 25);
            $stackedGs1DataBarBarcodeElement->YOffset = 450;
            array_push($pageInput->Elements,$stackedGs1DataBarBarcodeElement);

            $element8 = new TextElement("Iata25Barcode", ElementPlacement::TopRight, 0, 420);
            array_push($pageInput->Elements,$element8);
            $iata25BarcodeElement = new Iata25BarcodeElement("12345678", ElementPlacement::TopRight, 50);
            $iata25BarcodeElement->YOffset = 450;
            array_push($pageInput->Elements,$iata25BarcodeElement);

            $element9 = new TextElement("MsiBarcode", ElementPlacement::TopCenter, 0, 620);
            array_push($pageInput->Elements,$element9);
            $msiBarcodeElement = new MsiBarcodeElement("1234567890", ElementPlacement::TopCenter, 50);
            $msiBarcodeElement->YOffset = 650;
            array_push($pageInput->Elements,$msiBarcodeElement);

            array_push($pdf->Inputs,$pageInput);

            $pageInput1 = new PageInput();
            $textElement1 = new TextElement("2D Barcodes", ElementPlacement::TopCenter, 0, -20);
            array_push($pageInput1->Elements,$textElement1);

            $element10 = new TextElement("AztecBarcode", ElementPlacement::TopLeft, 0, 20);
            array_push($pageInput1->Elements,$element10);
            $aztecBarcodeElement = new AztecBarcodeElement("Hello World", ElementPlacement::TopLeft);
            $aztecBarcodeElement->YOffset = 50;
            array_push($pageInput1->Elements,$aztecBarcodeElement);

            $element11 = new TextElement("DataMatrixBarcode", ElementPlacement::TopRight, 0, 20);
            array_push($pageInput1->Elements,$element11);
            $dataMatrixBarcodeElement = new DataMatrixBarcodeElement("Hello World", ElementPlacement::TopRight);
            $dataMatrixBarcodeElement->YOffset = 50;
            array_push($pageInput1->Elements,$dataMatrixBarcodeElement);

            $element12 = new TextElement("Pdf417Barcode", ElementPlacement::TopLeft, 0, 170);
            array_push($pageInput1->Elements,$element12);
            $pdf417BarcodeElement = new Pdf417BarcodeElement("Hello World", ElementPlacement::TopLeft, 3);
            $pdf417BarcodeElement->YOffset = 200;
            array_push($pageInput1->Elements,$pdf417BarcodeElement);

            $element13 = new TextElement("QrCode", ElementPlacement::TopRight, 0, 170);
            array_push($pageInput1->Elements,$element13);
            $qrCodeElement = new QrCodeElement("Hello World", ElementPlacement::TopRight);
            $qrCodeElement->YOffset = 200;
            array_push($pageInput1->Elements,$qrCodeElement);

            array_push($pdf->Inputs,$pageInput1);

            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples14.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
        
        /** @test */
        public function PdfInputPageInput_ElementsWithOutlines_PdfOutput()
        {
            $Name = "ElementsWithOutlines";

            $pdf = new Pdf();
            $pdf->Author = $this->Author;
            $pdf->Title = $this->Title;
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $pageInput = new PageInput();
            $pageInput->Id = "page1";
            $textElement = new TextElement("Page Input With Eelements", ElementPlacement::TopLeft);
            $textElement->Font(Font::FromFile($this->inputpath. "verdanab.ttf"));
            $textElement->FontSize = 20;
            $textElement->Color = new RgbColor(1, 0, 0);
            array_push($pageInput->Elements,$textElement);

            $lineElement = new LineElement(ElementPlacement::TopLeft, 400, 50);
            $lineElement->YOffset = 50;
            $lineElement->Color = RgbColor::Yellow();
            array_push($pageInput->Elements,$lineElement);

            $template = new Template("TemplatePage");
            $pageNumberingElement = new PageNumberingElement("%%CP%% of %%TP%%", ElementPlacement::TopRight);
            $pageNumberingElement->Font(Font::Courier());
            array_push($template->Elements,$pageNumberingElement);
            $pageInput->SetTemplate( $template);

            $outline = $pdf->Outlines->Add("Outline Page Input");
            $outline->Color = RgbColor::Red();
            $outline->Style = OutlineStyle::Bold;
            $outline->Expanded = true;

            $linkTo = new GoToAction($pageInput);
            $linkTo->PageZoom = PageZoom::FitPage;

            $outline->Action = $linkTo;

            
            array_push($pdf->Inputs,$pageInput);

            $resource = new PdfResource($this->inputpath. "DocumentA100.pdf");
            $pdfInput = new PdfInput($resource);
            $pdfInput->Id = "pdf1";
            $pdfInput->SetTemplate( $template);

            $outline1 = $pdf->Outlines->Add("Outline Pdf Input");
            $outline1->Style = OutlineStyle::Italic;

            $linkTo1 = new GoToAction($pdfInput);
            $linkTo1->PageZoom = PageZoom::FitHeight;

            $outline1->Action = $linkTo1;
           
            array_push($pdf->Inputs,$pdfInput);

            $img = new ImageResource($this->inputpath. "Northwind Logo.gif", "northwind logo.gif");
            array_push($pdf->Resources,$img);
            $dlex = new DlexResource($this->inputpath. "SimpleReportWithCoverPage.dlex");
            $layoutData = new LayoutDataResource($this->inputpath. "SimpleReportData.json");
            $dlexInput = new DlexInput($dlex, $layoutData);
            $dlexInput->Id = "dlex1";

            $outline2 = $pdf->Outlines->Add("Outline Dlex Input");
            $outline2->Style = OutlineStyle::Regular;
            $outline2->Color = RgbColor::Green();

            $linkTo2 = new GoToAction($dlexInput);
            $linkTo2->PageZoom = PageZoom::FitHeight;

            $outline2->Action = $linkTo2;
           
            array_push($pdf->Inputs,$dlexInput);

            $imageResource = new ImageResource($this->inputpath. "Image1.jpg");
            $imageInput = new ImageInput($imageResource);
            $imageInput->TopMargin = 50;
            $imageInput->LeftMargin = 50;
            $imageInput->RightMargin = 50;
            $imageInput->BottomMargin = 50;
            $imageInput->Id = "img1";

            $outline3 = $pdf->Outlines->Add("Outline Image Input");
            $outline3->Style = OutlineStyle::Regular;
            $outline3->Color = RgbColor::Blue();

            $linkTo3 = new GoToAction($imageInput);
            $linkTo3->PageZoom = PageZoom::FitHeight;

            $outline3->Action = $linkTo3;
          
            array_push($pdf->Inputs,$imageInput);


            $response = $pdf->Process();


            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath . "ComplexSamples15.pdf", $response->Content);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
