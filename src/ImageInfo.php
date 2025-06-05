<?php

namespace DynamicPDF\Api;


include_once __DIR__ . '/Endpoint.php';
include_once __DIR__ . '/ImageResponse.php';

/**
 *
 * Represents an image information endpoint.
 *
 */
class ImageInfo extends Endpoint
{
    private $resource;

    /**
     *
     *  Initializes a new instance of the ImageInfo class.
     *
     * @param  ImageResource $resource The image resource of type ImageResource.
     */
    public function __construct(ImageResource $resource)
    {
        parent::__construct();
        $this->resource = $resource;
    }

    public $_EndpointName = "image-info";

    /**
     *
     * Process the image resource to get image's information.
     *
     * @return ImageResponse Returns collection of ImageResponse.
     */
    public function Process(): ImageResponse
    {
        $client = parent::Init();

        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        curl_setopt($client, CURLOPT_URL, $endPointUrl);

        $errCode = json_last_error();

        $headr = array();

        $headr[] = 'Content-Type: image/' . substr($this->resource->_FileExtension(), 1);

        $headr[] = 'Authorization:Bearer ' . $this->ApiKey;
        curl_setopt($client, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($client, CURLOPT_POSTFIELDS, $this->resource->Data);



        curl_setopt($client, CURLOPT_RETURNTRANSFER, 0);

        ob_start();
        $result = curl_exec($client);
        $outData = ob_get_contents();
        ob_end_clean();

        $retObject = new ImageResponse();
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result == true && $retObject->StatusCode == 200) {
            $retObject->IsSuccessful = true;
            $retObject->JsonContent = $retObject->Content = $outData;
        } else {
            if ($retObject->StatusCode == 401)
                throw new EndpointException("Invalid Api Key specified");           
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        }

        curl_close($client);

        return $retObject;
    }
}
