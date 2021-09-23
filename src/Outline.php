<?php
namespace DynamicPDF\Api;


include_once __DIR__ . './Action.php';
include_once __DIR__ . './OutlineStyle.php';
include_once __DIR__ . './OutlineList.php';

/**
 *
 * Represents an outline.
 *
 */
class Outline
{

    /**
     *
     *  Initializes a new instance of the Outline class.
     *
     * @param  ?PdfInput $input The input of type PdfInput .
     * @param  ?Action $action Action of the outline.
     */
    public function __construct($input, ?Action $action = null)
    {
        $this->Children = new OutlineList();
        if (gettype($input) == "object") {
            $this->FromInputID = $input->Id;
            if ($input->MergeOptions == null) {
                $input->MergeOptions = new MergeOptions();
                $input->MergeOptions->Outlines = false;
            } else {
                $input->MergeOptions->Outlines = false;
            }
        } else {
            $this->Text = $input;
            $this->Action = $action;
        }
    }

    public $ColorName;

    /**
     *
     * Gets or sets the text of the outline.
     *
     */
    public $Text;

    /**
     *
     * Gets or sets the style of the outline.
     *
     */
    public $Style;

    /**
     *
     * Gets or sets a value specifying if the outline is expanded.
     *
     */
    public $Expanded;

    /**
     *
     * Gets or sets a collection of child outlines.
     *
     */
    public $Children;

    /**
     *
     * Gets or sets the Action of the outline.
     *
     */
    public $Action;

    public $FromInputID;

    /**
     *
     * Gets or sets the color of the outline.
     *
     */
    public $Color;

    /**
     *
     * Gets collection of child outlines.
     *
     * @return OutlineList Collection of child outlines.
     */
    public function GetChildren()
    {
        if ($this->Children != null) {
            return $this->Children->Outlines;
        }

        return null;
    }

    public function GetjsonSerializeString()
    {
        // {"color":"Red","text":"OutlineA","style":0,"expanded":true}]

        $jsonArray = array();

        $jsonArray['type'] = "Outline";

        if ($this->Color != null) {
            $colorString = $this->Color->GetjsonSerializeString();
            if ($colorString != null) {
                $jsonArray['color'] = $colorString;
            }

        }

        if ($this->Text != null) {
            $jsonArray['text'] = $this->Text;
        }

        if ($this->Action != null) {
            $ActionJsonArray = $this->Action->GetjsonSerializeString();

            if (count($ActionJsonArray) > 0) {
                $jsonArray['linkTo'] = $ActionJsonArray;
            }

        }

        if ($this->Style != null) {
            $jsonArray['style'] = $this->Style;
        }

        if ($this->Expanded != null) {
            $jsonArray['expanded'] = $this->Expanded;
        }

        if ($this->Children != null && count($this->Children->Outlines) > 0) {
            $childrenArray = array();
            for ($i = 0; $i < count($this->Children->Outlines); $i++) {
                array_push($childrenArray, $this->Children->Outlines[$i]->GetjsonSerializeString());
            }
            $jsonArray['children'] = $childrenArray;
        }
        if ($this->FromInputID != null) {
            $jsonArray['fromInputID'] = $this->FromInputID;
        }

        return $jsonArray;
    }
}
?>

