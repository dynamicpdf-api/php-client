<?php



    /**
    *
    * Represents information of a button field.
    *
    */
    class ButtonFieldInformation
    {

        /**
        *
        * Gets or Sets the name of the button field.
        *
        */
        public  Name; 


        /**
        *
        * Gets or sets the type of the button field, ex: RadioButton, CheckBox etc.
        *
        */
        public  Type; 


        /**
        *
        * Gets or sets the value of the button field.
        *
        */
        public  Value; 


        /**
        *
        * Gets or Sets the default value of the button field.
        *
        */
        public  DefaultValue; 


        /**
        *
        * Gets or Sets the export value. These values will be exported when submitting the form.
        *
        * To create a set of mutually exclusive radio buttons (i.e., where only one can be selected at a time), 
        * create the fields with the same name but different export values. 
        *
        */
        public  ExportValue; 


        /**
        *
        * Gets the collection of export value.
        *
        */
        public  ExportValues = array(); 
    }
?>
