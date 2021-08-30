
<?php
include_once('Action.php');
include_once('OutlineStyle.php');


    /**
    *
    * Represents an outline.
    *
    */
    class Outline  implements JsonSerializable
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
            if(gettype($input)== "object")
            {
                $this->FromInputID = $input->Id;
                if ($input->MergeOptions == null)
                {
                    $input->MergeOptions = new MergeOptions();
                    $input->MergeOptions->Outlines = false;
                }
                else 
                {
                    $input->MergeOptions->Outlines = false;
                }
            }
            else
            {
                $this->Text = $input; 
                $this->Action = $action; 
            }
        }


        
        public  $ColorName;


        /**
        *
        * Gets or sets the text of the outline.
        *
        */
        public $Text = "";


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
        public $Children = array();


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
        
      


       public function jsonSerialize()
       {
            // {"color":"Red","text":"OutlineA","style":0,"expanded":true}]

           $jsonArray=array();

           $jsonArray['type']="a";

          if($this->Color != null)
          {
              $colorString=$this->Color->GetjsonSerializeString();
              if($colorString != null)
              $jsonArray['color'] = $colorString;
          }
          
          if($this->Text != null)
           $jsonArray['text'] = $this->Text;
          
          if($this->Action != null)
          {
            $ActionJsonArray=$this->Action->GetjsonSerializeString();

            if(count($ActionJsonArray)>0)
                $jsonArray['linkTo'] = $ActionJsonArray;
          }
          
          if($this->Style != null)
           $jsonArray['style'] = $this->Style;
          
          if($this->Expanded != null)
           $jsonArray['expanded'] = $this->Expanded;
          
          if($this->Children != null &&  count($this->Children) >0)
           $jsonArray['children'] = $this->Children;
          
          if($this->FromInputID != null)
           $jsonArray['fromInputID'] = $this->FromInputID;
          
          
           return $jsonArray;
       }
    }
?>

