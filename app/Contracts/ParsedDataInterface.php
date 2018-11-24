<?php

namespace App\Contracts;


interface ParsedDataInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function createOrUpdateData($data);

    /**
     * @return ParsedData[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * @return mixed
     */
    public function deleteAll();
}