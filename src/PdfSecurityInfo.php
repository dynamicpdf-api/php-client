<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/EncryptionType.php';

/**
 *
 * Represents the pdf security info endpoint.
 *
 */
class PdfSecurityInfo
{

    public ?string $encryptionTypeString = null;
    
    public function GetEncryptionType()
    {
        switch ($this->encryptionTypeString) {
            case "rc4-40":
                return EncryptionType::RC440;
            case "rc4-128":
                return EncryptionType::RC4128;
            case "aes-128-cbc":
                return EncryptionType::Aes128Cbc;
            case "aes-256-cbc":
                return EncryptionType::Aes256Cbc;
            default:
                return EncryptionType::None;
        }
    }

    /**
     *
     * Gets or sets if text and images can be copied to the clipboard by the user.
     *
     */
    public ?bool $AllowCopy = null;

    /**
     *
     *  Gets or sets if the document can be edited by the user.
     *
     */
    public ?bool $AllowEdit = null;

    /**
     *
     * Gets or sets if the document can be printed by the user.
     *
     */
    public ?bool $AllowPrint = null;

    /**
     *
     * Gets or sets if annotations and form fields can be added, edited and modified by the user.
     *
     */
    public ?bool $AllowUpdateAnnotsAndFields = null;

    /**
     *
     * Gets or sets a value indicating whether the PDF document has an owner password set.
     *
     */
    public $HasOwnerPassword = '';

    /**
     *
     * Gets or sets a value indicating whether the PDF document has an user password set.
     *
     */
    public $HasUserPassword = '';

    /**
     *
     * Gets or sets if accessibility programs should be able to read the documents text and images for the user.
     */
    public ?bool $AllowAccessibility = null;

    /**
     *
     * Gets or sets if form filling should be allowed by the user.
     *
     */
    public ?bool $AllowFormFilling = null;

    /**
     *
     * Gets or sets if the document can be printed at a high resolution by the user.
     *
     */
    public ?bool $AllowHighResolutionPrinting = null;

    /**
     *
     * Gets or sets if the document can be assembled and manipulated by the user.
     *
     */
    public ?bool $AllowDocumentAssembly = null;
    /**
     *
     * Gets or sets a value indicating whether all data should be encrypted except for metadata.
     *
     */
    public ?bool $EncryptAllExceptMetadata = null;
    /**
     *
     * Gets or sets a value indicating whether only file attachments should be encrypted.
     *
     */
    public ?bool $EncryptOnlyFileAttachments = null;
}