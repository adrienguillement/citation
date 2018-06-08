<?php


class Connexion
{

    private $host;
    private $username;
    private $password;

    /**
     * @var \PDO
     */
    private $db;

    /**
     * Connexion constructor.
     */
    public function __construct()
    {
        $this->host = 'mysql:host=localhost;dbname=citation;charset=utf8';
        $this->username = 'root';
        $this->password = '';

        $this->db = new \PDO($this->host, $this->username, $this->password);
    }

    /**
     * Connect to database
     * @return PDO
     */
    public function connect()
    {
        return $this->db;
    }

}