$(function () {
    var url = window.location.search.match(/url=([^&]+)/);
    if (url && url.length > 1) {
        url = decodeURIComponent(url[1]);
    } else {
        url = $('#main-json').attr('data-json');
    }

    // Pre load translate...
    if(window.SwaggerTranslator) {
        window.SwaggerTranslator.translate();
    }
    window.swaggerUi = new SwaggerUi({
        url: url,
        validatorUrl : null,
        dom_id: "swagger-ui-container",
        supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
        onComplete: function(swaggerApi, swaggerUi){
            if(typeof initOAuth == "function") {
                initOAuth({
                    clientId: "f3d259ddd3ed8ff3843839b",
                    clientSecret: "4c7f6f8fa93d59c45502c0ae8c4a95b",
                    realm: "your-realms",
                    appName: "Delivery",
                    scopeSeparator: ",",
                    additionalQueryStringParams: {}
                });
            }

            if(window.SwaggerTranslator) {
                window.SwaggerTranslator.translate();
            }

            $('pre code').each(function(i, e) {
                hljs.highlightBlock(e)
            });

            addApiKeyAuthorization();
        },
        onFailure: function(data) {
            log("Unable to Load SwaggerUI");
        },
        docExpansion: "none",
        jsonEditor: false,
        apisSorter: "alpha",
        defaultModelRendering: 'schema',
        showRequestHeaders: false
    });

    function addApiKeyAuthorization(){
        var key = $('#input_apiKey')[0].value;
        if(key && key.trim() != "") {
            var apiKeyAuth = new SwaggerClient.ApiKeyAuthorization("Authorization", key, "header");
            window.swaggerUi.api.clientAuthorizations.add("Authorization", apiKeyAuth);
            log("added key " + key);
        }else{
            if (window.swaggerUi) {
                window.swaggerUi.api.clientAuthorizations.remove('Authorization');
                log('Removed token key');
            }
        }
    }

    $('#input_apiKey').change(addApiKeyAuthorization);

    // if you have an apiKey you would like to pre-populate on the page for demonstration purposes...
    /*
     var apiKey = "myApiKeyXXXX123456789";
     $('#input_apiKey').val(apiKey);
     */

    window.swaggerUi.load();

    function log() {
        if ('console' in window) {
            console.log.apply(console, arguments);
        }
    }
});