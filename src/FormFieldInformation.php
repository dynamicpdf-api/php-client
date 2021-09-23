<?php
namespace DynamicPDF\Api;


/**
 *
 * Represents the form field information containing the collection of different types of field informations.
 *
 */
class FormFieldInformation
{
    public function __construct()
    {}

    /**
     *
     *  Gets or sets a collection of SignatureFieldInformation.
     *
     */
    public $SignatureFields;

    /**
     *
     *  Gets or sets a collection of TextFieldInformation.
     *
     */
    public $TextFields;

    /**
     *
     *  Gets or sets a collection of ChoiceFieldInformation.
     *
     */
    public $ChoiceFields;

    /**
     *
     *  Gets or sets a collection of ButtonFieldInformation.
     *
     */
    public $ButtonFields;

    /**
     *
     *  Gets or sets a collection of PushButtonInformation.
     *
     */
    public $PushButtons;

    /**
     *
     *  Gets or sets a collection of MultiSelectListBoxInformation.
     *
     */
    public $MultiSelectListBoxFields;
}
