<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMasyarakat extends Model
{
    use HasFactory;
    public $table = 'data_masyarakat';
    protected $guarded = ['id'];
}
