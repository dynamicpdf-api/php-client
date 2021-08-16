<?php
    /// <summary>
    /// Represents the xml response.
    /// </summary>
    class XmlResponse extends Response
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="XmlResponse"/> class.
        /// </summary>
        //public XmlResponse() {  }

        /// <summary>
        /// Initializes a new instance of the <see cref="XmlResponse"/> class.
        /// </summary>
        /// <param name="xmlContent">The xml content of the response.</param>
        public __construct(string $xmlContent) { $this->Content = $xmlContent; }

        /// <summary>
        /// Gets the xml content.
        /// </summary>
        public $Content
 
    }
?>
