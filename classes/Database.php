<?php



include_once 'classes/Message.php';

class Database {

    private $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ajaxchat', 'ajaxchatuser', 'We Love SQL API!');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'fail to connect DB: ' . $e->getMessage();
            exit(1);
        }
    }

    public function createMessage(Message $message) {
        //$timestamp = $message->get()->format('Y-m-d H:i:s');
        $text = $message->getContent();
        $stmt = $this->pdo->prepare('INSERT INTO message(timestamp, text) VALUES(:timestamp, :text);');
        $stmt->bindValue('timestamp', $date);
        $stmt->bindValue('text', $text);

        if ($stmt->execute()) {

            $message->setId(intval($this->pdo->lastInsertId()));
            return TRUE;
        }
        return FALSE;
    }

    //parcourir les posts
    public function readMessagesList() {

        $stmt = $this->pdo->prepare('SELECT * FROM message');
        $stmt->execute();
        $liste = [];
        while ($message = $stmt->fetch()){
            $text = $message ['text'];
            $newmessage = new Message($text);
            $liste[] = $newmessage;  
        }
        return $liste;

    }
}
    


