<?php
declare(strict_types=1);

namespace Src\Repositories;


interface RepositoryInterface
{
    /**
     * @param object $model
     */
    public function setModel(object $model): void;

    /**
     * @param array $data
     * @return object
     */
    public function index(): object;

    /**
     * @param array $data
     * @return object
     */
    public function insert(array $data): object;

    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param array $data
     * @return object
     */
    public function update(array $data, int $id): object;
}