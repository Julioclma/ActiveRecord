<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;

class Update implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
        $sql = $this->createQuery($activeRecordInterface);

        try {
            $pdo = Connection::connect()->prepare($sql);
            $pdo->execute($activeRecordInterface->getAttributes());
            echo $pdo->rowCount();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
        $sql = "UPDATE {$activeRecordInterface->getTable()} SET ";

        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            if ($key !== 'id') {
                $sql .= " {$key} = :{$key},";
            } else {
                $sql = rtrim($sql, ',');
                $sql .= " WHERE $key = :$key";
            }
        }

        return $sql;
    }
}
