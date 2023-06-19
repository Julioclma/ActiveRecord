<?php

namespace Activerecord\app\database\interfaces;

interface ActiveRecordInterface
{
    public function update(UpdateInterface $updateInterface): void;

    // public function all(): void;
    // public function insert(): void;
    // public function delete(): void;
    // public function find(): void;
    // public function findBy(): void;

    public function getTable(): string;
    public function getAttributes(): array;
}
