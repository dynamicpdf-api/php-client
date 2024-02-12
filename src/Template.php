<?php
namespace DynamicPDF\Api;

/**
 *
 * Represents a document template.
 *
 */
class Template
{

    /**
     *
     *  Initializes a new instance of the Template class.
     *
     * @param  string|null $id The id string representing id for the template.
     */
    public function __construct(?string $id = null)
    {
        if ($id == null) {
            $this->Id = md5(uniqid(rand(), true));
        } else {
            $this->Id = $id;
        }

    }

    /**
     *
     * Gets or sets the id for the template.
     *
     */
    public $Id;

    /**
     *
     * Gets or sets the elements for the template.
     *
     */
    public $Elements = array();

    public function GetJsonSerializeString()
    {

        $elements = array();
        foreach ($this->Elements as $element) {
            if ($element != null) {
                $str = $element->GetJsonSerializeString();
            }

            if ($str != null) {
                array_push($elements, $str);
            }

        }

        return array(
            "id" => $this->Id,
            "elements" => $elements,
        );

    }
}
