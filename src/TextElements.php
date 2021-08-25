<?php
     
     include_once('Element.php');

     abstract class  TextElements extends Element
    {
        public function __construct(string $text)
        {
            parent::__construct($text);
        }

        public ?string $Color  = null;
        public ?string $Font  = null;
        public ?floatval $FontSize ;
    }
?>

