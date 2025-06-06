<?php
namespace DynamicPDF\Api;


require_once __DIR__ . '/Endpoint.php';
require_once __DIR__ . '/PdfInstructions.php';
require_once __DIR__ . '/Input.php';
require_once __DIR__ . '/PdfInput.php';
require_once __DIR__ . '/Resource.php';
require_once __DIR__ . '/PdfResource.php';
require_once __DIR__ . '/PdfResponse.php';
require_once __DIR__ . '/PageInput.php';
require_once __DIR__ . '/OutlineList.php';
require_once __DIR__ . '/AdditionalResourceType.php';

/**
 *
 * Represents a pdf endpoint.
 *
 */
class Pdf extends Endpoint
{
    public $instructions;


    /**
     *
     *  Initializes a new instance of the Pdf class.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->Outlines = new OutlineList();
        $this->instructions = new PdfInstructions();
    }

    public $_EndpointName = "pdf";

    /**
     * 
     * Adds additional resource to the endpoint.
     *  
     * @param string|array $resource The resource file path or resource data.
     * @param null|string $additionalResourceType The type of the additional resource.
     * @param null|string The name of the resource.
     */
    public function AddAdditionalResource($resource, $additionalResourceType = null, $resourceName = null)
    {
        if (gettype($resource) == "string") {
            if ($resourceName == null)
                $resourceName = basename($resource);
            $additionalResource = new AdditionalResource($resource, $resourceName);
            array_push($this->Resources, $additionalResource);
        } else {
            $type = ResourceType::Pdf;
            switch ($additionalResourceType) {
                case AdditionalResourceType::Font:
                    $type = ResourceType::Font;
                    break;
                case AdditionalResourceType::Image:
                    $type = ResourceType::Image;
                    break;
                case AdditionalResourceType::Pdf:
                    $type = ResourceType::Pdf;
                    break;
                case AdditionalResourceType::Html:
                    $type = ResourceType::Html;
                    break;
            }
            $additionalResource = new AdditionalResource($resource, $resourceName, $type);
            array_push($this->Resources, $additionalResource);
        }
    }

    /**
     *
     * Gets or sets the collection of resource.
     *
     */
    public $Resources = array();

    /**
     *
     * Gets or sets the author.
     *
     */
    public $Author;

    /**
     *
     * Gets or sets the title.
     *
     */
    public $Title;

    /**
     *
     * Gets or sets the subject.
     *
     */
    public $Subject;

    /**
     *
     * Gets or sets the creator.
     *
     */
    public $Creator;

    /**
     *
     * Gets or sets the producer.
     *
     */
    public $Producer;

    /**
     *
     * Gets or sets the tag property.
     *
     */
    public $Tag;

    /**
     *
     * Gets or sets the keywords.
     *
     */
    public $Keywords;

    /**
     *
     * Gets or sets the security.
     *
     */
    public $Security;

    /**
     *
     * Gets or sets the value indicating whether to flatten all form fields.
     *
     */
    public $FlattenAllFormFields;

    /**
     *
     * Gets or sets the value indicating whether to retain signature form field.
     *
     */
    public $RetainSignatureFormFields;

    /**
     *
     *  Returns a PdfInput object containing the input pdf.
     *
     * @param  string|PdfResource $resource The resource path in cloud resource manager or the resource of type PdfResource.
     * @param  MergeOptions $options The merge options for the pdf.
     *
     * @return PdfInput PdfInput object.
     */
    public function AddPdf($resource, ?MergeOptions $options = null)
    {
        if (gettype($resource) == "object") {
            $input = new PdfInput($resource);
            array_push($this->Inputs, $input);
            return $input;
        } else {
            $input = new PdfInput($resource, $options);
            array_push($this->Inputs, $input);
            return $input;
        }
    }

