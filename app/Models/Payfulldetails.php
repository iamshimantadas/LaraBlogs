<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payfulldetails extends Model
{
    use HasFactory;
    protected $table="payfulldetails";
    protected $primaryKey="payid";
}
