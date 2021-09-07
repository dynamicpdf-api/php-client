<?php
    class FontInformation
    {
        
        public function __construct(string $fontName, string $filePath)
        {
            $this->FontName = $fontName;
            $this->FilePath = $filePath;
        }

        public  $FontName;
        

        public  $FilePath;
        
         
    }
?>

