<?php

namespace App\Repositories;

use App\Contracts\xMatchInterface;
use App\xMatch;

class xMatchRepository implements xMatchInterface
{
    protected $model;

    /**
     * xMatchRepository constructor.
     * @param xMatch $match
     */
    public function __construct(xMatch $match)
    {
        $this->model = $match;
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
        return $this->model->get();
    }

    /**
     * @return mixed
     */
    public function deleteAll()
    {
        return $this->model->truncate();
    }
}