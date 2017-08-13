 <?php

class Message implements \JsonSerializable {
    protected $id;
    protected $content;
    protected $timestamp;
    protected $author;
    
    function __construct($content) {
        $this->content = $content;
        $this->timestamp = new DateTime();
    }
    
    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->timestamp;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setDate($date) {
        $this->timestamp = $timestamp;
    }

    function getId() {
        return $this->id;
    }

    function getAuthor() {
        return $this->author;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

        function asHtml(){
        return '<p>'.$this->content .'</p><p>'.$this->timestamp->format('d/m/y à H:i').'</p>';
    }
    
     public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    //function JSONserialize
}
