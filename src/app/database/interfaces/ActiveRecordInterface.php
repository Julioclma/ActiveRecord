<?php

namespace Activerecord\app\database\interfaces;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $activeRecordInterface) : void;
    public function getTable(): string;
    public function getAttributes(): array;
} 
