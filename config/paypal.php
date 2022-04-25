<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => 'live', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username' => 'saad.mateen-facilitator_api1.koderlabs.com',       // Api Username
        'password' => '8CR4NXSZJSWFPJYP',       // Api Password
        'secret' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUO3oX0-b84bhyDeqhgXsjqzIvHF',

        'certificate' => '',    // Link to paypals cert file, storage_path('cert_key_pem.txt')
    ],
    'live' => [
        'username'    => 'info_api1.bullseyelocating.com',
        'password'    => 'M5CWKYVVJZFXEZM2',
        'secret'      => 'A5FdWnj8RRqeGvuq3QjAa1GsBXEkAIexEtz1obzGIXgEt18Wa2Dx7PY4',
        'certificate' => '',
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => 'USD',
    'billing_type'   => 'MerchantInitiatedBilling',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => false, // Validate SSL when creating api client.
];
