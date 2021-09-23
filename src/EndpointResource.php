<?php
namespace DynamicPDF\Api;


class EndPointResource
{
    //ResoruceName property add
    //public EndPointResource(string filePath,string, ResourceType type){ Data = File.ReadAllBytes(filePath); }
    //public EndPointResource(byte[] value, ResourceType type) { Data = value;  }
    //public EndPointResource(Stream data, ResourceType type) { Data = Input.GetSteamData(data);  }

    public $Data = array();
    //(blankPage to page)
    // template object will be there in input
    // Resoources array will be there in the instructions.
    //resoure name is optional if not specified guid
    //subclasses PdfResoruce  , ImageResorce, DlexResoruce FontResoruce, LayoutDataResource(static Load method in PDfResource)
}
