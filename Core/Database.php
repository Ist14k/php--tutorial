<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    private PDO $pdo;

    private PDOStatement $statement;

    public function __construct(
        $config,
        string $username = 'root',
        string $password = ''
    ) {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query_str, $params = []): self
    {
        $this->statement = $this->pdo->prepare($query_str);

        $this->statement->execute($params);

        return $this;
    }

    public function findAll(): array
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): array
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::NOT_FOUND, "No note found!");
        }

        return $result;
    }
}
