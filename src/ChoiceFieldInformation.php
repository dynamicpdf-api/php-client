<?php

/**
 *
 * Represents the information of a choice field in interactive forms. A choice field contains several text
 * items, one or more of which may be selected as the field value.
 *
 */
class ChoiceFieldInformation
{

    /**
     *
     * Gets or Sets the name of the choice field.
     *
     */
    public $Name;

    /**
     *
     *  Gets or sets the ChoiceFieldType. ex: ListBox, ComboBox etc.
     *
     */
    public $Type;

    /**
     *
     * Gets or sets the value of the choice field.
     *
     */
    public $Value;

    /**
     *
     * Gets or Sets the default value of the choice field.
     *
     */
    public $DefaultValue;

    /**
     *
     * Gets or Sets the export value.
     *
     */
    public $ExportValue;

    /**
     *
     * Gets the collection of items.
     *
     */
    public $Items = array();

    /**
     *
     * Gets the collection of export values of the items present in the choice field.
     *
     */
    public $ItemExportValues = array();
}
