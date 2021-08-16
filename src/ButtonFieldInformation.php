<?php


    /// <summary>
    /// Represents information of a button field.
    /// </summary>
    class ButtonFieldInformation
    {
        /// <summary>
        /// Gets or Sets the name of the button field.
        /// </summary>
        public  Name; 

        /// <summary>
        /// Gets or sets the type of the button field, ex: RadioButton, CheckBox etc.
        /// </summary>
        public  Type; 

        /// <summary>
        /// Gets or sets the value of the button field.
        /// </summary>
        public  Value; 

        /// <summary>
        /// Gets or Sets the default value of the button field.
        /// </summary>
        public  DefaultValue; 

        /// <summary>
        /// Gets or Sets the export value. These values will be exported when submitting the form.
        /// </summary>
        /// <remarks>
        /// To create a set of mutually exclusive radio buttons
        /// (i.e., where only one can be selected at a time),
        /// create the fields with the same name but different export values.
        /// </remarks>
        public  ExportValue; 

        /// <summary>
        /// Gets the collection of export value.
        /// </summary>
        public  ExportValues = array(); 
    }
?>