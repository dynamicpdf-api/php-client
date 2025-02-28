<?php

use DynamicPDF\Api\Elements\ElementPlacement;
use DynamicPDF\Api\Elements\PageNumberingElement;
use DynamicPDF\Api\Font;
use DynamicPDF\Api\Pdf;
use DynamicPDF\Api\RgbColor;

require_once 'src/DpdfApi.php';

class PdfExample
{
    public static function Run(string $apikey, string $output_path)
    {
        $pdf = new Pdf();
        $pdf->ApiKey = $apikey;
        $pdf->Author = "John Doe";
        $pdf->Title = "My Blank PDF Page";
        $pageInput = $pdf->AddPage(1008, 612);
        $pageNumberingElement = new  PageNumberingElement("1", ElementPlacement::TopRight);
        $pageNumberingElement->Color = RgbColor::Red();
        $pageNumberingElement->Font(Font::TimesBoldItalic());
        $pageNumberingElement->FontSize = 24;
        array_push($pageInput->Elements, $pageNumberingElement);
        $pdfResponse = $pdf->Process();
        if($pdfResponse->IsSuccessful)
        {
            file_put_contents($output_path . "php-pdf-example-output.pdf", $pdfResponse->Content);
        } else { 
            echo($pdfResponse->ErrorJson);
        }       
    }
}
PdfExample::Run("API-Key", "./");