<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
    public function show()
    {
        return view('documentation.v1');
    }

    public function build()
    {
        $appFolder = app_path();
        $jsonContent = \Swagger\scan( $appFolder );
        $jsonContent->host =  env('SWAGGER_API_HOST', 'unoaritmetico.com');
        $jsonContent->basePath = env('SWAGGER_API_BASEPATH', '/api');
        $jsonContent->securityDefinitions[0]->tokenUrl =
            $jsonContent->host . $jsonContent->basePath;

        header('Content-Type: application/json');
        $fileLocation = public_path('\\swagger\\json\\swagger.json');
        $jsonFile = fopen( $fileLocation , 'w');
        fwrite( $jsonFile, $jsonContent );
        fclose( $jsonFile );


        return (app_is_https()) ? redirect()->secure("/documentation") : redirect("/documentation");
    }
}
