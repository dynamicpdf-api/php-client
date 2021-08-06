
<?php
include_once('Action.php');
include_once('OutlineStyle.php');
    class Outline  implements JsonSerializable
    {
        public function  __construct(string $text=null, Action $action= null ) 
        { 
            if($text==null)
                $this->Text = ""; 
            else
                $this->Text = $text;

            $this->Action = $action;
         }
        public  $Color; 
        public  $Text; 
        public  $Action; 
        public  $Style; 
        public  $Expanded; 
        public  $Children = array(); 
        public  $FromInputID;
      


       public function jsonSerialize()
       {
            // {"color":"Red","text":"OutlineA","style":0,"expanded":true}]

           $jsonArray=array();

           if($this->Color != null)
           $jsonArray['color'] = $this->Color;
          
          if($this->Text != null)
           $jsonArray['text'] = $this->Text;
          
          if($this->Action != null)
           $jsonArray['linkTo'] = $this->Action->GetjsonSerializeString();
          
          if($this->Style != null)
           $jsonArray['style'] = $this->Style;
          
          if($this->Expanded != null)
           $jsonArray['expanded'] = $this->Expanded;
          
          //if($this->Children != null)
           $jsonArray['children'] = $this->Children;
          
          if($this->FromInputID != null)
           $jsonArray['fromInputID'] = $this->FromInputID;
          
          
           return $jsonArray;
       }
    }
?>
