<?php

namespace Btm\JawalySms;

use GuzzleHttp\Client;

class JawalySmsClient
{
    const API_URL = "http://www.4jawaly.net/api/sendsms.php";

    private $client;
    private $headers;
    private $username ;
    private $password ;
    private $senderName;
    private $Unicode ;
    private $TypeReturn;
    private $additionalParams;
    public $configs;


    public function __construct()
    {

        $this->configs = \Config::get('JawalySms');

        $this->client = new Client();
        $this->headers = ['headers' => []];
        $this->additionalParams = [];
    }



    public function sendSMS($message,$to) {
      $this->username   = $this->configs["Username"];
      $this->password   = $this->configs["Password"];
      $this->senderName = $this->configs["SenderName"];
      $this->Unicode    = isset($this->configs["Unicode"])?$this->configs["Unicode"]:'E';
      $this->TypeReturn = isset($this->configs["TypeReturn"])?$this->configs["TypeReturn"]:'json';



      if(is_null($message) or !isset($message) or is_null($to) or !isset($to)) {
          throw new \Exception('MESSAGE And TO Number are Require');
      }



      return $this->client->get(self::API_URL,['query' =>
            [
              'username' => $this->username,
              'password' => $this->password,
              'numbers'  => $to,
              'message'  => $message,
              'sender'   => $this->senderName,
              'unicode'  => $this->Unicode,
              'return'   => $this->TypeReturn
            ]
         ]);

    }



    // public function serializeResponse($body) {
    //     switch ($body) {
    //       case '-100':
    //           return "Missing parameters (not exist or empty) Username + password." ;
    //         break;
    //       case '-110':
    //             return "Account not exist (wrong username or password)." ;
    //         break;
    //       case '-111':
    //           return "The account not activated." ;
    //         break;
    //       case '-112':
    //             return "Blocked account." ;
    //         break;
    //         case '-113':
    //           return "Not enough balance." ;
    //         break;
    //       case '-114':
    //             return "The service not available for now." ;
    //         break;
    //       case '-115':
    //           return "The sender not available (if user have no opened sender)." ;
    //         break;
    //       case '-116':
    //             return "Invalid sender name" ;
    //         break;
    //       case '-120':
    //               return "No destination addresses, or all destinations are not correct" ;
    //         break;
    //
    //       default:
    //              return "unknown Error !";
    //         break;
    //     }
    //
    //
    // }


}
