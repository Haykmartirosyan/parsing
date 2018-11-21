<?php

namespace App\Repositories;

use App\Contracts\ParsedDataInterface;
use App\ParsedData;

class ParsedDataRepository implements ParsedDataInterface
{
    protected $model;

    /**
     * ParsedDataRepository constructor.
     * @param ParsedData $parsedData
     */
    public function __construct(ParsedData $parsedData)
    {
        $this->model = $parsedData;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createOrUpdateData($data)
    {
        $game = $this->getByName($data['name']);
        if ($game){
            return $this->update($data['name'], $data);
        }else{
            return $this->model->create($data);
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    /**
     * @param $name
     * @param $data
     * @return mixed
     */
    protected function update($name, $data)
    {
        return $this->model->where('name', $name)->update($data);
    }

    /**
     * @return ParsedData[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->orderBy('id', 'asc')->get();
    }


}