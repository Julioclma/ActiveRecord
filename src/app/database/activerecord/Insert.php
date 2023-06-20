<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use Activerecord\app\database\interfaces\InsertInterface;
use Exception;

class Insert implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
        $sql = $this->createQuery($activeRecordInterface);

        try {
            $pdo = Connection::connect()->prepare($sql);
            $pdo->execute($activeRecordInterface->getAttributes());
            echo $pdo->rowCount();
        } catch (\Throwable $th) {
            formatExcetion($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {

        $sql = "INSERT INTO {$activeRecordInterface->getTable()} (";
        $sql .= implode(', ', array_keys($activeRecordInterface->getAttributes())) . ")";
        $sql .= " VALUES (:" . implode(', :', array_keys($activeRecordInterface->getAttributes())) . ")";

        return $sql;
    }
}
