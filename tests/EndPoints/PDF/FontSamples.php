<?php

require_once('../../../src/Pdf.php');
require_once('../../../src/PageInput.php');
require_once('../../../src/TextElement.php');
require_once('../../../src/ElementPlacement.php');
require_once('../../../src/PdfResponse.php');
require_once('../../../src/Font.php');
require_once('../../../src/PdfResource.php');
require_once('../../../src/PdfInput.php');
require_once('../../../src/Template.php');


use PHPUnit\Framework\TestCase;

 class FontSamples extends TestCase

{

	static $resoursePath =  "./../../Resources/";
	static $outPutPath =  "./Output/";
	static $key="DP.DU6aY7uJUb2tcwcgQEOfZAj/7lkIindXp8i7UMhzKaOcQq1ia9Ys87A9";
	static $url = "https://localhost:44397/v1.0"; 

	static $Author= "test";
	static $Title ="";

		
	/** @test */
	public function PageInput_CoreFont_Pdfoutput()
	{

        echo("FontSamples1");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CoreFont";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ( Font::TimesBoldItalic());
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples1.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples1.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CoreFonts_Pdfoutput()
	{

        echo("FontSamples2");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CoreFonts";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World (HelveticaBold)",ElementPlacement::TopCenter);
		$element->Font (Font::HelveticaBold());
		array_push($pageInput->Elements,$element);
		$element1 = new TextElement("Hello World (CourierBoldOblique)",ElementPlacement::TopCenter,0,100);
		$element1->Font ( Font::CourierBoldOblique());
		array_push($pageInput->Elements,$element1);
		$element2 = new TextElement("#&%() +0123",ElementPlacement::TopCenter,0,200);
		$element2->Font ( Font::Symbol());
		array_push($pageInput->Elements,$element2);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples2.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples2.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_TtfFont_Pdfoutput()
	{

        echo("FontSamples3");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"TtfFont";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."arialbi.ttf");
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font( $font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples3.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples3.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_OtfFont_Pdfoutput()
	{

        echo("FontSamples4");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"OtfFont";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."Calibri.otf");
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ( $font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples4.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples4.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_MultipleFonts_Pdfoutput()
	{

        echo("FontSamples5");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"MultipleFonts";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$font = Font::FromFile(FontSamples::$resoursePath."arialbi.ttf");
		$element = new TextElement("Hello World (arialbi)",ElementPlacement::TopCenter);
		$element->Font($font);
		array_push($pageInput->Elements,$element);
		$font1 = Font::FromFile(FontSamples::$resoursePath."Calibri.otf");
		$element1 = new TextElement("Hello World (Calibri)",ElementPlacement::TopCenter,0,100);
		$element1->Font( $font1);
		array_push($pageInput->Elements,$element1);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples5.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples5.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_Embed_Pdfoutput()
	{

        echo("FontSamples6");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"Embed";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."verdanab.ttf");
		$font->Embed = false;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font( $font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples6.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples6.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_Subset_Pdfoutput()
	{

        echo("FontSamples7");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"Subset";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."verdanab.ttf");
		$font->Subset = false;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples7.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples7.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PdfInput_WithTemplate_Pdfoutput()
	{

        echo("FontSamples8");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"WithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$resource = new PdfResource(FontSamples::$resoursePath."SinglePage.pdf");
		$input = new PdfInput($resource);
		array_push($pdf->Instructions->Inputs,$input);
		$font = Font::FromFile(FontSamples::$resoursePath."arialbi.ttf");
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples8.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples8.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CloudRoot_Pdfoutput()
	{

        echo("FontSamples9");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CloudRoot";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = new Font(new FontResource(FontSamples::$resoursePath."Calibri.otf"));
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ( $font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples9.pdf",$response->PdfContent);
		}
		if(isset($pdf->jsonData))
		file_put_contents(FontSamples::$outPutPath."FontSamples9.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CloudSubFolder_Pdfoutput()
	{

        echo("FontSamples10");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CloudSubFolder";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = new Font(new FontResource(FontSamples::$resoursePath."Calibri.otf"));
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples10.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples10.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PdfInput_CloudRootWithTemplate_Pdfoutput()
	{

        echo("FontSamples11");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CloudRootWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = new Font(new FontResource(FontSamples::$resoursePath."Calibri.otf"));
		$resource = new PdfResource(FontSamples::$resoursePath."SinglePage.pdf");
		$input = new PdfInput($resource);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples11.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples11.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PdfInput_CloudSubFolderWithTemplate_Pdfoutput()
	{

        echo("FontSamples12");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CloudSubFolderWithTemplate";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = new Font(new FontResource(FontSamples::$resoursePath."Calibri.otf"));
		$resource = new PdfResource(FontSamples::$resoursePath."SinglePage.pdf");
		$input = new PdfInput($resource);
		$template = new Template("Temp1");
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($template->Elements,$element);
		$input->SetTemplate( $template);
		array_push($pdf->Instructions->Inputs,$input);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples12.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples12.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_EmbedSubset_Pdfoutput()
	{

        echo("FontSamples13");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"EmbedSubset";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."verdanab.ttf");
		$font->Embed = true;
		$font->Subset = false;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples13.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples13.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_SubsetEmbed_Pdfoutput()
	{

        echo("FontSamples14");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"SubsetEmbed";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$font = Font::FromFile(FontSamples::$resoursePath."verdanab.ttf");
		$font->Subset = true;
		$font->Embed = false;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World",ElementPlacement::TopCenter);
		$element->Font ($font);
		array_push($pageInput->Elements,$element);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples14.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples14.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CoreFontsHelvetica_Pdfoutput()
	{

        echo("FontSamples15");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CoreFontsHelvetica";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World (Helvetica)",ElementPlacement::TopCenter);
		$element->Font (Font::Helvetica());
		array_push($pageInput->Elements,$element);
		$element1 = new TextElement("Hello World (HelveticaBold)",ElementPlacement::TopCenter,0,100);
		$element1->Font(  Font::HelveticaBold());
		array_push($pageInput->Elements,$element1);
		$element2 = new TextElement("Hello World (HelveticaBoldOblique)",ElementPlacement::TopCenter,0,200);
		$element2->Font  (Font::HelveticaBoldOblique());
		array_push($pageInput->Elements,$element2);
		$element3 = new TextElement("Hello World (HelveticaOblique)",ElementPlacement::TopCenter,0,300);
		$element3->Font  (Font::HelveticaOblique());
		array_push($pageInput->Elements,$element3);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples15.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples15.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CoreFontsCourier_Pdfoutput()
	{

        echo("FontSamples16");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CoreFontsCourier";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World (Courier)",ElementPlacement::TopCenter);
		$element->Font ( Font::Courier());
		array_push($pageInput->Elements,$element);
		$element1 = new TextElement("Hello World (CourierBold)",ElementPlacement::TopCenter,0,100);
		$element1->Font (Font::CourierBold());
		array_push($pageInput->Elements,$element1);
		$element2 = new TextElement("Hello World (CourierBoldOblique)",ElementPlacement::TopCenter,0,200);
		$element2->Font ( Font::CourierBoldOblique());
		array_push($pageInput->Elements,$element2);
		$element3 = new TextElement("Hello World (CourierOblique)",ElementPlacement::TopCenter,0,300);
		$element3->Font ( Font::CourierOblique());
		array_push($pageInput->Elements,$element3);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples16.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples16.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}
	
	/** @test */
	public function PageInput_CoreFontsTimesRoman_Pdfoutput()
	{

        echo("FontSamples17");
		Pdf::$DefaultApiKey = FontSamples::$key;
		Pdf::$DefaultBaseUrl = FontSamples::$url;
		//$Name = $"CoreFontsTimesRoman";
		$pdf = new Pdf();
		$pdf->Instructions->Author = FontSamples::$Author;
		$pdf->Instructions->Title = FontSamples::$Title;
		$pageInput = new PageInput();
		$element = new TextElement("Hello World (TimesBold)",ElementPlacement::TopCenter);
		$element->Font ( Font::TimesBold());
		array_push($pageInput->Elements,$element);
		$element1 = new TextElement("Hello World (TimesBoldItalic)",ElementPlacement::TopCenter,0,100);
		$element1->Font ( Font::TimesBoldItalic());
		array_push($pageInput->Elements,$element1);
		$element2 = new TextElement("Hello World (TimesItalic)",ElementPlacement::TopCenter,0,200);
		$element2->Font ( Font::TimesItalic());
		array_push($pageInput->Elements,$element2);
		$element3 = new TextElement("Hello World (TimesRoman)",ElementPlacement::TopCenter,0,300);
		$element3->Font (Font::TimesRoman());
		array_push($pageInput->Elements,$element3);
		array_push($pdf->Instructions->Inputs,$pageInput);
		$response = $pdf->Process();
		//if (response->IsSuccesful)
		{
		file_put_contents(FontSamples::$outPutPath."FontSamples17.pdf",$response->PdfContent);
		}	
		
		if(isset($pdf->jsonData))		
		file_put_contents(FontSamples::$outPutPath."FontSamples17.json",$pdf->jsonData);

		$this->assertEquals($response->IsSuccessful,true);
	}


}

?>