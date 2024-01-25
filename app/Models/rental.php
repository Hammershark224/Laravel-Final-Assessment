<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_ID', 'booth_ID'];
    protected $primaryKey = "rental_ID";

    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_ID');
    }

    public function booth()
    {
        return $this->belongsTo(booth::class, 'booth_ID');
    }
}
