<?php

    /// <summary>
    /// Represents the pdf info endpoint.
    /// </summary>
    class PdfInfo extends Endpoint
    {
        private $resource;

        /// <summary>
        /// Initializes a new instance of the <see cref="PdfInfo"/> class.
        /// </summary>
        /// <param name="resource">The resource of type <see cref="PdfResource"/>.</param>
        public __construct(PdfResource $resource)
        {
            $this->resource = $resource;
            $this->EndpointName  = "pdf-info";
        }

       

        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public $StartPage;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
        public $PageCount;

        /// <summary>
        /// Process the pdf resource to get pdf's information.
        /// </summary>
        public function Process()
        {
            var task = ProcessAsync();
            task.Wait();
            return task.Result;
        }

        /// <summary>
        /// Process the pdf resource to get pdf's information.
        /// </summary>
        /// Returns collection of <see cref="PdfInfoResponse"/> as multithreading tasks <see cref="Task"/>.
        public Task<PdfInfoResponse> ProcessAsync()
        {
            var request = base.CreateRestRequest();
            request.AddHeader("Content-Type", "application/pdf");
            RestClient restClient = base.Client;
            return Task<PdfInfoResponse>.Run(() =>
            {
                PdfInfoResponse response = new PdfInfoResponse();
                request.AddParameter("", resource.Data, "application/pdf", ParameterType.RequestBody);
             
                IRestResponse restResponse = restClient.Post(request);
                if (restResponse.StatusCode == System.Net.HttpStatusCode.OK)
                {
                    response = new PdfInfoResponse(restResponse.Content);
                    response.IsSuccessful  = true;
                }
                else
                {
                    response = new PdfInfoResponse();
                    string output = restResponse.Content;
                    response.ErrorJson = restResponse.Content;
                    response.ErrorId = response.ErrorId;
                    response.ErrorMessage = restResponse.ErrorMessage;
                    response.IsSuccessful = false;
                    response.StatusCode = restResponse.StatusCode;
                }
                return response;
            });
        }
    }
?>
