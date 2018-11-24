<?php

namespace App\Contracts;

interface xMatchInterface
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
}