<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use Activerecord\app\database\interfaces\InsertInterface;
use Activerecord\app\database\interfaces\UpdateInterface;
use DomainException;
use ReflectionClass;

abstract class ActiveRecord implements ActiveRecordInterface
{
    protected ?string $table = null;
    protected array $attributes;

    public function __construct()
    {
        if (!$this->table) {
            $this->table = strtolower((new ReflectionClass($this))->getShortName());
        }
    }
    public function getTable(): string
    {
        return $this->table;
    }
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    public function __set($attribute, $value): void
    {
        $this->attributes[$attribute] = $value;
    }

    public function __get($attribute): string
    {
        return $this->attributes[$attribute];
    }
    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface): void
    {
        $activeRecordExecuteInterface->execute($this);
    }
}
