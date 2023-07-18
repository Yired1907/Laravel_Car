<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description'];

    protected $hidden = ['update_at'];

    protected $visible = ['name', 'founded', 'description', 'created_at'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
