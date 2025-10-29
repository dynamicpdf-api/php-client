<?php
namespace DynamicPDF\Api;


/**
 *
 * Specifies Encryption Type.
 *
 */
class EncryptionType
{
    /**
     * 
     * Represents a RC4 40 bit security.
     *
     */
    public const RC440 = "rc440";
    /**
     * 
     * Represents a RC4 128 bit security.
     *
     */
    public const RC4128 = "rc4128";
    /**
     * 
     * Represents a AES 128 bit security with CBC cipher mode.
     *
     */
    public const Aes128Cbc = "aes128cbc";
    /**
     * 
     * Represents a AES 256 bit security with CBC cipher mode.
     *
     */
    public const Aes256Cbc = "aes256cbc";
    /**
     * 
     * Represents a No security.
     *
     */
    public const None = "none";
}