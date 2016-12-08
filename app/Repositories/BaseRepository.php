<?php
namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

abstract class BaseRepository
{
    protected $model;

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
