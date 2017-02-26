<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Swagger UI</title>
    <link rel="icon" type="image/png" href="{{asset_conditional('swagger/images/favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset_conditional('swagger/images/favicon-16x16.png')}}" sizes="16x16" />
    <link href="{{asset_conditional('swagger/css/typography.css')}}" media='screen' rel='stylesheet' type='text/css'/>
    <link href="{{asset_conditional('swagger/css/reset.css')}}" media='screen' rel='stylesheet' type='text/css'/>
    <link href="{{asset_conditional('swagger/css/screen.css')}}" media='screen' rel='stylesheet' type='text/css'/>
    <link href="{{asset_conditional('swagger/css/reset.css')}}" media='print' rel='stylesheet' type='text/css'/>
    <link href="{{asset_conditional('swagger/css/print.css')}}" media='print' rel='stylesheet' type='text/css'/>

    <script src="{{asset_conditional('swagger/lib/object-assign-pollyfill.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/jquery-1.8.0.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/jquery.slideto.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/jquery.wiggle.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/jquery.ba-bbq.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/handlebars-4.0.5.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/lodash.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/backbone-min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/swagger-ui.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/highlight.9.1.0.pack.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/highlight.9.1.0.pack_extended.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/jsoneditor.min.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/marked.js')}}" type='text/javascript'></script>
    <script src="{{asset_conditional('swagger/lib/swagger-oauth.js')}}" type='text/javascript'></script>

    <script type="text/javascript">
        $(function () {
            var url = "{{asset_conditional('swagger/json/swagger.json')}}"

            hljs.configure({
                highlightSizeThreshold: 5000
            });

            // Pre load translate...
            if(window.SwaggerTranslator) {
                window.SwaggerTranslator.translate();
            }
            window.swaggerUi = new SwaggerUi({
                url: url,
                dom_id: "swagger-ui-container",
                supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
                onComplete: function(swaggerApi, swaggerUi){
                    if(typeof initOAuth == "function") {
                        initOAuth({
                            clientId: "your-client-id",
                            clientSecret: "your-client-secret-if-required",
                            realm: "your-realms",
                            appName: "your-app-name",
                            scopeSeparator: " ",
                            additionalQueryStringParams: {}
                        });
                    }

                    if(window.SwaggerTranslator) {
                        window.SwaggerTranslator.translate();
                    }
                },
                onFailure: function(data) {
                    log("Unable to Load SwaggerUI");
                },
                docExpansion: "none",
                jsonEditor: false,
                defaultModelRendering: 'schema',
                showRequestHeaders: false,
                showOperationIds: false
            });

            window.swaggerUi.load();

            $("#input_apiKey").on("change", addApiKeyAuthorization);

            function log() {
                if ('console' in window) {
                    console.log.apply(console, arguments);
                }
            }

            function addApiKeyAuthorization(){
                var key = $('#input_apiKey').val();
                if(key && key.trim() != "") {
                    var apiKeyAuth = new SwaggerClient.ApiKeyAuthorization("Authorization", "Bearer " + key, "header");
                    swaggerUi.api.clientAuthorizations.add("Authorization", apiKeyAuth);
                    log("added key " + key);
                }else{
                    if (swaggerUi) {
                        swaggerUi.api.clientAuthorizations.remove('Authorization');
                        log('Removed token key');
                    }
                }
            }
        });
    </script>
</head>

<body class="swagger-section">
<div id='header'>
    <div class="swagger-ui-wrap">
        <a id="logo" href="http://swagger.io"><img class="logo__img" alt="swagger" height="30" width="30" src="{{asset_conditional('swagger/images/logo_small.png')}}" /><span class="logo__title">swagger</span></a>
        <form id='api_selector'>
            <input placeholder="Token" id="input_apiKey" name="apiKey" type="text"/>
        </form>
    </div>
</div>

<div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>
<div id="swagger-ui-container" class="swagger-ui-wrap"></div>
</body>
</html>