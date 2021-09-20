<?php

require_once(__DIR__.'./../../../src/Pdf.php');
require_once(__DIR__.'./../../../src/ImageResource.php');
require_once(__DIR__.'./../../../src/ImageInfo.php');
require_once(__DIR__.'./../../../src/PdfInfoResponse.php');
use PHPUnit\Framework\TestCase;

    class ImageInfoSamplesTest extends TestCase
    {

        private $inputpath = KeyAndUrl::Inputpath;
        private $outputPath = KeyAndUrl::OutPutPath;
        private $key=KeyAndUrl::Key;
        private $url = KeyAndUrl::Url; 
        private $Author= KeyAndUrl::Author;
        private $Title =KeyAndUrl::Title;

       
        /** @test */
        public function Tiff_JsonOutput()
        {
            $Name = "Tiff";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."Output.tiff");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples1.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Group4Fax_JsonOutput()
        {
            $Name = "Group4Fax";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."CCITT_1.tif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples2.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Gif_JsonOutput()
        {
            $Name = "Gif";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."Northwind Logo.gif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples3.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Png_JsonOutput()
        {
            $Name = "Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."170x220_T.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples4.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Bmp_JsonOutput()
        {
            $Name = "Bmp";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."Earth2.bmp");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples5.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Jpg_JsonOutput()
        {
            $Name = "Jpg";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."Image1.jpg");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples6.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function MultipleFormats_JsonOutput()
        {
            $Name = "MultipleFormat";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $images =array ( "Output.tiff", "Northwind Logo.gif", "CCITT_1.tif", "170x220_T.png", "Image1.jpg", "Earth2.bmp" );  

             for ( $i = 0; $i < count($images); $i++)
             {
                $resource = new ImageResource($this->inputpath.$images[$i]);

                $pdfEndPoint = new ImageInfo($resource);
                $response = $pdfEndPoint->Process();

                if ($response->IsSuccessful)
                {
                    file_put_contents($this->outputPath."ImageInfoSamples7".$i.".json", $response->JsonContent);

                }
             }
             $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Group3Fax_JsonOutput()
        {
            $Name = "Group3Fax";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."FaxTest.tif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples8.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function JpegTiff_JsonOutput()
        {
            $Name = "JpegTiff";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."2 page Color.tif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples9.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function LzwTiff_JsonOutput()
        {
            $Name = "LzwTiff";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."2.tif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples10.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function UnCompressedTiff_JsonOutput()
        {
            $Name = "UnCompressedTiff";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."16UnCompressedCMYKMM.tif");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples11.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Indexed_Bmp_JsonOutput()
        {
            $Name = "Indexed_Bmp";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."3_rescale_indexed.bmp");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples12.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function _2Bpp_Png_JsonOutput()
        {
            $Name = "2Bpp_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."121_2bpp.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples13.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function _4Bpp_Png_JsonOutput()
        {
            $Name = "4Bpp_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."4bpp.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples14.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Rgba_Png_JsonOutput()
        {
            $Name = "Rgba_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."Animated_PNG_example_bouncing_beach_ball.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples15.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Interlaced_Png_JsonOutput()
        {
            $Name = "Interlaced_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."cat.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples16.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function GrayScale_Png_JsonOutput()
        {
            $Name = "GrayScale_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."error.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples17.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function GrayScaleAlpha_Png_JsonOutput()
        {
            $Name = "GrayScaleAlpha_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."gray8a.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples18.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function GrayScaleAlpha16Bit_Png_JsonOutput()
        {
            $Name = "GrayScaleAlpha16Bit_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."gray16a.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples19.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Rgba16Bit_Png_JsonOutput()
        {
            $Name = "Rgba16Bit_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."rgba16.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples20.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }

        /** @test */
        public function Indexed_Png_JsonOutput()
        {
            $Name = "Indexed_Png";
            Pdf::$DefaultApiKey = $this->key;
            Pdf::$DefaultBaseUrl = $this->url;

            $resource = new ImageResource($this->inputpath."png2.png");

            $pdfEndPoint = new ImageInfo($resource);
            $response = $pdfEndPoint->Process();

            if ($response->IsSuccessful)
            {
                file_put_contents($this->outputPath."ImageInfoSamples21.json", $response->JsonContent);
            }
            $this->assertEquals($response->IsSuccessful,true);
        }
    }
?>
