<?php

include_once('PageZoom.php');
include_once('GoToAction.php');
include_once('Outline.php');
include_once('PdfInput.php');

    class OutlineList 
    {
        

        public function __construct()
        {
            $this->Outlines = array();
        }

       

        /**
        * Adds an Outline object to the outline list.
        * 
        * @param string $text Text of the outline.
        * @param mixed $input Any of the ImageInput, DlexInput, PdfInput or PageInput objects to create PDF.
        * @param int $pageOffset Page number to navigate.
        * @param PageZoom $pageZoom PageZoom to display the destination.
        * @return Outline The Outline object that is created.
        */
        public function Add(string $text,  $input = null, int $pageOffset = 0, string $pageZoom = PageZoom::FitPage)
        {
            if(gettype($input)=="object")
            {
                $linkTo = new GoToAction($input);
                $linkTo->PageOffset = $pageOffset;
                $linkTo->PageZoom = $pageZoom;
                $outline = new Outline($text, $linkTo);
                array_push($this->Outlines,$outline);
                return $outline;
            }
            else  if(gettype($input)=="string")
            {
                $outline = new Outline($text, new UrlAction($input));
                array_push($this->Outlines,$outline);
                return $outline;
            }
            else if($input== null)
            {
                $outline = new Outline($text);
                array_push($this->Outlines,$outline);
                return $outline;
            }
        }

       


        public function AddPdfOutlines(PdfInput $pdfInput)
        {
            array_push($this->Outlines,new Outline($pdfInput));
        }

        public $Outlines;

        public function GetjsonSerializeString()
        {
            $jsonArray=array();
            
            for( $i =0; $i<count($this->Outlines) ;$i++)
            {
                array_push($jsonArray,$this->Outlines[$i]->GetjsonSerializeString());
            }

            return  $jsonArray;
        }

    }
?>
