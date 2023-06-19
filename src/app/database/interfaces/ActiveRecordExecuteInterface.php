<?php

namespace Activerecord\app\database\interfaces;

interface ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface) : void;
    // public function __set($attribute, $value);
    // public function __get($attribute);
    // public function getTable(): string;
    // public function getAttributes(): array;
}
