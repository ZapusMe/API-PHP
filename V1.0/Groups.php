<?php
    
    namespace App\Controller;
    
    class Groups
    {
        //As descrições contidas aqui, servem para todos os metodos.
        //Caso algum metodo utilise-as de forma diferente, tera uma descrição na parte superior do metodo.
        //$apiKey => Sua chave de acesso a api do Zapus.
        //$chatWid => Informe o número do contato no formato id do WhatsApp. EX 5522999999999@c.us.
        //$message => Informe sua mensagem contento junto do participante contento um @ na frente do número.
        //$sendByAccount => Informe o API key do contato responsável pela mensagem.
        
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function getAllGroups($apiKey)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
            
            $body = [];
            
            $post = Helpers::post('groups/get-all-groups', $header, $body);
            Helpers::logs('groups','get-all-groups',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function leave($apiKey, $chatWid)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid
            ];
        
            $post = Helpers::post('groups/leave', $header, $body);
            Helpers::logs('groups','leave',$post);
            return $post;
        }

    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function getMembers($apiKey, $chatWid)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid
            ];
        
            $post = Helpers::post('groups/get-members', $header, $body);
            Helpers::logs('groups','get-members',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function getInviteLink($apiKey, $chatWid)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid
            ];
        
            $post = Helpers::post('groups/get-invite-link', $header, $body);
            Helpers::logs('groups','get-invite-link',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$contactWid => Informe o contato no formato id do WhatsApp.
        //$type => Informe "add" para adicionar um contato e "del" para remover.
        public static function addRemoveParticipant($apiKey, $chatWid, $contactWid, $type)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid,
                'contact_wid' => $contactWid,
                'type' => $type,
            ];
        
            $post = Helpers::post('groups/add-remove-participant', $header, $body);
            Helpers::logs('groups','add-remove-participant',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$type => Informe promote para promover a administrador e demote para remover despromover.
        public static function promoteDemoteAdmins($apiKey, $chatWid, $contactWid, $type)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid,
                'contact_wid' => $contactWid,
                'type' => $type,
            ];
        
            $post = Helpers::post('groups/promote-demote-admins', $header, $body);
            Helpers::logs('groups','promote-demote-admins',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function getAdmins($apiKey, $chatWid)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid,
            ];
        
            $post = Helpers::post('groups/get-admins', $header, $body);
            Helpers::logs('groups','get-admins',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$inviteLink => Informe o link do grupo.
        public static function getInfoFromInviteLink($apiKey, $inviteLink)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'invite_link' => $inviteLink
            ];
        
            $post = Helpers::post('groups/get-info-from-invite-link', $header, $body);
            Helpers::logs('groups','get-info-from-invite-link',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$inviteLink => Informe o link do grupo.
        public static function join($apiKey, $inviteLink)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'invite_link' => $inviteLink
            ];
        
            $post = Helpers::post('groups/join', $header, $body);
            Helpers::logs('groups','join',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$name => Informe o nome do grupo.
        //$participants => Informe a lista de participantes separadoras por ; e no formato id do WhatsApp.
        public static function create($apiKey, $name, $participants)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'name' => $name,
                'participants' => $participants
            ];
        
            $post = Helpers::post('groups/create', $header, $body);
            Helpers::logs('groups','create',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$mentioneds => Informe a lista de participantes que serão mencionados na mensagens, cada participante precisa estar no formato id do WhatsApp.
        public static function sendTextMentioned($apiKey, $chatWid, $message, $mentioneds, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid,
                'message' => $message,
                'mentioneds' => $mentioneds,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('groups/send-text-mentioned', $header, $body);
            Helpers::logs('groups','send-text-mentioned',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$messageReplyAccessToken => access_token da mensagem que deseja responder.
        //$message => Informe sua mensagem contento junto do participante contento um @ na frente do número.
        //$mentioneds => Informe a lista de participantes que serão mencionados na mensagens, cada participante precisa estar no formato id do WhatsApp.
        public static function sendMessageReplyWithMention($apiKey, $chatWid, $messageReplyAccessToken, $message, $mentioneds, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
    
            $body = [
                'chat_wid' => $chatWid,
                'message_reply_access_token' => $messageReplyAccessToken,
                'mentioneds' => $mentioneds,
                'message' => $message,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('groups/send-message-reply-with-mention', $header, $body);
            Helpers::logs('groups','send-message-reply-with-mention',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    }