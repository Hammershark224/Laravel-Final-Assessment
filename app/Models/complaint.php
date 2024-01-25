<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_ID', 'title', 'description', 'complaint_status','reply'];
    protected $primaryKey = "complaint_ID";

    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_ID');
    }

    public function response()
    {
        return $this->hasOne(response::class, 'complaint_ID'); // foreign key
    }
}
