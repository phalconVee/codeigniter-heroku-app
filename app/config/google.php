<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google Project API Credentials
| -------------------------------------------------------------------
|
| To get a google app details you have to create a Google app
| at Google developers panel ( https://console.developers.google.com/)
|
|  clientId               string   Your Google App ID.
|  clientSecret           string   Your Google App Secret.
|  redirectUrl   string   URL to redirect back to after login. (do not include base URL)
*/


$config['clientId']     = '22991676920-2end9e82hahg7jq1nq6qrf429nhe1gpj.apps.googleusercontent.com';
$config['clientSecret'] = 'wgB7iFc1tmWbt5p9uZIMzMnL';
$config['redirectUrl']  = base_url() . 'social_auth/google/';