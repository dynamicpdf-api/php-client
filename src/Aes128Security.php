
<?php
include_once('SecurityType.php');
include_once('EncryptDocumentComponents.php');
include_once('Security.php');

    /// <summary>
    /// Represents AES 128 bit PDF document security.
    /// </summary>
    /// <remarks>
    /// AES 128 bit PDF security is compatible with PDF version 1.5 and higher and, 
    /// Adobe Acrobat Reader version 7 or higher is needed to open these documents. 
    /// Older readers will not be able to read documents encrypted with this security.
    /// </remarks>
     class Aes128Security extends Security
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="Aes128Security"/> class by 
        /// taking the owner and user passwords as parameters to create PDF.
        /// </summary>
        /// <param name="ownerPassword">The owner password to open the document.</param>
        /// <param name="userPassword">The user password to open the document.</param>
        public function __construct(string $userPassword, string $ownerPassword) 
        {
            parent::__construct($userPassword,  $ownerPassword);
        }
        
        public  $Type = SecurityType::Aes128; 

        /// <summary>
        /// Gets or sets the <see cref="EncryptDocumentComponents"/>, components of the document to be encrypted. 
        /// We can encrypt all the PDF content or the content, excluding the metadata.
        /// </summary>
        public  $DocumentComponents= EncryptDocumentComponents::All;

        public function GetjsonSerializeString()
        {

            $jsonArray=array();
            $jsonArray['type']="aes128";

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
