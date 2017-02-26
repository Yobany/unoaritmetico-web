<?php
if(!function_exists("asset_conditional")){
    function asset_conditional($asset){
        return (env("APP_HTTPS", "false") == "true") ? secure_asset($asset) : asset($asset);
    }
}