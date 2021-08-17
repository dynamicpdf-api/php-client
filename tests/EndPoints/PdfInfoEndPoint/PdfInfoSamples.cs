using DynamicPDF.Api;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System.IO;

namespace DynamicPDFApiTestForNET.TestCases.FunctionalityTest.PdfInfoEndPoint
{
    [TestClass]
    public class PdfInfoSamples : TestCase
    {
        public override InputSampleType InputSampleType
        {
            get
            {
                return InputSampleType.PdfInfo;
            }
        }

        [TestMethod]
        public void AllFormFields_JsonOutput()
        {
            Name = "AllFormFields";
            PdfResource resource = new PdfResource(base.GetResourcePath("AllFormFields.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void Button_JsonOutput()
        {
            Name = "Button";
            PdfResource resource = new PdfResource(base.GetResourcePath("Button.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void Checkbox_JsonOutput()
        {
            Name = "Checkbox";
            PdfResource resource = new PdfResource(base.GetResourcePath("Checkbox.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void Combo_JsonOutput()
        {
            Name = "Combo";
            PdfResource resource = new PdfResource(base.GetResourcePath("Checkbox.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ComboExport_JsonOutput()
        {
            Name = "ComboExport";
            PdfResource resource = new PdfResource(base.GetResourcePath("ComboExport.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ComboExport1_JsonOutput()
        {
            Name = "ComboExport1";
            PdfResource resource = new PdfResource(base.GetResourcePath("ComboExport1.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ComboExport2_JsonOutput()
        {
            Name = "ComboExport2";
            PdfResource resource = new PdfResource(base.GetResourcePath("ComboExport2.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ListBoxMultiSelect_JsonOutput()
        {
            Name = "ListBoxMultiSelect";
            PdfResource resource = new PdfResource(base.GetResourcePath("ListBoxMultiSelect.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ListBoxSingleSelect_JsonOutput()
        {
            Name = "ListBoxSingleSelect";
            PdfResource resource = new PdfResource(base.GetResourcePath("ListBoxSingleSelect.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ListMultiSelectExport1_JsonOutput()
        {
            Name = "ListMultiSelectExport1";
            PdfResource resource = new PdfResource(base.GetResourcePath("ListMultiSelectExport1.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void ListMultiSelectExport2_JsonOutput()
        {
            Name = "ListMultiSelectExport2";
            PdfResource resource = new PdfResource(base.GetResourcePath("ListMultiSelectExport2.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void PushButton_JsonOutput()
        {
            Name = "PushButton";
            PdfResource resource = new PdfResource(base.GetResourcePath("PushButton.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void Radio_JsonOutput()
        {
            Name = "Radio";
            PdfResource resource = new PdfResource(base.GetResourcePath("Radio.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void Signature_JsonOutput()
        {
            Name = "Signature";
            PdfResource resource = new PdfResource(base.GetResourcePath("Signature.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void SignatureNoSign_JsonOutput()
        {
            Name = "SignatureNoSign";
            PdfResource resource = new PdfResource(base.GetResourcePath("SignatureNoSign.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void TextField_JsonOutput()
        {
            Name = "TextField";
            PdfResource resource = new PdfResource(base.GetResourcePath("TextField.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }

        [TestMethod]
        public void TextField2_JsonOutput()
        {
            Name = "TextField2";
            PdfResource resource = new PdfResource(base.GetResourcePath("TextField2.pdf"));

            PdfInfo pdfInfo = new PdfInfo(resource);
            PdfInfoResponse response = pdfInfo.Process();
            bool pass = false;
            if (response.IsSuccessful)
            {
                File.WriteAllText(base.GetOutputFilePath("Output.json", InputSampleType), response.JsonContent);

#if BASELINEREQUIRED
                // Uncomment the line below to recreate the Input PNG Images
                base.CreateInputPngsFromOutputPdf(72, InputSampleType);

                pass = base.CompareOutputPdfToInputPngs(72, InputSampleType);
#else
                pass = response.IsSuccessful;
#endif

            }
            Assert.IsTrue(pass);
        }
    }
}
