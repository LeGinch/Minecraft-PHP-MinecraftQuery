<?php
    class MinecraftQuery {

        private $host;
        private $port;
        private $server;
        private $name;


        public function __construct($host, $port, $name) {
            $this->host = $host;
            $this->port = $port;
            $this->name = $name;
        }


        public function GetStatus(){
            $server = json_decode(file_get_contents('https://mcapi.us/server/status?ip=' . $this->host . '&port=' . $this->port . '' ));
            if($server->online == true){
                $statut = "En Ligne"; 
            } else {
                $statut = "Hors Ligne"; 
                
            }
            return $statut;

        }

        public function GetPlayerCount(){
            $server = json_decode(file_get_contents('https://mcapi.us/server/status?ip=' . $this->host . '&port=' . $this->port . '' ));
            $online = $server->players->now;
            $max = $server->players->max;
            $playercount = '<span>' . $online . ' / ' . $max . '</span>' ;
            
            return $playercount ;
        }

        public function GetName(){
            return $this->name;

        }
    } 
?>