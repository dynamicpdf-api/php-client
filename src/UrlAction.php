<?php
    include_once('Action.php');
    class UrlAction extends  Action
    {
        public function __construct(string $url) 
        { 
            $this->Url = $url;
        }

        public  $Url;

        public function GetjsonSerializeString()
        {
            $jsonArray = array();

            if($this->Url != null)
            $jsonArray['url'] = $this->Url;      

            return $jsonArray;
        }
    }
?>
