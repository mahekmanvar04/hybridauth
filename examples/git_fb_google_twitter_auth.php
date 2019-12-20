<?php
/*!
* Details how to use users in a similar fashion to Hybridauth 2. Note that while Hybridauth 3 provides 
* a similar interface to Hybridauth 2, both versions are not fully compatible with each other.
*/

include '../vendor/autoload.php';
include 'constants.php';

use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;

$config = [
    'callback' => HttpClient\Util::getCurrentUrl(),

    'providers' => [
        'GitHub' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => GITHUB_ID, 'secret' => GITHUB_SECRET ], 
        ],

        'Google' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => GOOGLE_ID, 'secret' => GOOGLE_SECRET ],
        ],

        'Facebook' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => FACEBOOK_ID, 'secret' => FACEBOOK_SECRET ],
        ],

        'Twitter' => [ 
            'enabled' => true,
            'keys'    => [ 'key' => TWITTER_ID, 'secret' => TWITTER_SECRET ],
        ]
    ],

    /* optional : set debug mode
        'debug_mode' => true,
        // Path to file writeable by the web server. Required if 'debug_mode' is not false
        'debug_file' => __FILE__ . '.log', */

    /* optional : customize Curl settings
        // for more information on curl, refer to: http://www.php.net/manual/fr/function.curl-setopt.php  
        'curl_options' => [
            // setting custom certificates
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_CAINFO         => '/path/to/your/certificate.crt',

            // set a valid proxy ip address
            CURLOPT_PROXY => '*.*.*.*:*',

            // set a custom user agent
            CURLOPT_USERAGENT      => ''
        ] */
    ];

    try {    
        $hybridauth = new Hybridauth( $config );
        if(!empty($_REQUEST['auth'])){
            $auth = $_REQUEST['auth'];
        }else{
            $auth = "GitHub";
        }
        $adapter = $hybridauth->authenticate( $auth );
    // $adapter = $hybridauth->authenticate( 'GitHub' );

    // $adapter = $hybridauth->authenticate( 'Google' );
    // $adapter = $hybridauth->authenticate( 'Facebook' );
    // $adapter = $hybridauth->authenticate( 'Twitter' );

        $tokens = $adapter->getAccessToken();
        $userProfile = $adapter->getUserProfile();

    // print_r( $tokens );
    // print_r( $userProfile );

        $adapter->disconnect();
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }
