<?php

include_once('InputType.php');

/// <summary>
/// Represents a page input.
/// </summary>
class PageInput extends Input
{
    
/// <summary>
        /// Initializes a new instance of the <see cref="PageInput"/> class.
        /// </summary>
        /// <param name="pageWidth">The width of the page.</param>
        /// <param name="pageHeight">The height of the page.</param>
    public function __construct(float $pageWidth= null, float $pageHeight= null) 
    { 
        $this->PageWidth = $pageWidth; 
        $this->PageHeight = $pageHeight; 
    }
   
    
    public  $Type =InputType::Page; 

    /// <summary>
    /// Gets or sets the width of the page.
    /// </summary>
    public  $PageWidth;

    /// <summary>
    /// Gets or sets the height of the page.
    /// </summary>
    public  $PageHeight;

    public  $Elements= array();
    
    /// <summary>
    /// Gets or sets the elements of the page.
    /// </summary>
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
