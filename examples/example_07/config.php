<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 *
 * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_07/callback.php
 * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
 */
$config = [
    'callback' => 'http://localhost/hybridauth/examples/example_07/callback.php',
    'providers' => [

        'Google' => [
            'enabled' => true,
            'keys' => [
                'id'     => GOOGLE_ID,
                'secret' => GOOGLE_SECRET,
            ],
            'scope' => 'email',
        ],

        // 'Yahoo'     => ['enabled' => true, 'keys' => [ 'key'  => '...', 'secret' => '...']],
        // 'Facebook'  => ['enabled' => true, 'keys' => [ 'id'   => '...', 'secret' => '...']],
        // 'Twitter'   => ['enabled' => true, 'keys' => [ 'key'  => '...', 'secret' => '...']],
        // 'Instagram' => ['enabled' => true, 'keys' => [ 'id'   => '...', 'secret' => '...']],

    ],
];
