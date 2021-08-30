<?php

include_once('InputType.php');


/**
*
* Represents a page input.
*
*/
class PageInput extends Input
{
    

    /**
    *
    *  Initializes a new instance of the PageInput class. 
    *
    * @param  float $pageWidth The width of the page.
    * @param  float $pageHeight The height of the page.
    */
    public function __construct(?float $pageWidth= null, ?float $pageHeight= null) 
    { 
        $this->PageWidth = $pageWidth; 
        $this->PageHeight = $pageHeight; 
    }
   
    
    public  $Type =InputType::Page; 


    /**
    *
    * Gets or sets the width of the page.
    *
    */
    public  $PageWidth;


    /**
    *
    * Gets or sets the height of the page.
    *
    */
    public  $PageHeight;

    public  $Elements= array();
    

    /**
    *
    * Gets or sets the elements of the page.
    *
    */
    public  function GetElements()
    {
        return $this->Elements;
    }
    public function GetjsonSerializeString()
    {
        $jsonElement=array();
        foreach ($this->Elements as $element) 
        {
            array_push($jsonElement,$element->GetjsonSerializeString());
        }

        $jsonArray=array();

        $jsonArray["type"]= "page";

        if($this->PageWidth != null)
        $jsonArray['pageWidth'] = $this->PageWidth;
       
       if($this->PageHeight != null)
        $jsonArray['pageHeight'] = $this->PageHeight;
       
       

        $jsonArray['elements'] =  $jsonElement;
        
        //---------------------------------------------------
        if($this->TemplateId != null)
        $jsonArray['templateId'] = $this->TemplateId;

    if($this->ResourceName != null)
        $jsonArray['resourceName'] = $this->ResourceName;

    if($this->Id != null)
        $jsonArray['id'] = $this->Id;

        return $jsonArray;

    }
}
?>

