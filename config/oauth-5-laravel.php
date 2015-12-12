<?php
return [ 

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session', 

    /**
     * Consumers
     */
    'consumers' => [


        'Google' => [
            'client_id'     => '200743724753-l65uu3hf6h5rsh6aceq957275srquua9.apps.googleusercontent.com',
            'client_secret' => 'Mfgy6pZJeIQGtnTLvbRXm8wC',
            'scope'         => ['userinfo_email', 'userinfo_profile'],
        ],        

    ]

];