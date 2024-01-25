<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $fillable = ['IC_number'];

    protected $primaryKey = "vendor_ID";

    /**
     * Define the relationship between Vendor and User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID'); // foreign key
    }

    public function complaint()
    {
        return $this->hasOne(complaint::class, 'vendor_ID'); // foreign key
    }

    public function application()
    {
        return $this->hasOne(application::class, 'vendor_ID'); // foreign key
    }

    public function rental()
    {
        return $this->hasOne(rental::class, 'vendor_ID'); // foreign key
    }
}
