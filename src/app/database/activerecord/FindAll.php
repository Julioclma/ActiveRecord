<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use PDO;

class FindAll implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
        $sql = $this->createQuery($activeRecordInterface);

        try {
            $pdo = Connection::connect()->prepare($sql);
            $pdo->execute();
            $results = $pdo->fetchAll(PDO::FETCH_ASSOC);
            var_dump($results);
        } catch (\Throwable $th) {
            formatExcetion($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        $sql = "SELECT * FROM {$activeRecordInterface->getTable()}";

        return $sql;
    }
}
