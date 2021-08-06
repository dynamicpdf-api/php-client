
<?php

include_once('SecurityType.php');

    class Security
    {
       
        public function __construct(string $userPwd,string $ownerPwd ) 
        {
            $this->UserPassword = $userPwd;
            $this->OwnerPassword = $ownerPwd;
        }

        
        public  $Type ;
        public  $AllowCopy; 
        public  $AllowEdit;
        public  $AllowPrint; 
        public  $AllowUpdateAnnotsAndFields; 
        public $OwnerPassword = '';
        public  $UserPassword = '';
        public  $AllowAccessibility;
        public  $AllowFormFilling; 
        public  $AllowHighResolutionPrinting; 
        public  $AllowDocumentAssembly;   
    }
?>
