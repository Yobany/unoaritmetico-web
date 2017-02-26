<?php
if(!function_exists("asset_conditional")){
    function asset_conditional($asset){
        return app_is_https() ? secure_asset($asset) : asset($asset);
    }
}

if(!function_exists("app_is_https")){
    function app_is_https(){
        return (env("APP_HTTPS", "false") == "true");
    }
}
