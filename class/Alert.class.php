<?php
    class Alert {

        private $type;
        private $message;

        function __construct($type, $message){
            $this->type = $type;
            $this->message = $message;
        }

        private function setType($type, $message) {
            switch($this->type) {
                case 'success':
                    echo '<p class="alert success">' . $this->message .'</p>';
                break;
                case 'error':
                    echo '<p class="alert error">' . $this->message .'</p>';
                break;
                case 'waring':
                    echo '<p class="alert waring">' . $this->message .'</p>';
                break;
                case 'info':
                    echo '<p class="alert info">' . $this->message .'</p>';
                break;
            }
        }

        public function show(){
            return $this->setType($this->type, $this->message);
        }
    }

?>