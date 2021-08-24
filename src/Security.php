
<?php

include_once('SecurityType.php');

    /// <summary>
    /// Base class from which all security classes are derived.
    /// </summary>
    class Security
    {
       
        public function __construct(string $userPwd,string $ownerPwd ) 
        {
            $this->UserPassword = $userPwd;
            $this->OwnerPassword = $ownerPwd;
        }

        
        public  $Type ;

        /// <summary>
        /// Gets or sets if text and images can be copied to the clipboard by the user.
        /// </summary>
        public  $AllowCopy; 

        /// <summary>
        /// Gets or sets if the document can be edited by the user.
        /// </summary>
        public  $AllowEdit;

        /// <summary>
        /// Gets or sets if the document can be printed by the user.
        /// </summary>
        public  $AllowPrint; 

        /// <summary>
        /// Gets or sets if annotations and form fields can be added, edited
        /// and modified by the user.
        /// </summary>
        public  $AllowUpdateAnnotsAndFields; 

        /// <summary>
        /// Gets or sets the owner password.
        /// </summary>
        public $OwnerPassword = '';

        /// <summary>
        /// Gets or sets the user password.
        /// </summary>
        public  $UserPassword = '';

        /// <summary>
        /// Gets or sets if accessibility programs should be able to read
        /// the documents text and images for the user.
        /// </summary>
        public  $AllowAccessibility;

         /// <summary>
        /// Gets or sets if form filling should be allowed by the user.
        /// </summary>
        public  $AllowFormFilling; 

         /// <summary>
        /// Gets or sets if the document can be printed at a high resolution by the user.
        /// </summary>
        public  $AllowHighResolutionPrinting; 

        /// <summary>
        /// Gets or sets if the document can be assembled and manipulated by the user.
        /// </summary>
        public  $AllowDocumentAssembly;   
    }
?>
