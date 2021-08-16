﻿<?php

    /// <summary>
    /// Represents an image information endpoint.
    /// </summary>
    class ImageInfo extends Endpoint
    {
        private $resource;

        /// <summary>
        /// Initializes a new instance of the <see cref="ImageInfo"/> class.
        /// </summary>
        /// <param name="resource">The image resource of type <see cref="ImageResource"/>.</param>
        public function ImageInfo(ImageResource $resource)
        {
            this.resource = resource;
            $this->EndpointName="image-info";
        }


        /// <summary>
        /// Gets or sets the start page.
        /// </summary>
        public  $StartPage;

        /// <summary>
        /// Gets or sets the page count.
        /// </summary>
        public $PageCount;

        /// <summary>
        /// Process the image resource to get image's information.
        /// </summary>
        public function Process()
        {
            var task = ProcessAsync();
            task.Wait();
            return task.Result;
        }

        /// <summary>
        /// Process the image resource to get image's information.
        /// </summary>
        /// Returns collection of <see cref="ImageResponse"/> as multithreading tasks <see cref="Task"/>.
        public Task<ImageResponse> ProcessAsync()
        {
            var request = base.CreateRestRequest();

            request.AddHeader("Content-Type", "image/" + resource.FileExtension.Substring(1));

            RestClient restClient = base.Client;
            return Task<ImageResponse>.Run(() =>
            {
                ImageResponse response = null;
                request.AddParameter("", resource.Data, "image/" + resource.FileExtension.Substring(1), ParameterType.RequestBody);
                IRestResponse restResponse = restClient.Post(request);
                if (restResponse.StatusCode == System.Net.HttpStatusCode.OK)
                {
                    response = new ImageResponse(restResponse.Content);
                    response.IsSuccessful = true;
                }
                else
                {
                    response = new ImageResponse();
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
