<!doctype html>
<html ng-app="app" ng-strict-di>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UNOARITMETICO</title>

    <meta name="theme-color" content="#0690B7">

    <link rel="manifest" href="manifest.json">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--[if lte IE 10]>
    <script type="text/javascript">document.location.href = '/unsupported-browser'</script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset_conditional('vendor/bootstrap-sass/assets/stylesheets/_bootstrap.scss')}}">
    <link rel="stylesheet" href="{{asset_conditional('vendor/angular-loading-bar/build/loading-bar.min.css')}}">
    <link rel="stylesheet" href="{{asset_conditional('vendor/angular-material/angular-material.min.css')}}">
    <link rel="stylesheet" href="{{asset_conditional('vendor/angular-material-data-table/dist/md-data-table.min.css')}}">
    <link rel="stylesheet" href="{{asset_conditional('vendor/angular-bootstrap/ui-bootstrap-csp.css')}}">

    <link rel="stylesheet" href="{{asset_conditional('app/style/app.css')}}">
</head>
<body ng-cloak>

<div ui-view="header"></div>
<div ui-view="main"></div>
<div ui-view="footer"></div>

<script src="{{asset_conditional('vendor/lodash/dist/lodash.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/jquery/dist/jquery.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular/angular.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-animate/angular-animate.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-aria/angular-aria.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/chart.js/dist/Chart.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-chart.js/dist/angular-chart.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-loading-bar/build/loading-bar.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-material/angular-material.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-material-data-table/dist/md-data-table.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-messages/angular-messages.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-ui-router/release/angular-ui-router.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/ngstorage/ngStorage.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/ngstorage/ngStorage.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/restangular/dist/restangular.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/satellizer/satellizer.min.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('vendor/angular-bootstrap/ui-bootstrap.min.js')}}" type='text/javascript'></script>

<script src="{{asset_conditional('app/module.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/config/chart.config.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/config/loading_bar.config.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/config/routes.config.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/config/satellizer.config.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/config/theme.config.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/capitalize.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/human_readable.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/truncate_characters.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/truncate_words.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/trust_html.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/filter/ucfirst.filter.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/run/routes.run.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/module/login/login.controller.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/service/API.service.js')}}" type='text/javascript'></script>
<script src="{{asset_conditional('app/service/toast.service.js')}}" type='text/javascript'></script>
</body>
</html>
