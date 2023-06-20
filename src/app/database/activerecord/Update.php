<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\connection\Connection;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use Exception;
use InvalidArgumentException;

class Update implements ActiveRecordExecuteInterface
{
    private string $field;
    private string $value;
    private array $attributes;
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

            $this->attributes = $activeRecordInterface->getAttributes();
            $this->attributes = array_merge($this->attributes, [$this->field => $this->value]);
            $pdo->execute($this->attributes);
            echo $pdo->rowCount();
        } catch (\Throwable $th) {
            formatExcetion($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface): string
    {
            if(array_key_exists('id', $activeRecordInterface->getAttributes())){
                throw new Exception("O Campo ID não pode ser alterado");
            }

        $sql = "UPDATE {$activeRecordInterface->getTable()} SET ";

        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            if ($key !== 'id') {
                $sql .= " {$key} = :{$key},";
            }
        }
        $sql = rtrim($sql, ',');

        $sql .= " WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}
