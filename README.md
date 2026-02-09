![](./logo-banner2.png)

PHP Client (`php-client`)
=================================

The PHP Client (`php-client`) project uses the DynamicPDF API's PHP client library to create, merge, split, form fill, stamp, obtain metadata, convert, and secure/encrypt PDF documents. 

The DynamicPDF API consists of the following endpoints.

* `dlex-layout`
* `image-info`
* `pdf`
* `pdf-info`
* `pdf-security-info`
* `pdf-text`
* `pdf-xmp`

For more information, please visit [DynamicPDF API](https://dpdf.io/ "DynamicPDF API Homepage"). Support for other languages/platforms (PHP, C#, Node.js) is available on GitHub ([DynamicPDF API at GitHub](https://github.com/dynamicpdf-api "DynamicPDF API at GitHub")).

## Requirements

- [PHP 7.4.0 or higher](https://www.php.net/)

## Installation

Use Composer to install the client library. You can also download a zip file that you can use to install the client library manually.

### Composer

The preferred method is via [Composer](https://getcomposer.org/). Install Composer as follows.

* Install Composer if not already installed ([installation instructions](https://getcomposer.org/doc/00-intro.md)).

* Ensure the `ext_curl` extension is enabled in your `php.ini` file ([installation instructions](https://www.php.net/manual/en/install.pecl.php)).
* Execute the following command in your project root folder.

```
composer update
```

### Manual Installation

To manually install the client library, download the zip file from [Github](https://codeload.github.com/dynamicpdf-api/php-client/zip/refs/heads/main). Unzip the php-client-library on your local machine and then use the library in you local code by requiring the following file.

```php
require_once '<path-to-client-library>/src/DpdfAPI.php'
```

A sample file, `PdfExample.php` is included in the zip file demonstrating its use.

## Documentation

* Obtain overview documentation for the DynamicPDF API Client libraries from the [API Users Guide](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/cloud-api-client-libraries).
* Access the documentation for each particular endpoint from the following Users Guide pages. 

| Endpoint      | REST Endpoint                                                | REST Endpoint Client Library                                 | Description                                                  |
| ------------- | ------------------------------------------------------------ | ------------------------------------------------------------ | ------------------------------------------------------------ |
| `dlex-layout` | [API Users Guide - `dlex-layout`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-dlex-layout) | [`dlex-layout`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-dlex-layout) | Returns a PDF after processing a DLEX file with it's associated JSON data. |
| `image-info`  | [API Users Guide - `image-info`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-image-info) | [`image-info`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-image-info) | Returns image metadata as a JSON document.                   |
| `pdf`         | [API Users Guide - `pdf`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-pdf) | [`pdf`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-pdf) | Returns a PDF after performing one of the pdf endpoint's tasks (`page`, `dlex`, `image`) or merging. |
| `pdf-security-info` | [API Users Guide - `pdf-security-info`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-pdf-security-info) | [`pdf-security-info`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/cloud-api-pdf-security-info) | Returns PDFs Security metadata as a JSON document. |
| `pdf-info`    | [API Users Guide - `pdf-Info`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-pdf-info) | [`pdf-info`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-pdf-info) | Returns PDF metadata as a JSON document.                     |
| `pdf-text`    | [API Users Guide - `pdf-text`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-pdf-text) | [`pdf-text`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-pdf-text) | Returns the text from a PDF as a JSON document.              |
| `pdf-xmp`     | [API Users Guide - `pdf-xmp`](https://dpdf.io/docs/usersguide/cloud-api/cloud-api-pdf-xmp) | [`pdf-xmp`](https://dpdf.io/docs/usersguide/cloud-api/client-libraries/client-api-pdf-xmp) | Returns XMP metadata from a PDF.                             |

## REST Client

* The `php-client` uses the PHP built-in [cURL](https://curl.se/) application. Refer to the [Client URL Library](https://www.php.net/manual/en/book.curl.php) page in the PHP Manual for more information.

## **Tutorials**

The following table lists the available tutorials. 

| Tutorial Title                                     | Tutorial Location                                            |
| -------------------------------------------------- | ------------------------------------------------------------ |
| Merging PDFs                                       | https://dpdf.io/docs/tutorials/cloud-api/merging-pdfs |
| Completing an AcroForm                             | https://dpdf.io/docs/tutorials/cloud-api/form-completion |
| Creating a PDF Using a DLEX and the `pdf` Endpoint | https://dpdf.io/docs/tutorials/cloud-api/dlex-pdf-endpoint |
| Adding Bookmarks to a PDF                          | https://dpdf.io/docs/tutorials/cloud-api/bookmarks |
| Creating a PDF Using the `dlex-layout` Endpoint    | https://dpdf.io/docs/tutorials/cloud-api/dlex-layout |
| Extracting Image Metadata                          | https://dpdf.io/docs/tutorials/cloud-api/image-info |
| Extract PDF Metadata                               | https://dpdf.io/docs/tutorials/cloud-api/pdf-info |
| Extracting PDF's Text                              | https://dpdf.io/docs/tutorials/cloud-api/pdf-text |
| Extract XMP Metadata                               | https://dpdf.io/docs/tutorials/cloud-api/pdf-xmp |

For more information on the tutorials and example code, refer to

- https://dpdf.io/docs/tutorials/tutorials-overview, and
- https://dpdf.io/docs/usersguide/cloud-api/cloud-api-overview.

# Support

The primary source for the DynamicPDF API support is through [Stack Overflow](https://stackoverflow.com/questions/tagged/dynamicpdf-api). Please use the "[dynamicpdf-api](https://stackoverflow.com/questions/tagged/dynamicpdf-api)" tag to ask questions. Our support team actively monitors the tag and responds promptly to any questions.  Also, let us know you asked the question by following up with an email to [support@dynamicpdf.com](mailto:support@dynamicpdf.com). 

## Pro Plan Subscribers[#](https://dpdf.io/support#pro-plan-subscribers)

Ticket support is available to Pro Plan subscribers. But we still encourage you to help the community by posting on Stack Overflow when possible. You can also email [support@dynamicpdf.com](mailto:support@dynamicpdf.com) if you need to ask something specific to your use case that may not help the DynamicPDF API community.

# License

The `php-client` library is licensed under the [MIT License](./LICENSE).



