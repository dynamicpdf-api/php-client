
<?php
include_once('Action.php');
include_once('OutlineStyle.php');

    /// <summary>
    /// Represents an outline.
    /// </summary>
    class Outline  implements JsonSerializable
    {  

        /// <summary>
        /// Initializes a new instance of the <see cref="Outline"/> class.
        /// </summary>
        /// <param name="input">The input of type <see cref="PdfInput"/> .</param>
        public function __construct(?PdfInput $input = null) 
        {
            if($input!= null)
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
    }

        /// <summary>
        /// Initializes a new instance of the <see cref="Outline"/> class.
        /// </summary>
        /// <param name="text">text for the outline.</param>
        /// <param name="action">Action of the outline.</param>
        public static function CreateOutline(string $text, ?Action $action = null):Outline
         { 
             $outline= new Outline();
             $outline->Text = $text; 
             $outline->Action = $action; 
             return $outline;
         }

        
        public  $ColorName;

        /// <summary>
        /// Gets or sets the text of the outline.
        /// </summary>
        public $Text = "";

        /// <summary>
        /// Gets or sets the style of the outline.
        /// </summary>
        public $Style;

        /// <summary>
        /// Gets or sets a value specifying if the outline is expanded.
        /// </summary>
        public $Expanded;

        /// <summary>
        /// Gets or sets a collection of child outlines.
        /// </summary>
        public $Children = array();

        /// <summary>
        /// Gets or sets the Action of the outline.
        /// </summary>
        public $Action;
        
        public $FromInputID;

        /// <summary>
        /// Gets or sets the color of the outline.
        /// </summary>
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
