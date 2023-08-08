<?php
namespace DynamicPDF\Api;


include_once __DIR__ . '/RgbColor.php';

/**
 *
 * Represents the find and replace values and its options.
 *
 */
class TextReplace 
{

        /** 
        * Creates new instance of text replace.
        * 
        * @param string text Text to find.
        * @param string replaceText Text to replace.
        * @param bool matchCase True value will make the search operation case sensitive.
        */
        public function __construct(string $text, string $replaceText, bool $matchCase = false)
        {
            $this->Text = $text;
            $this->ReplaceText = $replaceText;
            $this->MatchCase = $matchCase;
        }

        /** 
        * Gets or sets the find text value. This string will be replaced with ReplaceText during conversion.
        * 
        */
        public $Text;

        /** 
        * Gets or sets replace text value. This string will replace the Text during conversion.
        * 
        */
        public $ReplaceText;

        /** 
        * If true, the search operation will be case sensitive.
        * 
        */
        public $MatchCase  = false;
        public function GetJsonSerializeString()
        {
            $jsonArray = array();

            $jsonArray['text'] = $this->Text;

            $jsonArray['replaceText'] = $this->ReplaceText;

            $jsonArray['matchCase'] = $this->MatchCase;
           
            return $jsonArray;
        }
    
}
