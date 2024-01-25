<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booth extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'number', 'description'];
    protected $primaryKey = "booth_ID";

    public function rental()
    {
        return $this->hasOne(rental::class, 'booth_ID'); // foreign key
    }
}
