<?php
include_once __DIR__ . './Action.php';

/**
 *
 * Represents an action linking to an external URL.
 *
 */
class UrlAction extends Action
{

    /**
     *
     *  Initializes a new instance of the UrlAction class.
     *
     * @param  string $url URL the action launches.
     */
    public function __construct(string $url)
    {
        $this->Url = $url;
    }

    /**
     *
     * Gets or sets the URL launched by the action.
     *
     */
    public $Url;

    public function GetjsonSerializeString()
    {
        $jsonArray = array();

        if ($this->Url != null) {
            $jsonArray['url'] = $this->Url;
        }

        return $jsonArray;
    }
}
