<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use function Swagger\scan;

class SwaggerController extends Controller
{
    public function show()
    {
        return view('documentation.v1');
    }

    public function build()
    {
        $apiDefinition = scan( app_path() );
        $apiDefinition->host =  env('SWAGGER_API_HOST', 'unoaritmetico.com');
        $apiDefinition->basePath = env('SWAGGER_API_BASEPATH', '/api');
        $apiDefinition->securityDefinitions[0]->tokenUrl = $apiDefinition->host . $apiDefinition->basePath;
        Storage::disk('public')->put("swagger/json/swagger.json", json_encode($apiDefinition->jsonSerialize()));
        return (app_is_https()) ? redirect()->secure("/documentation") : redirect("/documentation");
    }
}
