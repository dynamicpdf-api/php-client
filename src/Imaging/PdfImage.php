<?php

namespace DynamicPDF\Api\Imaging;

use DynamicPDF\Api\Endpoint;
use DynamicPDF\Api\EndPointException;

class PdfImage extends Endpoint
{
    /**
     * Represents a PdfResource for converting PDF pages to images.
     */
    public $resource;
    /**
     * Gets or sets the starting page number for rasterization.
     */
    public $StartPageNumber;
    /**
     * Gets or sets the number of pages to rasterize.
     */
    public $PageCount;
    /**
     * Gets or sets the image format for rasterization.
     */
    public $ImageFormat;
    /**
     * Gets or sets the size of the rasterized images.
     */
    public $ImageSize;

    public $_EndpointName = "pdf-image";

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function Process(): PdfImageResponse
    {
        $client = parent::Init();
        $params = array();
        if ($this->StartPageNumber !== null)
            $params['sp'] = $this->StartPageNumber;
        if ($this->PageCount !== null)
            $params['pc'] = $this->PageCount;

        if ($this->ImageSize !== null) {
            if ($this->ImageSize instanceof DpiImageSize) {
                $params['is'] = $this->ImageSize->Type;
                $params['hd'] = $this->ImageSize->HorizontalDpi;
                $params['vd'] = $this->ImageSize->VerticalDpi;
            } elseif ($this->ImageSize instanceof FixedImageSize) {
                $params['is'] = $this->ImageSize->Type;
                $params['ht'] = $this->ImageSize->Height;
                $params['wd'] = $this->ImageSize->Width;
                $params['ut'] = $this->ImageSize->Unit;
            } elseif ($this->ImageSize instanceof MaxImageSize) {
                $params['is'] = $this->ImageSize->Type;
                $params['mh'] = $this->ImageSize->MaxHeight;
                $params['mw'] = $this->ImageSize->MaxWidth;
                $params['ut'] = $this->ImageSize->Unit;
            } elseif ($this->ImageSize instanceof PercentageImageSize) {
                $params['is'] = $this->ImageSize->Type;
                $params['hp'] = $this->ImageSize->HorizontalPercentage;
                $params['vp'] = $this->ImageSize->VerticalPercentage;
            }
        }

        if ($this->ImageFormat !== null) {
            if ($this->ImageFormat instanceof GifImageFormat) {
                $params['if'] = $this->ImageFormat->Type;
                $params['dp'] = $this->ImageFormat->DitheringPercent;
                $params['da'] = $this->ImageFormat->DitheringAlgorithm;
            } elseif ($this->ImageFormat instanceof JpegImageFormat) {
                $params['if'] = $this->ImageFormat->Type;
                $params['qt'] = $this->ImageFormat->Quality;
            } elseif ($this->ImageFormat instanceof PngImageFormat) {
                $params['if'] = $this->ImageFormat->Type;
                if ($this->ImageFormat->ColorFormat instanceof PngIndexedColorFormat) {
                    $params['cf'] = $this->ImageFormat->ColorFormat->Type;
                    $params['da'] = $this->ImageFormat->ColorFormat->DitheringAlgorithm;
                    $params['dp'] = $this->ImageFormat->ColorFormat->DitheringPercent;
                    $params['qa'] = $this->ImageFormat->ColorFormat->QuantizationAlgorithm;
                } elseif ($this->ImageFormat->ColorFormat instanceof PngMonochromeColorFormat) {
                    $params['cf'] = $this->ImageFormat->ColorFormat->Type;
                    $params['bt'] = $this->ImageFormat->ColorFormat->BlackThreshold;
                    $params['da'] = $this->ImageFormat->ColorFormat->DitheringAlgorithm;
                    $params['dp'] = $this->ImageFormat->ColorFormat->DitheringPercent;
                }
            } elseif ($this->ImageFormat instanceof TiffImageFormat) {
                $params['if'] = $this->ImageFormat->Type;
                if ($this->ImageFormat->MultiPage)
                    $params['mp'] = "true";
                if ($this->ImageFormat->ColorFormat instanceof TiffIndexedColorFormat) {
                    $params['cf'] = $this->ImageFormat->ColorFormat->Type;
                    $params['da'] = $this->ImageFormat->ColorFormat->DitheringAlgorithm;
                    $params['dp'] = $this->ImageFormat->ColorFormat->DitheringPercent;
                    $params['qa'] = $this->ImageFormat->ColorFormat->QuantizationAlgorithm;
                } elseif ($this->ImageFormat->ColorFormat instanceof TiffMonochromeColorFormat) {
                    $params['cf'] = $this->ImageFormat->ColorFormat->Type;
                    $params['ct'] = $this->ImageFormat->ColorFormat->CompressionType;
                    $params['bt'] = $this->ImageFormat->ColorFormat->BlackThreshold;
                    $params['da'] = $this->ImageFormat->ColorFormat->DitheringAlgorithm;
                    $params['dp'] = $this->ImageFormat->ColorFormat->DitheringPercent;
                }
            } elseif ($this->ImageFormat instanceof BmpImageFormat) {
                $params['if'] = $this->ImageFormat->Type;
                if ($this->ImageFormat->ColorFormat instanceof BmpMonochromeColorFormat) {
                    $params['cf'] = $this->ImageFormat->ColorFormat->Type;
                    $params['bt'] = $this->ImageFormat->ColorFormat->BlackThreshold;
                    $params['dp'] = $this->ImageFormat->ColorFormat->DitheringPercent;
                    $params['da'] = $this->ImageFormat->ColorFormat->DitheringAlgorithm;
                }
            }
        }

        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        $url = $endPointUrl . '?' . http_build_query($params);
        curl_setopt($client, CURLOPT_URL, $url);

        $retObject = new PdfImageResponse();
        if ($this->resource === null) {
            throw new EndPointException("Required a pdf Resource.");
        }

        $body = array();
        $algos = hash_algos();
        $hashAlgo = null;
        foreach (array('sha1', 'md5') as $preferred) {
            if (in_array($preferred, $algos)) {
                $hashAlgo = $preferred;
                break;
            }
        }

        if ($hashAlgo === null) {
            list($hashAlgo) = $algos;
        }

        $boundary = '----------------------------' .
            substr(hash($hashAlgo, 'sample Text ' . microtime()), 0, 12);

        $crlf = "\r\n";
        $body[] = '--' . $boundary;
        $body[] = 'Content-Disposition: form-data; name="' . "pdf" . '"; filename="' . $this->resource->ResourceName . '"';
        $body[] = 'Content-Type: ' . $this->resource->_MimeType;
        $body[] = '';
        $body[] = $this->resource->Data;

        $body[] = '--' . $boundary . '--';
        $body[] = '';
        $contentType = 'multipart/form-data; boundary=' . $boundary;
        $content = join($crlf, $body);
        $contentLength = strlen($content);

        curl_setopt(
            $client,
            CURLOPT_HTTPHEADER,
            array(
                'Authorization:Bearer ' . $this->ApiKey,
                'Content-Length: ' . $contentLength,
                'Expect: 100-continue',
                'Content-Type: ' . $contentType
            )
        );

        curl_setopt($client, CURLOPT_POSTFIELDS, $content);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        if ($result === false) {
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->IsSuccessful = false;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        } else {
            $jsonString = $outData;
            $rasterizerResponse = json_decode($jsonString, true);

            if (json_last_error() === JSON_ERROR_NONE) {

                $imageType = $rasterizerResponse['contentType'];
                $retObject->ContentType = $imageType;
                $retObject->HorizontalDpi = $rasterizerResponse['horizontalDpi'];
                $retObject->VerticalDpi = $rasterizerResponse['verticalDpi'];
                $retObject->ImageFormat = substr($imageType, strpos($imageType, '/') + 1);

                foreach ($rasterizerResponse['images'] as $img) {
                    $image = new Image();
                    $image->PageNumber = $img['pageNumber'] ?? 0; // Default to 0 if not present
                    $image->Data = $img['data'] ?? '';
                    $image->BilledPages = $img['billedPages'] ?? 0;
                    $image->Width = $img['width'] ?? 0;
                    $image->Height = $img['height'] ?? 0;
                    $retObject->Images[] = $image;
                }

                $retObject->IsSuccessful = true;
                $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);
            } else {
                // Handle JSON decode error
                $retObject->IsSuccessful = false;
                $retObject->ErrorMessage = ('JSON decode error: ' . json_last_error_msg());
                $retObject->StatusCode = (curl_getinfo($client, CURLINFO_HTTP_CODE));
            }
        }

        curl_close($client);

        return $retObject;
    }
}
