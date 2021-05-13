<?php
    
    
    namespace App\Controller;
    
    
    class Tools
    {
        //As descrições contidas aqui, servem para todos os metodos.
        //Caso algum metodo utilise-as de forma diferente, tera uma descrição na parte superior do metodo.
        //$apiKey => Sua chave de acesso a api do Zapus.
        //$chatWid => Informe o número do contato no formato id do WhatsApp. EX 5522999999999@c.us.
        //$sendByAccount => Api token do usuário registrado dentro do Zapus.me, todas as mensagens enviada serão vinculadas ao usuário em questão.
        //$message => Você pode enviar emoticons no corpo da mensagem.
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$phone => Se não for enviado o código do país ex. Brasil 55, junto ao DDD e o número do seu contato, por padrão iremos assumir o código do país vinculado ao seu cadastro.
        public static function haveWhatsapp($apiKey, $phone)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'phone' => $phone,
            ];
        
            $post = Helpers::post('tools/have-whatsapp', $header, $body);
            Helpers::logs('tools','have-whatsapp',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$status => Informe o novo status que deseja aplicar.
        public static function status($apiKey, $status)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'status' => $status,
            ];
        
            $post = Helpers::post('tools/profile/status', $header, $body);
            Helpers::logs('tools','status',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$name => Informe o nome de perfil que deseja aplicar.
        public static function name($apiKey, $name)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'name' => $name,
            ];
        
            $post = Helpers::post('tools/profile/name', $header, $body);
            Helpers::logs('tools','status',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$photo => Informe a foto no formato base64 data uri.
        public static function picture($apiKey, $photo)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'photo' => $photo,
            ];
        
            $post = Helpers::post('tools/profile/picture', $header, $body);
            Helpers::logs('tools','picture',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$phone => Se não for enviado o código do país ex. Brasil 55, junto ao DDD e o número do seu contato, por padrão iremos assumir o código do país vinculado ao seu cadastro.
        public static function getPicture($apiKey, $phone)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'phone' => $phone,
            ];
        
            $post = Helpers::post('tools/profile/get-picture', $header, $body);
            Helpers::logs('tools','get-picture',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function device($apiKey)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [];
        
            $post = Helpers::post('tools/profile/device', $header, $body);
            Helpers::logs('tools','device',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //
        public static function restartService($apiKey)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [];
        
            $post = Helpers::post('tools/restart-service', $header, $body);
            Helpers::logs('tools','restart-service',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    
        //$chatWid => Se informado iremos sincronizar apenas o chat em questão, para sincronizar todos os chats basta deixar esse parâmetro vazio. Informe o contato no formato id do WhatsApp.
        //$onlyFiles => Envie true para sincronizar apenas mensagens com arquivos (gif, vídeos, imagens, documentos, stickers e etc..), envie false para sincronizar apenas mensagens que não contenha arquivos.
        public static function syncWhatsApp($apiKey, $chatWid, $onlyFiles)
        {
            $header = [];
        
            $header[] = 'Connection: Keep-Alive';
            $header[] = 'Content-type: application/json';
            $header[] = 'apiKey: ' . $apiKey;
        
            $body = [
                'chat_wid' => $chatWid,
                'only_files' => $onlyFiles
            ];
        
            $post = Helpers::post('tools/sync-whatsApp', $header, $body);
            Helpers::logs('tools','sync-whatsApp',$post);
            return $post;
        }
    
        //--------------------------------------------------------------------------------------------------------------
    }