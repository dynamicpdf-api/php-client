<?php
    /// <summary>
    /// Represents the form field information containing the collection 
    /// of different types of field informations.
    /// </summary>
    class FormFieldInformation
    {
        public __construct() { }

        /// <summary>
        /// Gets or sets a collection of <see cref="SignatureFieldInformation"/>.
        /// </summary>
        public  $SignatureFields;

        /// <summary>
        /// Gets or sets a collection of <see cref="TextFieldInformation"/>.
        /// </summary>
        public  $TextFields;

        /// <summary>
        /// Gets or sets a collection of <see cref="ChoiceFieldInformation"/>.
        /// </summary>
        public  $ChoiceFields;

        /// <summary>
        /// Gets or sets a collection of <see cref="ButtonFieldInformation"/>.
        /// </summary>
        public  $ButtonFields;

        /// <summary>
        /// Gets or sets a collection of <see cref="PushButtonInformation"/>.
        /// </summary>
        public  $PushButtons;

        /// <summary>
        /// Gets or sets a collection of <see cref="MultiSelectListBoxInformation"/>.
        /// </summary>
        public  $MultiSelectListBoxFields;
    }
?>