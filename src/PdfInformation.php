<?php

    /// <summary>
    /// Represents the pdf inforamtion.
    /// </summary>
    class PdfInformation
    {
        /// <summary>
        /// Gets the author.
        /// </summary>
        public  $Author;

        /// <summary>
        /// Gets the subject.
        /// </summary>
        public  $Subject;

        /// <summary>
        /// Gets the keywords.
        /// </summary>
        public  $Keywords;

        /// <summary>
        /// Gets the creator.
        /// </summary>
        public  $Creator;

        /// <summary>
        /// Gets the producer.
        /// </summary>
        public  $Producer;

        /// <summary>
        /// Gets the title.
        /// </summary>
        public  $Title;

        public function PdfInformation() { }

        /// <summary>
        /// Gets the collection of PageInformation.
        /// </summary>
        public Pages = array();

        /// <summary>
        /// Gets the form fields.
        /// </summary>
        public $FormFields;

        /// <summary>
        /// Gets the custom properties.
        /// </summary>
        public $CustomProperties;

        /// <summary>
        /// Gets the boolean representing xmp meta data.
        /// </summary>
        public $XmpMetaData;

        /// <summary>
        /// Gets the boolean, indicating whether the pdf is signed.
        /// </summary>
        public $Signed;

        /// <summary>
        /// Gets the boolean, indicating whether the pdf is tagged.
        /// </summary>
        public $Tagged;
    }
?>
