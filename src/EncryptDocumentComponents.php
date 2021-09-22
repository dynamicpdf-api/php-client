<?php

/**
 *
 * Specifies the document components to be encrypted.
 *
 */
class EncryptDocumentComponents
{

    /**
     *
     * Encrypts all document contents.
     *
     */
    public const All = "all";

    /**
     *
     * Encrypts all document contents except metadata.
     *
     */
    public const AllExceptMetadata = "allExceptMetadata";
}
