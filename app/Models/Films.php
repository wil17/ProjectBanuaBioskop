<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $primaryKey = 'idfilms';

    public $incrementing = false;
    public $timestamps = true;
}
