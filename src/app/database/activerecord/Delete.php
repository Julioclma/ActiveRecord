<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;

class Delete implements ActiveRecordExecuteInterface
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
            echo $pdo->rowCount();
        } catch (\Throwable $th) {
            formatExcetion($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        $sql = "DELETE FROM {$activeRecordInterface->getTable()} WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}
