<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use PDO;

class Find implements ActiveRecordExecuteInterface
{
    private string $field;
    private string $value;
    public function __construct(string $field, string $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
        $sql = $this->createQuery($activeRecordInterface);

        try {
            $pdo = Connection::connect()->prepare($sql);
            $pdo->execute([$this->field => $this->value]);
            $results = $pdo->fetchAll(PDO::FETCH_OBJ);
            var_dump($results);
        } catch (\Throwable $th) {
            formatExcetion($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        $sql = "SELECT * FROM {$activeRecordInterface->getTable()} WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}
