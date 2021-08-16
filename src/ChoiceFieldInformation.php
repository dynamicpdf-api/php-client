<?php

    /// <summary>
    /// Represents the information of a choice field in interactive forms.
    /// A choice field contains several text items,
    /// one or more of which may be selected as the field value.
    /// </summary>
    class ChoiceFieldInformation
    {
        /// <summary>
        /// Gets or Sets the name of the choice field.
        /// </summary>
        public $Name;

        /// <summary>
        /// Gets or sets the <see cref="ChoiceFieldType"/>. ex: ListBox, ComboBox etc.
        /// </summary>
        public $Type;

        /// <summary>
        /// Gets or sets the value of the choice field.
        /// </summary>
        public $Value;

        /// <summary>
        /// Gets or Sets the default value of the choice field.
        /// </summary>
        public $DefaultValue;

        /// <summary>
        /// Gets or Sets the export value.
        /// </summary>
        public $ExportValue;

        /// <summary>
        /// Gets the collection of items.
        /// </summary>
        public $Items = array();

        /// <summary>
        /// Gets the collection of export values of the items present in the choice field.
        /// </summary>
        public $ItemExportValues = array();
    }
?>