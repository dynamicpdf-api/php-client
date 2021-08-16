
<?php

    /// <summary>
    /// Represents the image information.
    /// </summary>
    class ImageInformation
    {
        /// <summary>
        /// Gets page number of the pdf where the image is present.
        /// </summary>
        public $PageNumber;

        /// <summary>
        /// Gets the width of the image.
        /// </summary>
        public $Width;

        /// <summary>
        /// Gets the height of the image.
        /// </summary>
        public $Height;

        /// <summary>
        /// Gets the horizondalDpi of the image.
        /// </summary>
        public float HorizondalDpi;

        /// <summary>
        /// Gets the verticalDpi of the image.
        /// </summary>
        public $VerticalDpi;

        /// <summary>
        /// Gets the number Of color components present in the image.
        /// </summary>
        public $NumberOfComponents;

        /// <summary>
        /// Gets the bits per component of the image.
        /// </summary>
        public $BitsPerComponent;

        /// <summary>
        /// Gets the clor space of the image.
        /// </summary>
        public $ColorSpace;
    }
?>
