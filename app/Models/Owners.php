<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
        protected $primaryKey = 'id';

        protected $useAutoIncerement = true;

        protected $returnType = 'object';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['id', 'name', 'surname'];
}
