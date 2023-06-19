<?php

namespace Activerecord\app\database\activerecord;

use ReflectionClass;

abstract class ActiveRecord
{

    protected ?string $table = null;

    public function __construct()
    {
        if (!$this->table) {
            $this->table = (new ReflectionClass($this))->getShortName();
            var_dump($this->table);
        }
    }
    public function __set()
    {
    }

    public function __get()
    {
    }

    public function getTable(): string
    {
        return $this->table;
    }
}
