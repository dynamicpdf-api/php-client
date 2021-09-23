<?php
namespace DynamicPDF\Api;

/**
 *
 * Represents the pdf inforamtion.
 *
 */
class PdfInformation
{

    /**
     *
     * Gets the author.
     *
     */
    public $Author;

    /**
     *
     * Gets the subject.
     *
     */
    public $Subject;

    /**
     *
     * Gets the keywords.
     *
     */
    public $Keywords;

    /**
     *
     * Gets the creator.
     *
     */
    public $Creator;

    /**
     *
     * Gets the producer.
     *
     */
    public $Producer;

    /**
     *
     * Gets the title.
     *
     */
    public $Title;

    public function PdfInformation()
    {}

    /**
     *
     * Gets the collection of PageInformation.
     *
     */
    public $Pages = array();

    /**
     *
     * Gets the form fields.
     *
     */
    public $FormFields;

    /**
     *
     * Gets the custom properties.
     *
     */
    public $CustomProperties;

    /**
     *
     * Gets the boolean representing xmp meta data.
     *
     */
    public $XmpMetaData;

    /**
     *
     * Gets the boolean, indicating whether the pdf is signed.
     *
     */
    public $Signed;

    /**
     *
     * Gets the boolean, indicating whether the pdf is tagged.
     *
     */
    public $Tagged;
}
