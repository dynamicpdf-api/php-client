
<?php

     class FormField implements JsonSerializable
    {
      /*  public function __construct(string $name)
        {
            $this->Name = $name;
        }*/
        public function __construct(string $name, string $value= null)
        {
            $this->Name = $name;
            if($value!= null)
            $this->Value = $value;
            else
            $this->Value = "";

        }

        public   $Name ;
        public  $Value  = null;
        public    $Flatten =null;
        public    $Remove =null;
        public function jsonSerialize()
        {
            $output=array();
            $output['name']=$this->Name;
            $output['value']=$this->Value;

            if($this->Flatten !=null)
                $output['flatten']=$this->Flatten;
            else
                $output['flatten']=false;
                
            if($this->Remove !=null)
                $output['remove']=$this->Remove;
            else
                $output['remove']=false;

            return $output;
              
        }
    }
?>
