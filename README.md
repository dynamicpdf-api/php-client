![](./logo-banner2.png)

PHP Client
=================================

The PHP Client (`php-client`) project uses the DynamicPDF Cloud API's PHP client library to create, merge, split, form fill, stamp, obtain metadata, convert, and secure/encrypt PDF documents. 

The DynamicPDF Cloud API consists of the following endpoints.

* `dlex-layout`
* `image-info`
* `pdf`
* `pdf-info`
* `pdf-text`
* `pdf-xmp`

For more information, please visit [DynamicPDF Cloud API](https://cloud.dynamicpdf.com/ "DynamicPDF Cloud API Homepage"). Support for other languages/platforms (PHP, C#, Node.js) is available on GitHub ([DynamicPDF Cloud API at GitHub](https://github.com/dynamicpdf-api "DynamicPDF Cloud API at GitHub")).

## Requirements

- [PHP 7.3.0 or higher](https://www.php.net/)

## Installation

Use Composer to install the client library.

### Composer

The preferred method is via [Composer](https://getcomposer.org/). Install Composer as follows.

* Install Composer if not already installed ([installation instructions](https://getcomposer.org/doc/00-intro.md)).

* Ensure the `ext_curl` extension is enabled in your `php.ini` file ([installation instructions](https://www.php.net/manual/en/install.pecl.php)).
* Execute the following command in your project root folder.

```
composer update
```

## **Tutorials**

DynamicPDF Cloud API provides numerous tutorials to help get started programming using one of the APIs. The following table lists the tutorial project or file name. You can also download the `php-client-examples` project from Github.  This project contains samples for all tutorials and Users Guide samples. 

* [PHP Client Examples (`php-client-examples`)](https://github.com/dynamicpdf-api/php-client-examples)

| Tutorial Title                                     | Project/File/Class      | Tutorial Location                                            |
| -------------------------------------------------- | ----------------------- | ------------------------------------------------------------ |
| Merging PDFs                                       | MergePdfs               | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/merging-pdfs |
| Completing an AcroForm                             | `CompletingAcroForm`    | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/form-completion |
| Creating a PDF Using a DLEX and the `pdf` Endpoint | `CreatingPdfDlex`       | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/dlex-pdf-endpoint |
| Adding Bookmarks to a PDF                          | `AddBookmarks`          | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/bookmarks |
| Creating a PDF Using the `dlex-layout` Endpoint    | `CreatingPdfDlexLayout` | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/dlex-layout |
| Extracting Image Metadata                          | `GetImageInfo`          | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/image-info |
| Extract PDF Metadata                               | `GetPdfInfo`            | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-info |
| Extracting PDF's Text                              | `ExtractingText`        | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-text |
| Extract XMP Metadata                               | `GetXmpMetaData`        | https://cloud.dynamicpdf.com/docs/tutorials/cloud-api/pdf-xmp |

For more information on the tutorials and example code, refer to

- https://cloud.dynamicpdf.com/docs/tutorials/tutorials-overview, and
- https://cloud.dynamicpdf.com/docs/usersguide/cloud-api/cloud-api-overview.

# Support

The primary source for the DynamicPDF Cloud API support is through [Stack Overflow](https://stackoverflow.com/questions/tagged/dynamicpdf-api). Please use the "[dynamicpdf-api](https://stackoverflow.com/questions/tagged/dynamicpdf-api)" tag to ask questions. Our support team actively monitors the tag and responds promptly to any questions.  Also, let us know you asked the question by following up with an email to [support@dynamicpdf.com](mailto:support@dynamicpdf.com). 

## Pro Plan Subscribers[#](https://cloud.dynamicpdf.com/support#pro-plan-subscribers)

Ticket support is available to Pro Plan subscribers. But we still encourage you to help the community by posting on Stack Overflow when possible. You can also email [support@dynamicpdf.com](mailto:support@dynamicpdf.com) if you need to ask something specific to your use case that may not help the DynamicPDF Cloud API community.

# License

The `php-client` library is licensed under the [MIT License](./LICENSE).



