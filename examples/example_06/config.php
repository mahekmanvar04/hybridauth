<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 */

$config = [
  /**
   * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_06/callback.php.
   * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
   */
  'callback' => 'http://localhost/hybridauth/examples/example_06/callback.php',
  'providers' => [
    'Twitter' => [
      'enabled' => true,
      'keys' => [
        'key' => '...',
        'secret' => '...',
      ],
    ],
    'LinkedIn' => [
      'enabled' => true,
      'keys' => [
        'id' => LINKDIN_ID,
        'secret' => LINKDIN_SECRET,
      ],
    ],
    'Facebook' => [
      'enabled' => true,
      'keys' => [
        'id' => '...',
        'secret' => '...',
      ],
    ],
  ],
];
