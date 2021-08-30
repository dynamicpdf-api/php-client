
<?php


     /**
     *
     * Represents a form field in the PDF document.
     *
     */
     class FormField implements JsonSerializable
    {


        /**
        *
        * Initializes a new instance of the FormField class using the name and the value of the form field as parameters. 
        *
        * @param  string $name The name of the form field.
        * @param  string $value The value of the form field.
        */
        public function __construct(string $name, string $value= null)
        {
            $this->Name = $name;
            if($value!= null)
            $this->Value = $value;
            else
            $this->Value = "";

        }


        /**
        *
        * Gets or sets name of the form field.
        *
        */
        public   $Name ;


        /**
        *
        * Gets or sets value of the form field.
        *
        */
        public  $Value  = null;


        /**
        *
        * Gets or sets a boolean indicating whether to flatten the form field.
        *
        */
        public    $Flatten =null;


        /**
        *
        * Gets or sets a boolean indicating whether to remove the form field.
        *
        */
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

