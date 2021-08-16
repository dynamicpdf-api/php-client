<?php

include_once('RgbColor.php');

    /// <summary>
    /// Represents an RGB color created using the web hexadecimal convention.
    /// </summary>
    class WebColor extends RgbColor
    {
        /// <summary>
        /// Initializes a new instance of the <see cref="WebColor"/> class.
        /// </summary>
        /// <param name="webHexString">The hexadecimal string representing the color.</param>
        public function __construct(string $webHexString) { $this->ColorString = $webHexString;  } 

    }
?>
