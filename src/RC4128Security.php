<?php
     include_once('Security.php');
     include_once('SecurityType.php');
         /// <summary>
    /// Represents RC4 128 bit PDF document security.
    /// </summary>
    /// <remarks>
    /// RC4 128 bit PDF security, with UseCryptFilter property set to false is compatible with PDF version 1.4 or higher and can be read
    /// with Adobe Acrobat Reader version 5 or higher. By default UseCryptFilter property is false. RC4 128 bit PDF security with crypt filter 
    /// is compatible with PDF version 1.5 or higher and can be read with Adobe Acrobat Reader version 6 and higher. 
    /// Older readers will not be able to read document encrypted with this security.
     class RC4128Security extends Security
    {
          /// <summary>
        /// Initializes a new instance of the <see cref="RC4128Security"/> class.
        /// </summary>
        /// <param name="ownerPassword">The owner password to open the document.</param>
        /// <param name="userPassword">The user password to open the document.</param>
        public function __construct( string $userPassword, string $ownerPassword)
        {
            parent::__construct($userPassword,  $ownerPassword);
        }

        public   $Type = SecurityType::RC4128;
       
         /// <summary>
        /// Gets or sets the documents components to be encrypted.
        /// </summary>
        public $EncryptMetadata;
        public function GetjsonSerializeString()
        {

            $jsonArray=array();
            $jsonArray['type']="rc4128";

            if($this->EncryptMetadata != null)
                $jsonArray['encryptMetadata']=$this->EncryptMetadata;
            
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
