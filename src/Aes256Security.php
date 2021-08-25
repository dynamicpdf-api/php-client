<?php

include_once('SecurityType.php');
include_once('EncryptDocumentComponents.php');
include_once('Security.php');


    /**
    *
    * Represents AES 256 bit PDF document security.
    *
    * AES 256 bit PDF security is compatible with PDF version 1.5 and higher. This class is FIPS compliant 
    * when used in applications targetting .NET framework v3.5 or higher. Adobe Acrobat Reader version X or 
    * higher is needed to open these documents. 
    *
    */
    class Aes256Security extends Security
    {

        /**
        *
        * Initializes a new instance of the Aes256Security class by taking the owner and user passwords as parameters 
        * to create PDF. 
        *
        * @param  string $ownerPassword The owner password to open the document.
        * @param  string $userPassword The user password to open the document.
        */
        public function __construct(string $userPassword, string $ownerPassword) 
        {
            parent::__construct($userPassword,  $ownerPassword);
        }
        
        public  $Type = SecurityType::Aes256; 


        /**
        *
        * Gets or sets the EncryptDocumentComponents, components of the document to be encrypted. We can encrypt 
        * all the PDF content or the content, excluding the metadata. 
        *
        */
        public  $DocumentComponents= EncryptDocumentComponents::All;

        public function GetjsonSerializeString()
        {

            $jsonArray=array();
            $jsonArray['type']="aes256";

            if($this->DocumentComponents != null)
                $jsonArray['documentComponents']=strtolower($this->DocumentComponents);
           
            //-------------------------------------------
            if($this->AllowCopy != null)
                $jsonArray['allowCopy'] = $this->AllowCopy;

            if($this->AllowEdit != null)
                $jsonArray['allowEdit'] = $this->AllowEdit;

            if($this->AllowPrint != null)
                $jsonArray['allowPrint'] = $this->AllowPrint;

            if($this->AllowUpdateAnnotsAndFields != null)
                $jsonArray['allowUpdateAnnotsAndFields'] = $this->AllowUpdateAnnotsAndFields;

            if($this->OwnerPassword != null)
                $jsonArray['ownerPassword'] = $this->OwnerPassword;

            if($this->UserPassword != null)
                $jsonArray['userPassword'] = $this->UserPassword;

            if($this->AllowAccessibility != null)
                $jsonArray['allowAccessibility'] = $this->AllowAccessibility;

            if($this->AllowFormFilling != null)
                $jsonArray['allowFormFilling'] = $this->AllowFormFilling;

            if($this->AllowHighResolutionPrinting != null)
                $jsonArray['allowHighResolutionPrinting'] = $this->AllowHighResolutionPrinting;

            if($this->AllowDocumentAssembly != null)
                $jsonArray['allowDocumentAssembly'] = $this->AllowDocumentAssembly;


            return $jsonArray;
        }
    }
?>

