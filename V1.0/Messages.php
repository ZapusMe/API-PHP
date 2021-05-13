<?php
    
    
    namespace App\Controller;
    
    
    class Messages
    {
        //As descrições contidas aqui, servem para todos os metodos.
        //Caso algum metodo utilise-as de forma diferente, tera uma descrição na parte superior do metodo.
        //$apiKey => Sua chave de acesso a api do Zapus.
        //$chatWid => Informe o número do contato no formato id do WhatsApp. EX 5522999999999@c.us.
        //$sendByAccount => Api token do usuário registrado dentro do Zapus.me, todas as mensagens enviada serão vinculadas ao usuário em questão.
        //$message => Você pode enviar emoticons no corpo da mensagem.
    
        //--------------------------------------------------------------------------------------------------------------
        
        //$typing => Envie "true" para exibir a mensagem de digitando no WhatsApp do seu contato e "false" para cancelar o evento. O evento de digitação se não cancelado, será encerrado automaticamente após 30 segundos.
        public static function smartTyping($apiKey, $chatWid, $typing)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'typing' => $typing
            ];
        
            $post = Helpers::post('messages/smart-typing',$header,$body);
            Helpers::logs('messages','smart-typing',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$recording => Envie "true" para exibir a mensagem de gravando áudio no WhatsApp do seu contato e "false" para cancelar o evento. O evento de gravando áudio se não cancelado, será encerrado automaticamente após 30 segundos.
        public static function smartRecording($apiKey, $chatWid, $recording)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'recording' => $recording
            ];
        
            $post = Helpers::post('messages/smart-recording',$header,$body);
            Helpers::logs('messages','smart-recording',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function sendMessageText($apiKey, $chatWid, $message, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'message' => $message,
                'send_by_account' => $sendByAccount
            ];
        
            $post = Helpers::post('messages/send-message-text',$header,$body);
            Helpers::logs('messages','send-message-text',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$contactPhone => Número do contato que deseja compartilhar no formato id do WhatsApp.
        //$contactName =>  Nome do contato que deseja compartilhar.
        public static function sendContactVcard($apiKey, $chatWid, $contactPhone, $contactName, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'contact_phone' => $contactPhone,
                'contact_name' => $contactName,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-contact-vcard',$header,$body);
            Helpers::logs('messages','send-contact-vcard',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$contactList => Informe os números dos contatos separados por vírgula. Faremos uma verificação para saber se os contatos possuem WhatsApp antes do envio.
        public static function sendContactVcardList($apiKey, $chatWid, $contactList, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'contact_list' => $contactList,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-contact-vcard-list',$header,$body);
            Helpers::logs('messages','send-contact-vcard-list',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$latitude => Envie a latitude do endereço, obrigatório para o WhatsApp carregar o mapa.
        //$longitude => Envie a longitude do endereço, obrigatório para o WhatsApp carregar o mapa.
        //$address => Endereço a ser enviado.
        public static function sendLocation($apiKey, $chatWid, $latitude, $longitude, $address, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'address' => $address,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-location',$header,$body);
            Helpers::logs('messages','send-location',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$file => Enviar em base64 do tipo Data Uri, envie gif com no máximo 512x512. Dê preferência a gif quadrados com no máximo 1mb, ter uma melhor performance. ('image/gif', 'image/png', 'image/jpg', 'image/jpeg')
        public static function sendImageAsSticker($apiKey, $chatWid, $file, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'file' => $file,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-image-as-sticker',$header,$body);
            Helpers::logs('messages','send-image-as-sticker',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //link => url que você deseja enviar ao contato.
        public static function sendLinkPreview($apiKey, $chatWid, $link, $message, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'link' => $link,
                'message' => $message,
                'send_by_account' => $sendByAccount
            ];
        
            $post = Helpers::post('messages/send-link-preview',$header,$body);
            Helpers::logs('messages','send-link-preview',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$messageReplyAccessToken => access_token gerado pelo Zapus.me para cada mensagem enviada ou recebida.
        public static function sendMessageReply($apiKey, $chatWid, $messageReplyAccessToken, $message, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'message_reply_access_token' => $messageReplyAccessToken,
                'message' => $message,
                'send_by_account' => $sendByAccount
            ];
        
            $post = Helpers::post('messages/send-message-reply',$header,$body);
            Helpers::logs('messages','send-message-reply',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$messageForwardAccessToken => access_token gerado pelo Zapus.me para cada mensagem enviada ou recebida.
        public static function sendForwardMessage($apiKey, $chatWid, $messageForwardAccessToken, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'message_forward_access_token' => $messageForwardAccessToken,
                'send_by_account' => $sendByAccount
            ];
        
            $post = Helpers::post('messages/send-forward-message',$header,$body);
            Helpers::logs('messages','send-forward-message',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$messageAccessToken => access_token gerado pelo Zapus.me para cada mensagem enviada ou recebida.
        public static function delete($apiKey, $chatWid, $messageAccessToken)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'message_access_token' => $messageAccessToken
            ];
        
            $post = Helpers::post('messages/delete',$header,$body);
            Helpers::logs('messages','delete',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$file => Enviar em base64 do tipo Data Uri.
        //$filename => Nome da imagem/arquivo com extensão.
        //$caption => Sua mensagem ou descrição sobre a imagem.
        public static function sendMessageImage($apiKey, $chatWid, $file, $filename, $caption, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'file' => $file,
                'filename' => $filename,
                'caption' => $caption,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-message-image',$header,$body);
            Helpers::logs('messages','send-message-image',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$file => Enviar em base64 do tipo Data Uri.
        //$filename => Nome da imagem/arquivo com extensão.
        //$caption => Sua mensagem ou descrição sobre o arquivo.
        public static function sendMessageFile($apiKey, $chatWid, $file, $filename, $caption, $sendByAccount)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'file' => $file,
                'filename' => $filename,
                'caption' => $caption,
                'send_by_account' => $sendByAccount,
            ];
        
            $post = Helpers::post('messages/send-message-file',$header,$body);
            Helpers::logs('messages','send-message-file',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$shippingStatus => Filtrar as mensagens por status do envio, esse status se refere ao envio feito pelo Zapus.me. sent = enviado, failed = falha "será feita uma nova tentativa a cada 5 minutos", queued = envio agendado, cancelled = cancelado, daily_limit = limite diário de envio atingido, error = se ocorrer um erro no envio, all = todo os status.
        //$source => Origem da mensagem, se foi enviada ou recebida. in = enviado, out = recebeu (se usar out não a necessidade de usar o parâmetro shipping_status) ou all = enviado e recebido.
        //$messageType => chat = texto simples c/ ou s/ emoticons, document = arquivos, image = imagens, location = localização, link = link preview, ptt = aúdio gravado no WhatsApp, audio = aúdio em geral, video = vídeos e gif, sticker = sticker animados ou não, vcard = contato, multi_vcard = lista de contato e all = qualquer tipo.
        //$messageAck =>  Filtrar por status da mensagem dentro do WhatsApp. 0 = aguardando envio, 1 = entregue no servidor, -1 = mensagem com erro, 2 = entregue no WhatsApp do seu contato, 3 = mensagem lida pelo seu contato, 4 = mensagem assistida "geralmente usado em vídeos" all = todos os status. O controle de privacidade do seu contato pode afetar a confirmação de leitura.
        //$messageWid => Id da mensagem fornecido pelo WhatsApp. Se você informar este parâmetro, demais parametros serão ignorados com exceção do phone_to.
        //$accessToken => Token da mensagem gerado pelo Zapus.me no momento da solicitação de envio. Se você informar este parâmetro, demais parametros serão ignorados com exceção do phone_to.
        //$dateStart => Informe uma data de início para filtrar a partir desta data. (Formato: Y-m-d)
        //$dateEnd => Informe uma data limite para filtrar até esta data. (Formato: Y-m-d)
        public static function findMessages($apiKey, $chatWid, $shippingStatus, $source, $messageType, $messageAck, $messageWid, $accessToken, $dateStart, $dateEnd)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'shipping_status' => $shippingStatus,
                'source' => $source,
                'message_type' => $messageType,
                'message_ack' => $messageAck,
                'message_wid' => $messageWid,
                'access_token' => $accessToken,
                'date_start' => $dateStart,
                'date_end' => $dateEnd,
            ];
        
            $post = Helpers::post('messages/find-messages',$header,$body);
            Helpers::logs('messages','find-messages',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$messageWid => Informe o id da mensagem no WhatsApp para retornar o acess_token de nosso indexador.
        //$accessToken => Informe o access_token de uma mensagem indexada para retornar o id da mensagem no WhatsApp.
        public static function get($apiKey, $messageWid, $accessToken)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'message_wid' => $messageWid,
                'access_token' => $accessToken
            ];
        
            $post = Helpers::post('messages/get',$header,$body);
            Helpers::logs('messages','get',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function getFile($accessToken)
        {
            $post = Helpers::get('messages/get-file/'.$accessToken);
            Helpers::logs('messages','get-file',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
    }