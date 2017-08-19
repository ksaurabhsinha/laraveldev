<?php
namespace App\Repositories\Infrastructure\Contracts;

interface RepositoryInterface
{
    const DEFAULT_COLUMNS = '*';

    /**
     * @param array $columns
     *
     * @return mixed
     */
    public function all(array $columns = [self::DEFAULT_COLUMNS]);

    /**
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 15, array $columns = [self::DEFAULT_COLUMNS]);

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     * @param $id
     *
     * @return mixed
     */
    public function update($data, $id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = [self::DEFAULT_COLUMNS]);

    /**
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findBy($field, $value, array $columns = [self::DEFAULT_COLUMNS]);
}