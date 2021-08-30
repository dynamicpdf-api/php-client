<?php

include_once('FontResource.php');
include_once('Font.php');


     /**
     *
     * Represents font.
     *
     */
     class Font
    {

        /**
        *
        * Initializes a new instance of the Font class using the font name that is present in the cloud resource 
        * manager. 
        *
        * @param  string $cloudResourceName The font name present in the cloud resource manager.
        */
        public  function __construct(?string $cloudResourceName = null)
        {
            $this->ResourceName=$cloudResourceName;
            $this->Name = md5(uniqid(rand(), true));
        }
        

        public static function CreateFont(FontResource $fontResource= null, string $resourceName = null)
        {
            $font = new Font();
            $font->Resource = $fontResource;

            if($resourceName != null)
                $font->ResourceName = $resourceName;
            else if($fontResource != null)
                $font->ResourceName = $fontResource->ResourceName;
            else
                $font->ResourceName ="";

            $font->Name = md5(uniqid(rand(), true));
            return $font;
        }



        /**
        *
        * Gets or sets a boolean indicating whether to embed the font.
        *
        */
        public  $Embed;


        /**
        *
        * Gets or sets a boolean indicating whether to subset embed the font.
        *
        */
        public $Subset;
        public  $Name;

        public  $Resource;

        /**
        *
        * Gets or sets a name for the font resource.
        *
        */
        public  $ResourceName;


        /**
        *
        * Gets the Times Roman core font with Latin 1 encoding.
        *
        */
        public static function TimesRoman()
        {
            if(Font::$timesRoman== null)
            Font::$timesRoman=new Font();

            Font::$timesRoman->Name ="timesRoman";
            return Font::$timesRoman;
        } 


        /**
        *
        * Gets the Times Bold core font with Latin 1 encoding.
        *
        */
        public static function TimesBold()
        {
            if(Font::$timesBold == null)
                Font::$timesBold=new Font();

            Font::$timesBold->Name ="timesBold";
            return Font::$timesBold;
        } 
        

        /**
        *
        * Gets the Times Italic core font with Latin 1 encoding.
        *
        */
        public static function TimesItalic()
        {
            if(Font::$timesItalic== null)
                Font::$timesItalic=new Font();

                Font::$timesItalic->Name ="timesItalic";
            return Font::$timesItalic;
        }  
       

        /**
        *
        * Gets the Times Bold Italic core font with Latin 1 encoding.
        *
        */
        public static function TimesBoldItalic()
        {
            if(Font::$timesBoldItalic== null)
            Font::$timesBoldItalic=new Font();

            Font::$timesBoldItalic->Name = "timesBoldItalic";
            return Font::$timesBoldItalic;
        }  


        /**
        *
        * Gets the Helvetica core font with Latin 1 encoding.
        *
        */
        public static function Helvetica()
        {
            if(Font::$helvetica== null)
            Font::$helvetica=new Font();

            Font::$helvetica->Name ="helvetica";
            return Font::$helvetica;
        }  
        

        /**
        *
        * Gets the Helvetica Bold core font with Latin 1 encoding.
        *
        */
        public static function HelveticaBold()
        {
            if(Font::$helveticaBold== null)
            Font::$helveticaBold=new Font();

            Font::$helveticaBold->Name ="helveticaBold";
            return Font::$helveticaBold;
        } 
        

        /**
        *
        * Gets the Helvetica Oblique core font with Latin 1 encoding.
        *
        */
        public static function HelveticaOblique()
        {
            if(Font::$helveticaOblique== null)
            Font::$helveticaOblique=new Font();

            Font::$helveticaOblique->Name ="helveticaOblique";
            return Font::$helveticaOblique;
        }  
        

        /**
        *
        * Gets the Helvetica Bold Oblique core font with Latin 1 encoding.
        *
        */
        public static function HelveticaBoldOblique()
        {
            if(Font::$helveticaBoldOblique== null)
            Font::$helveticaBoldOblique=new Font();

            Font::$helveticaBoldOblique->Name ="helveticaBoldOblique";
            return Font::$helveticaBoldOblique;
        }
        

        /**
        *
        * Gets the Courier core font with Latin 1 encoding.
        *
        */
        public static function Courier()
        {
            if(Font::$courier== null)
            Font::$courier=new Font();

            Font::$courier->Name ="courier";
            return Font::$courier;
        }  
        

        /**
        *
        * Gets the Courier Bold core font with Latin 1 encoding.
        *
        */
        public static function CourierBold()
        { 
            if(Font::$courierBold== null)
            Font::$courierBold=new Font();

            Font::$courierBold->Name ="courierBold";
            return Font::$courierBold;
        }   
        

        /**
        *
        * Gets the Courier Oblique core font with Latin 1 encoding.
        *
        */
        public static function CourierOblique()
        { 
            if(Font::$courierOblique== null)
            Font::$courierOblique=new Font();

            Font::$courierOblique->Name ="courierOblique";
            return Font::$courierOblique;
        }  
        

        /**
        *
        * Gets the Courier Bold Oblique core font with Latin 1 encoding.
        *
        */
        public static function CourierBoldOblique()
        { 
            if(Font::$courierBoldOblique== null)
            Font::$courierBoldOblique=new Font();

            Font::$courierBoldOblique->Name ="courierBoldOblique";
            return Font::$courierBoldOblique;
        }   
        

        /**
        *
        * Gets the Symbol core font.
        *
        */
        public static function Symbol()
        { if(Font::$symbol== null)
            Font::$symbol=new Font();

            Font::$symbol->Name ="symbol";
            return Font::$symbol;
           
        }  
        

        /**
        *
        * Gets the Zapf Dingbats core font.
        *
        */
        public static function ZapfDingbats()
        { 
            if(Font::$zapfDingbats== null)
            Font::$zapfDingbats=new Font();

            Font::$zapfDingbats->Name ="zapfDingbats";
            return Font::$zapfDingbats;
        }  
       

        /**
        *
        *  Initializes a new instance of the Font class using the file path of the font and resource name. 
        *
        * @param  string $filePath The file path of the font file.
        * @param  string $resourceName The resource name for the font.
        */
        public static function FromFile(string $filePath,string $resourceName = null)
        {
            $resource = new FontResource($filePath,$resourceName);
            $font=Font::CreateFont($resource,$resource->ResourceName);
            return $font;
        }

        private static  $timesRoman = null;
        private static  $timesBold = null;
        private static  $timesItalic = null;
        private static  $timesBoldItalic = null;
        private static  $helvetica = null;
        private static  $helveticaBold = null;
        private static  $helveticaOblique = null;
        private static  $helveticaBoldOblique = null;
        private static  $courier = null;
        private static  $courierBold = null;
        private static  $courierOblique = null;
        private static  $courierBoldOblique = null;
        private static  $symbol = null;
        private static  $zapfDingbats = null;
        private $data = array();

        public function GetjsonSerializeString()
        {
            $jsonArray = array();
            if($this->Name != null)
                $jsonArray["name"]=$this->Name;

            if($this->Embed != null)
                    $jsonArray["embed"]=$this->Embed;
                    
            if($this->Subset != null)
                    $jsonArray["subset"]=$this->Subset;
        
            if($this->ResourceName != null)
                $jsonArray["resourceName"]=$this->ResourceName;

            return $jsonArray;
        }
      
        /*public static function FromStream(string $filePath)
        {
            return null;
        }*/

        //public static Font FromSystem(string fontName)
        //{
        //    if (fontName == null) return null;
        //    if (fontName == string.Empty || fontName.Length < 1) return null;

        //    fontName = fontName.Replace("-", string.Empty);
        //    fontName = fontName.Replace(" ", string.Empty);
        //    int indexInFileNames = -1;
        //    if (loadRequired)
        //    {
        //        LoadFonts();
        //    }
        //    foreach (FontName name in fontNames)
        //    {
        //        if (name.PostScriptName.Equals(fontName.ToUpper()) || name.FullFontName.Equals(fontName.ToUpper()))
        //        {
        //            indexInFileNames = name.Index;
        //        }
        //    }
        //    if (indexInFileNames < 0 || bold || italic)
        //    {
        //        foreach (Family family in families)
        //        {
        //            if (family.PreferredFamilyName.Equals(fontName.ToUpper()) || family.FamilyName.Equals(fontName.ToUpper()))
        //            {
        //                if (bold)
        //                {
        //                    indexInFileNames = -1;
        //                    if (italic)
        //                    {
        //                        if (family.SubFamily.FontWeight == 700 && (family.SubFamily.FSSelection == 0x01 || family.SubFamily.FSSelection == 0x21
        //                            || family.SubFamily.FSSelection == 0x41))
        //                        {
        //                            indexInFileNames = family.SubFamily.Index;
        //                            break;
        //                        }
        //                    }
        //                    else
        //                    {
        //                        if (family.SubFamily.FontWeight == 700 && !(family.SubFamily.FSSelection == 0x01 || family.SubFamily.FSSelection == 0x21
        //                        || family.SubFamily.FSSelection == 0x41))
        //                        {
        //                            indexInFileNames = family.SubFamily.Index;
        //                            break;
        //                        }
        //                    }
        //                }
        //                else if (italic)
        //                {
        //                    indexInFileNames = -1;
        //                    if ((family.SubFamily.FSSelection == 0x01 || family.SubFamily.FSSelection == 0x21
        //                        || family.SubFamily.FSSelection == 0x41) && (family.SubFamily.FontWeight != 700))
        //                    {
        //                        indexInFileNames = family.SubFamily.Index;
        //                        break;
        //                    }
        //                }
        //                else if (family.SubFamily.FontWeight == 400 && !(family.SubFamily.FSSelection == 0x01 || family.SubFamily.FSSelection == 0x21
        //                        || family.SubFamily.FSSelection == 0x41))
        //                {
        //                    indexInFileNames = family.SubFamily.Index;
        //                }
        //            }
        //        }
        //    }
        //    if (indexInFileNames >= 0)
        //        return LoadOpentypeFont(indexInFileNames, useAdvancedLayoutTables);
        //    else
        //        return null;
        //}

        //private static LoadFont()
        //{
        //    lock (lockObject)
        //    {
        //        if (fontDirectory != null && fontDirectory != string.Empty)
        //        {
        //            DirectoryInfo di = new DirectoryInfo(fontDirectory);
        //            FileInfo[] allFiles = di.GetFiles();
        //            List<FileInfo> ttfFiles = new List<FileInfo>();
        //            List<FileInfo> otfFiles = new List<FileInfo>();

        //            foreach (FileInfo file in allFiles)
        //            {
        //                if (string.Compare(file.Extension, ".ttf", true) == 0)
        //                {
        //                    ttfFiles.Add(file);
        //                }
        //                if (string.Compare(file.Extension, ".otf", true) == 0)
        //                {
        //                    otfFiles.Add(file);
        //                }
        //            }

        //            Stream reader;
        //            FullNameTable nameTable;
        //            OS2Table os2Table;
        //            FontName fontNameStructure;
        //            FontSubFamily fontSubFamily;
        //            Family familyStructure;

        //            string[] tFileNames = new string[ttfFiles.Count + otfFiles.Count];
        //            FontName[] tFontNames = new FontName[ttfFiles.Count + otfFiles.Count];
        //            Family[] tFamilies = new Family[ttfFiles.Count + otfFiles.Count];
        //            List<string> fontList = new List<string>();
        //            int i = 0;
        //            int j = 0;
        //            foreach (FileInfo ttfNext in ttfFiles)
        //            {
        //                reader = new FileStream(ttfNext.FullName, FileMode.Open, FileAccess.Read, FileShare.Read);
        //                nameTable = ReadFontData(reader, out os2Table);
        //                if (nameTable != null && os2Table != null)
        //                {
        //                    tFileNames[j] = ttfNext.Name;
        //                    fontNameStructure = new FontName(nameTable.PostScriptName.ToUpper(), nameTable.FullFontName.ToUpper(), j);
        //                    tFontNames[j] = fontNameStructure;
        //                    fontSubFamily = new FontSubFamily(os2Table.FontWeight, os2Table.FSSelection, j);
        //                    familyStructure = new Family(nameTable.FontFamilyName.ToUpper(), nameTable.FontPreferredFamilyName.ToUpper(), fontSubFamily, nameTable.FullFontName);
        //                    tFamilies[j] = familyStructure;
        //                    j++;
        //                }
        //                i++;
        //            }

        //            foreach (FileInfo otfNext in otfFiles)
        //            {
        //                reader = new FileStream(otfNext.FullName, FileMode.Open, FileAccess.Read, FileShare.Read);
        //                nameTable = ReadFontData(reader, out os2Table);
        //                if (nameTable != null && os2Table != null)
        //                {
        //                    tFileNames[j] = otfNext.Name;
        //                    fontNameStructure = new FontName(nameTable.PostScriptName.ToUpper(), nameTable.FullFontName.ToUpper(), j);
        //                    tFontNames[j] = fontNameStructure;
        //                    fontSubFamily = new FontSubFamily(os2Table.FontWeight, os2Table.FSSelection, j);
        //                    familyStructure = new Family(nameTable.FontFamilyName.ToUpper(), nameTable.FontPreferredFamilyName.ToUpper(), fontSubFamily, nameTable.FullFontName);
        //                    tFamilies[j] = familyStructure;
        //                    j++;
        //                }
        //                i++;
        //            }
        //            if (i != j)
        //            {
        //                Array.Resize(ref tFileNames, j);
        //                Array.Resize(ref tFontNames, j);
        //                Array.Resize(ref tFamilies, j);
        //            }

        //            fileNames.AddRange(tFileNames);
        //            fontNames.AddRange(tFontNames);
        //            families.AddRange(tFamilies);
        //        }
        //    }
        //}


    }

?>
