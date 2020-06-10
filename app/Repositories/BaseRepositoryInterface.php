<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function findAll();
    public function findOne($id);
    public function create(array $attributes);
    public function update($id, $attributes);
    public function delete($id);
}