<?php
/*!
* An example on how use Access Tokens to access providers APIs, and how to setup custom API endpoints.
*/

include '../vendor/autoload.php';
include 'constants.php';

$config = [
    'callback'  => Hybridauth\HttpClient\Util::getCurrentUrl(),

    'keys' => [ 'id' => FACEBOOK_ID, 'secret' => FACEBOOK_SECRET ],

    'endpoints' => [
        'api_base_url'     => 'https://graph.facebook.com/v2.8/',
        'authorize_url'    => 'https://www.facebook.com/dialog/oauth',
        'access_token_url' => 'https://graph.facebook.com/oauth/access_token',
    ]
];

try {
    $adapter = new Hybridauth\Provider\Facebook( $config );

    $adapter->setAccessToken(['access_token' => FACEBOOK_ACCESS_TOKEN]);

    $userProfile = $adapter->getUserProfile();

    // print_r( $userProfile );

    $adapter->disconnect();
}
catch( Exception $e ){
    echo $e->getMessage();
}
