<?php
namespace DynamicPDF\Api;

include_once __DIR__ . '/SecurityType.php';

/**
 *
 * Base class from which all security classes are derived.
 *
 */
class Security
{

    public function __construct(?string $userPwd = null, ?string $ownerPwd = null)
    {
        $this->UserPassword = $userPwd;
        $this->OwnerPassword = $ownerPwd;
    }

    public $_Type;

    /**
     *
     * Gets or sets if text and images can be copied to the clipboard by the user.
     *
     */
    public ?bool $AllowCopy = null;

    /**
     *
     * Gets or sets if the document can be edited by the user.
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
     * Gets or sets the owner password.
     *
     */
    public $OwnerPassword = '';

    /**
     *
     * Gets or sets the user password.
     *
     */
    public $UserPassword = '';

    /**
     *
     * Gets or sets if accessibility programs should be able to read the documents text and images for the user.
     *
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
}
