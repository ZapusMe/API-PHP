<?php


namespace App\Controller;

class Chats
{
    //As descrições contidas aqui, servem para todos os metodos.
    //Caso algum metodo utilise de forma diferente ou utilise algum outro parametro, tera uma descrição na parte superior do metodo.
    //$apiKey => Sua chave de acesso a api do Zapus
    //$chatWid => Informe o número do contato no formato id do WhatsApp. EX 5522999999999@c.us

    //--------------------------------------------------------------------------------------------------------------

    //$pin => Envie "true" para fixar o chat e false para desafixar.
    public static function pin($apiKey, $chatWid, $pin)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
            'pin' => $pin
        ];

        $post = Helpers::post('chats/pin', $header, $body);
        Helpers::logs('chats', 'pin', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------

    //$zapusToo => Envie "true" para limpar as conversas do indexador do Zapus.me também e false para limpar apenas em seu WhatsApp.
    public static function clear($apiKey, $chatWid, $zapusToo)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
            'zapus_too' => $zapusToo
        ];

        $post = Helpers::post('chats/clear', $header, $body);
        Helpers::logs('chats', 'clear', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------

    //$zapusToo => Envie "true" para apagar a conversa do indexador do Zapus.me também e false para apagar apenas em seu WhatsApp.
    public static function delete($apiKey, $chatWid, $zapusToo)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
            'zapus_too' => $zapusToo
        ];

        $post = Helpers::post('chats/delete', $header, $body);
        Helpers::logs('chats', 'delete', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------

    //$archive => Envie true para arquivar e false para desarquivar.
    public static function archive($apiKey, $chatWid, $archive)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
            'archive' => $archive
        ];

        $post = Helpers::post('chats/archive', $header, $body);
        Helpers::logs('chats', 'archive', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------

    //$chatWid => Informe o número do contato no formato id do WhatsApp para retornar uma conversa específica e vazio para retornar todas as conversas.
    public static function get($apiKey, $chatWid)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
        ];

        $post = Helpers::post('chats/get', $header, $body);
        Helpers::logs('chats', 'get', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------

    //$seen => Envie "true" para marcar o chat como lido, seu contato irá receber confirmação de leitura das mensagens enviadas por ele e "false" para marcar o chat como não lido, esse evento não remove a marcação de leitura das mensagens que seu contato enviou, apenas faz uma marcação no WhatsApp informando que não foi lido. (A marcação de lido nas mensagens será de acordo com os critérios de privacidade configurados em seu WhatsApp.)
    public static function seen($apiKey, $chatWid, $seen)
    {
        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';
        $header[] = 'apiKey: ' . $apiKey;

        $body = [
            'chat_wid' => $chatWid,
            'seen' => $seen,
        ];

        $post = Helpers::post('chats/seen', $header, $body);
        Helpers::logs('chats', 'seen', $post);
        return $post;
    }

    //--------------------------------------------------------------------------------------------------------------
}