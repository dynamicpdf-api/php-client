<?php
        public void XmpSingleResource()
        {
            Name = "XmpSingelResource";
            PdfResource resource = new PdfResource(base.GetResourcePath("bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf"));
            PdfXmp xmp = new PdfXmp(resource);
            
            XmlResponse response = xmp.Process();
            
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.xml", InputSampleType), response.Content);
            }
            
        }

 
        public void XmpSingleResource1()
        {
            Name = "XmpSingleResource1";
            PdfResource resource = new PdfResource(base.GetResourcePath("aaa_crash.pdf"));

            PdfXmp xmp = new PdfXmp(resource);
            XmlResponse response = xmp.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.xml", InputSampleType), response.Content);
            }
        }


        public void XmpMulitipleResource()
        {
            Name = "XmpMulitipleResource";
            string [] pdfs= { "aaa_crash.pdf","bab6c782-2e85-4c6a-b248-9518a06549e900000.pdf","COR-GEN-2455447-1-A-1.pdf","Waiver TX AF.PDF" };
            bool pass = false;
            for (int i = 0; i < pdfs.Length; i++)
            {
                PdfResource resource = new PdfResource(base.GetResourcePath(pdfs[i]));
                PdfXmp xmp = new PdfXmp(resource);

                XmlResponse response = xmp.Process();

               
                if (response.IsSuccessful)
                {
                    File.WriteAllText(base.GetOutputFilePath("Output" + i + ".xml", InputSampleType), response.Content);
                }
            }
            
        }
?>
