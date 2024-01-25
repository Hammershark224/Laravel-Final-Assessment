<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
    protected $fillable = ['application_ID', 'SSM', 'status', 'description', 'vendor_ID'];
    protected $primaryKey = "application_ID";

    /**
     * Define the relationship between vendor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_ID');
    }

    public function booth()
    {
        return $this->hasOne(booth::class, 'application_ID'); 
    }
}
