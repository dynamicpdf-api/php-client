<?php
namespace DynamicPDF\Api;


class FontInformation
{

    public function __construct(string $fontName, string $filePath)
    {
        $this->_FontName = $fontName;
        $this->_FilePath = $filePath;
    }

    public $_FontName;

    public $_FilePath;

}