    /**
     *
     * Returns an ImageInput object containing the input pdf.
     *
     * @param string|ImageResource $resource The resource path in cloud resource manager or the resource of type ImageResource.
     *
     * @return ImageInput ImageInput object.
     */
    public function AddImage($resource)
    {
        if (gettype($resource) == "object") {
            $input = new ImageInput($resource);
            array_push($this->Inputs, $input);
            return $input;
        } else {
            $input = new ImageInput($resource);
            array_push($this->Inputs, $input);
            return $input;
        }
    }

    /**
     *
     * Returns an HtmlInput object containing the input pdf.
     *
     * @param string|HtmlResource $resource The HTML input string or the resource of type HtmlResource.
     * @param  string $basePath The basepath option for the url.
     * @param  string $size The Page Size for PDF page
     * @param  string $orientation The Page orientation of the PDF page
     * @return HtmlInput HtmlInput object.
     */
    public function AddHtml($html, ?string $basepath = null, ?string $size = null, ?string $orientation = null, ?float $margins = null)
    {
        $resource = $html;
        if (gettype($resource) == "string") {
            $resource = new HtmlResource($html);
        }
        $input = new HtmlInput($resource, $basepath, $size, $orientation, $margins);
        array_push($this->Inputs, $input);
        return $input;
    }

    /**
     *
     * Returns an WordInput object containing the input pdf.
     *
     * @param WordResource $resource The resource of type WordResource
     * @param  string $size The Page Size for PDF page
     * @param  string $orientation The Page orientation of the PDF page
     * @return WordInput WordInput object.
     */
    public function AddWord(WordResource $resource, ?string $size = null, ?string $orientation = null, ?float $margins = null)
    {
        $input = new WordInput($resource, $size, $orientation, $margins);
        array_push($this->Inputs, $input);
        return $input;
    }

    /**
     *
     * Returns an ExcelInput object containing the input pdf.
     *
     * @param ExcelResource $resource The resource of type ExcelResource
     * @param  string $size The Page Size for PDF page
     * @param  string $orientation The Page orientation of the PDF page
     * @return ExcelInput ExcelInput object.
     */
    public function AddExcel(ExcelResource $resource, ?string $size = null, ?string $orientation = null, ?float $margins = null)
    {
        $input = new ExcelInput($resource, $size, $orientation, $margins);
        array_push($this->Inputs, $input);
        return $input;
    }

    /**
     *
     *  Returns a DlexInput object containing the input pdf.
     *
     * @param  string|DlexResource $dlexResource The resource path in cloud resource manager or the dlex resource of type DlexResource.
     * @param  string|LayoutDataResource $layoutData The layout data resource path in cloud resource manager or the layout data resource of type LayoutDataResource.
     * @return DlexInput DlexInput object.
     */
    public function AddDlex($dlex, $layout)
    {
        if ((gettype($dlex) == "object") && (gettype($layout) == "object")) {
            $input = new DlexInput($dlex, $layout);
            array_push($this->Inputs, $input);
            return $input;
        } else if ((gettype($dlex) == "string") && (gettype($layout) == "object")) {
            $input = new DlexInput($dlex, $layout);
            array_push($this->Inputs, $input);
            return $input;
        } else {
            $input = new DlexInput($dlex, $layout);
            array_push($this->Inputs, $input);
            return $input;
        }
    }

    /**
     *
     *  Returns a PageInput object containing the input pdf.
     *
     * @param  ?float $pageWidth The width of the page.
     * @param  ?float $pageHeight The height of the page.
     * @return PageInput PageInput object.
     */
    public function AddPage(?float $pageWidth = null, ?float $pageHeight = null)
    {
        if (($pageWidth != null) && ($pageHeight != null)) {
            $input = new PageInput($pageWidth, $pageHeight);
            array_push($this->Inputs, $input);
            return $input;
        } else {
            $input = new PageInput();
            array_push($this->Inputs, $input);
            return $input;
        }
    }

    /**
     *
     * Gets the inputs.
     *
     */
    public $Inputs = array();

    /**
     *
     * Gets the templates.
     *
     */
    public $Templates = array();

