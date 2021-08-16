<?php
     include_once('Security.php');
     include_once('SecurityType.php');
     
     class RC4128Security extends Security
    {
        public function __construct( string $userPassword, string $ownerPassword)
        {
            parent::__construct($userPassword,  $ownerPassword);
        }

        public   $Type = SecurityType::RC4128;
       
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
