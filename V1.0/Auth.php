<?php

    namespace App\Controller;

    class Auth
    {
        //As descrições contidas aqui, servem para todos os metodos.
        //Caso algum metodo utilise-as de forma diferente, tera uma descrição na parte superior do metodo.
        //$apiKey => Sua chave de acesso a api do Zapus.
        //$webHooks => Você receberá nessa url eventos de confirmação de envio, status, ...

        //--------------------------------------------------------------------------------------------------------------

        //$webHooks => Você receberá nessa url eventos de confirmação de envio, status, ...
        public static function login($apiKey, $webhooks = [])
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
            if(empty($webhooks)){
                $body = [
                    'webhookMessage' => '',
                    'webhookIncomingCall' => '',
                    'webhookStateChanged' => '',
                    'webhookQrcode' => '',
                    'webhookLiveLocation' => '',
                    'webhookParticipantsChanged' => '',
                    'webhookAddedToGroup' => '',
                ];
            }else{
                $body = [
                    'webhookMessage' => $webhooks['webhookMessage'],
                    'webhookIncomingCall' => $webhooks['webhookIncomingCall'],
                    'webhookStateChanged' => $webhooks['webhookStateChanged'],
                    'webhookQrcode' => $webhooks['webhookQrcode'],
                    'webhookLiveLocation' => $webhooks['webhookLiveLocation'],
                    'webhookParticipantsChanged' => $webhooks['webhookParticipantsChanged'],
                    'webhookAddedToGroup' => $webhooks['webhookAddedToGroup'],
                ];
            }

            $post = Helpers::post('auth/login', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

        public static function logout($apiKey)
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;

            $body = [];

            $post = Helpers::post('auth/logout', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

        public static function close($apiKey)
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;

            $body = [];

            $post = Helpers::post('auth/close', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

        public static function restart($apiKey)
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;

            $body = [];

            $post = Helpers::post('auth/restart', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

        public static function browserSessionToken($apiKey)
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;

            $body = [];

            $post = Helpers::post('auth/browser-session-token', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

        public static function status($apiKey)
        {
            $header = [];

            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;

            $body = [];

            $post = Helpers::post('auth/status', $header, $body);
            Helpers::logs('auth','login',$post);
            return $post;
        }

        //--------------------------------------------------------------------------------------------------------------

    }