    /**
     *
     * Gets the fonts.
     *
     */
    public $Fonts = array();

    /**
     *
     * Gets the formFields.
     *
     */
    public $FormFields = array();

    /**
     *
     * Gets the outlines.
     *
     */
    public $Outlines;

    public function GetInstructionsJson(bool $indented = false)
    {

        $tembInstructions = new PdfInstructions();
        $tembInstructions->_Author = $this->Author;
        $tembInstructions->_Title = $this->Title;
        $tembInstructions->_Subject = $this->Subject;
        $tembInstructions->_Creator = $this->Creator;
        $tembInstructions->_Producer = $this->Producer;
        $tembInstructions->_Tag = $this->Tag;
        $tembInstructions->_Keywords = $this->Keywords;
        $tembInstructions->_Security = $this->Security;
        $tembInstructions->_FlattenAllFormFields = $this->FlattenAllFormFields;
        $tembInstructions->_RetainSignatureFormFields = $this->RetainSignatureFormFields;
        $tembInstructions->_Inputs = $this->Inputs;
        $tembInstructions->_Templates = $this->Templates;
        $tembInstructions->_Fonts = $this->Fonts;
        $tembInstructions->_FormFields = $this->FormFields;
        $tembInstructions->_Outlines = $this->Outlines;
        //$this->Instructions->FormFields = $this->FormFields;


        foreach ($tembInstructions->_Inputs as $input) {
            if ($input->_Type == InputType::Page) {
                $pageInput = $input;
                foreach ($pageInput->Elements as $element) {
                    if ($element->_Resource != null) {

                        $this->Resources[$element->_Resource->ResourceName] = $element->_Resource;
                    }
                    if ($element->_TextFont != null && $element->_TextFont->ResourceName != null) {
                        $fontSerializedArray = $element->_TextFont->GetJsonSerializeString();

                        $tembInstructions->_Fonts[$element->_TextFont->_Name] = $fontSerializedArray;
                    }
                }
            }

            foreach ($input->_Resources as $resource) {
                if ($resource != null) {
                    $this->Resources[$resource->ResourceName] = $resource;
                }
            }
            if ($input->GetTemplate() != null) {
                $template = $input->GetTemplate();
                $tembInstructions->_Templates[$template->Id] = $template;
                if ($input->GetTemplate()->Elements != null && count($input->GetTemplate()->Elements) > 0) {
                    foreach ($input->GetTemplate()->Elements as $element) {

                        if ($element->_Resource != null) {
                            $this->Resources[$element->_Resource->ResourceName] = $element->_Resource;
                        }
                        if ($element->_TextFont != null && $element->_TextFont->ResourceName != null) {

                            $fontSerializedArray = $element->_TextFont->GetJsonSerializeString();

                            if (count($fontSerializedArray) > 0) {
                                $tembInstructions->_Fonts[$element->_TextFont->_Name] = $fontSerializedArray;
                            }
                        }
                    }
                }
            }
        }
        $jsonText = "";
        if ($indented == true)
            $jsonText = json_encode($tembInstructions, JSON_PRETTY_PRINT);
        else
            $jsonText = json_encode($tembInstructions);

        return $jsonText;
    }
    /**
     * Process to create pdf.
     *
     * @return PdfResponse Returns collection of PdfResponse.
     */
    public function Process(): PdfResponse
    {
        $client = parent::Init();

        $this->instructions->_Author = $this->Author;
        $this->instructions->_Title = $this->Title;
        $this->instructions->_Subject = $this->Subject;
        $this->instructions->_Creator = $this->Creator;
        $this->instructions->_Producer = $this->Producer;
        $this->instructions->_Tag = $this->Tag;
        $this->instructions->_Keywords = $this->Keywords;
        $this->instructions->_Security = $this->Security;
        $this->instructions->_FlattenAllFormFields = $this->FlattenAllFormFields;
        $this->instructions->_RetainSignatureFormFields = $this->RetainSignatureFormFields;
        $this->instructions->_Inputs = $this->Inputs;
        $this->instructions->_Templates = $this->Templates;
        $this->instructions->_Fonts = $this->Fonts;
        $this->instructions->_FormFields = $this->FormFields;
        $this->instructions->_Outlines = $this->Outlines;
        //$this->Instructions->FormFields = $this->FormFields;

        $endPointUrl = rtrim($this->BaseUrl, "\0\t\n\x0B\r \\/") . "/v1.0/" . $this->_EndpointName;
        curl_setopt($client, CURLOPT_URL, $endPointUrl);

        foreach ($this->instructions->_Inputs as $input) {
            if ($input->_Type == InputType::Page) {
                $pageInput = $input;
                foreach ($pageInput->Elements as $element) {
                    if ($element->_Resource != null) {

                        $this->Resources[$element->_Resource->ResourceName] = $element->_Resource;
                    }
                    if ($element->_TextFont != null && $element->_TextFont->ResourceName != null) {
                        $fontSerializedArray = $element->_TextFont->GetJsonSerializeString();

                        $this->instructions->_Fonts[$element->_TextFont->_Name] = $fontSerializedArray;
                    }
                }
            }

            foreach ($input->_Resources as $resource) {
                if ($resource != null) {
                    $this->Resources[$resource->ResourceName] = $resource;
                }
            }
            if ($input->GetTemplate() != null) {
                $template = $input->GetTemplate();
                $this->instructions->_Templates[$template->Id] = $template;
                if ($input->GetTemplate()->Elements != null && count($input->GetTemplate()->Elements) > 0) {
                    foreach ($input->GetTemplate()->Elements as $element) {

                        if ($element->_Resource != null) {
                            $this->Resources[$element->_Resource->ResourceName] = $element->_Resource;
                        }
                        if ($element->_TextFont != null && $element->_TextFont->ResourceName != null) {

                            $fontSerializedArray = $element->_TextFont->GetJsonSerializeString();

                            if (count($fontSerializedArray) > 0) {
                                $this->instructions->_Fonts[$element->_TextFont->_Name] = $fontSerializedArray;
                            }
                        }
                    }
                }
            }
        }

        $data_string = json_encode($this->instructions);

        $errCode = json_last_error();


        if ($this->instructions->_Inputs == null) {
            throw new EndPointException("Minimum one input required.");
        }

        /*------------------------------------------------------------------------------------------------------*/
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
        $body[] = 'Content-Disposition: form-data; name="' . 'Instructions' . '"; filename="' . "Instructions.json" . '"';
        $body[] = 'Content-Type: application/octet-stream';
        $body[] = '';
        $body[] = $data_string;

        foreach ($this->Resources as $field) {
            $body[] = '--' . $boundary;
            $body[] = 'Content-Disposition: form-data; name="' . "Resource" . '"; filename="' . $field->ResourceName . '"';
            $body[] = 'Content-Type: application/octet-stream';
            $body[] = '';
            if ($field->_FilePath != null) {
                $body[] = file_get_contents($field->_FilePath);
            } else {
                $body[] = $field->Data;
            }
        }
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

        $retObject = new PdfResponse();
        $retObject->IsSuccessful = false;
        $retObject->StatusCode = curl_getinfo($client, CURLINFO_RESPONSE_CODE);

        if ($result && strncmp($outData, '%PDF', 4) == 0) {
            $retObject->IsSuccessful = true;
            $retObject->Content = $outData;
        }
        else{
            if ($retObject->StatusCode == 401)
                throw new EndpointException("Invalid api key specified.");        
            $retObject->ErrorJson = $outData;
            $errObj = json_decode($outData);
            $retObject->ErrorMessage = $errObj->message ?? $errObj->title ?? null;
            $retObject->ErrorId = $errObj->id ?? $errObj->traceId ?? null;
        }
    
        curl_close($client);

        return $retObject;
    }
}