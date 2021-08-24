
<?php

    /// <summary>
    /// Represents a form field in the PDF document.
    /// </summary>
     class FormField implements JsonSerializable
    {
           /// <summary>
        /// Initializes a new instance of the <see cref="FormField"/> class 
        /// using the name of the form field as a parameter.
        /// </summary>
        /// <param name="name">The name of the form field.</param>
      /*  public function __construct(string $name)
        {
            $this->Name = $name;
        }*/

        /// <summary>
        /// Initializes a new instance of the <see cref="FormField"/> class 
        /// using the name and the value of the form field as parameters.
        /// </summary>
        /// <param name="name">The name of the form field.</param>
        /// <param name="value">The value of the form field.</param>
        public function __construct(string $name, string $value= null)
        {
            $this->Name = $name;
            if($value!= null)
            $this->Value = $value;
            else
            $this->Value = "";

        }

         /// <summary>
        /// Gets or sets name of the form field.
        /// </summary>
        public   $Name ;

        /// <summary>
        /// Gets or sets value of the form field.
        /// </summary>
        public  $Value  = null;

         /// <summary>
        /// Gets or sets a boolean indicating whether to flatten the form field.
        /// </summary>
        public    $Flatten =null;

        /// <summary>
        /// Gets or sets a boolean indicating whether to remove the form field.
        /// </summary>
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
