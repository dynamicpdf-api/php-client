<?php
    include_once('Action.php');
    /// <summary>
    /// Represents an action linking to an external URL.
    /// </summary>
    class UrlAction extends  Action
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="UrlAction"/> class.
        /// </summary>
        /// <param name="url">URL the action launches.</param>
        public function __construct(string $url) 
        { 
            $this->Url = $url;
        }

        /// <summary>
        /// Gets or sets the URL launched by the action.
        /// </summary>
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
