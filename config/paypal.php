<?php
return array(
    // set your paypal credential
    'client_id' => 'AVg29_oX2Kl-jTzDhOZo5fLwFZLuzNbK6f0DhXU073gj5PTlKahDCnaSMAk3YI7oIFp42aEDqTmdb0aZ',
    'secret' => 'EF0rrl8ggzcNAChEh1vVEyaqZXUHJc6b_OiyliMKaFwaWL7xpw55RIaeUsIIECkt4lRI49-0BOvDaHkZ',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);