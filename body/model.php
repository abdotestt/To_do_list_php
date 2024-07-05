<?php

namespace body;
use PDO;
class Model {
    protected $db;

    public function __construct() {
        $this->db = (new \Database())->getConnection();
    }
}

