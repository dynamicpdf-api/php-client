<?php

include_once('FontResource.php');
include_once('Font.php');

    class Font
    {

      
        public function __construct(FontResource $fontResource= null, string $resourceName = null)
        {
            $this->Resource = $fontResource;

        
            
            if($resourceName != null)
                $this->ResourceName = $resourceName;
            else if($fontResource != null)
                $this->ResourceName = $fontResource->ResourceName;
            else
            $this->ResourceName ="";

            $this->Name = md5(uniqid(rand(), true));
        }
        public static function CreateFont(string $Name)
        {
            $font=new Font();
            $font->Name=$Name;
            return $font;
        }
        public  $Resource;
        public  $Embed;
        public $Subset;
        public  $Name;
        public  $ResourceName;

        /// <summary>
        /// Gets the Times Roman core font with Latin 1 encoding.
        /// </summary>
        public static function TimesRoman()
        {
            $font=new Font();
            $font->Name= "timesRoman";
            return $font;
        } 

        /// <summary>
        /// Gets the Times Bold core font with Latin 1 encoding.
        /// </summary>
        public static function TimesBold()
        {
            $font=new Font();
            $font->Name = "timesBold";
            return $font;
        } 
        
        /// <summary>
        /// Gets the Times Italic core font with Latin 1 encoding.
        /// </summary>
        public static function TimesItalic()
        {
            $font=new Font();
            $font->Name= "timesItalic";
            return $font;
        }  
       
        /// <summary>
        /// Gets the Times Bold Italic core font with Latin 1 encoding.
        /// </summary>
        public static function TimesBoldItalic()
        {
            $font=new Font();
            $font->Name= "timesBoldItalic";
            return $font;
        }  

        /// <summary>
        /// Gets the Helvetica core font with Latin 1 encoding.
        /// </summary>
        public static function Helvetica()
        {
            $font=new Font();
            $font->Name= "helvetica";
            return $font;
        }  
        
        /// <summary>
        /// Gets the Helvetica Bold core font with Latin 1 encoding.
        /// </summary>
        public static function HelveticaBold()
        {
            $font=new Font();
            $font->Name = "helveticaBold";
            return $font;
        } 
        
        /// <summary>
        /// Gets the Helvetica Oblique core font with Latin 1 encoding.
        /// </summary>
        public static function HelveticaOblique()
        {
            $font=new Font();
            $font->Name= "helveticaOblique";
            return $font;
        }  
        
        /// <summary>
        /// Gets the Helvetica Bold Oblique core font with Latin 1 encoding.
        /// </summary>
        public static function HelveticaBoldOblique()
        {
            $font=new Font();
            $font->Name  = "helveticaBoldOblique";
            return $font;
        }
        
        /// <summary>
        /// Gets the Courier core font with Latin 1 encoding.
        /// </summary>
        public static function Courier()
        {
            $font=new Font();
            $font->Name = "courier";
            return $font;
        }  
        
        /// <summary>
        /// Gets the Courier Bold core font with Latin 1 encoding.
        /// </summary>
        public static function CourierBold()
        {
            $font=new Font();
            $font->Name= "courierBold";
            return $font;
        }   
        
        /// <summary>
        /// Gets the Courier Oblique core font with Latin 1 encoding.
        /// </summary>
        public static function CourierOblique()
        {
            $font=new Font();
            $font->Name= "courierOblique";
            return $font;
        }  
        
        /// <summary>
        /// Gets the Courier Bold Oblique core font with Latin 1 encoding.
        /// </summary>
        public static function CourierBoldOblique()
        {
            $font=new Font();
            $font->Name= "courierBoldOblique";
            return $font;
        }   
        
        /// <summary>
        /// Gets the Symbol core font.
        /// </summary>
        public static function Symbol()
        {
            $font=new Font();
            $font->Name = "symbol";
            return $font;
        }  
        
        /// <summary>
        /// Gets the Zapf Dingbats core font.
        /// </summary>
        public static function ZapfDingbats()
        {
            $font=new Font();
            $font->Name= "zapfDingbats";
            return $font;
        }  
       
        public static function FromFile(string $filePath,string $resourceName = null)
        {
            $resource = new FontResource($filePath,$resourceName);
            $font=new Font($resource,$resource->ResourceName);
            return $font;
        }
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