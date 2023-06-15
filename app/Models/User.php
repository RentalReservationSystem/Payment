<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{

public $timestamps = false; // <-- para dili na need ang updated at @ created at column

protected $primaryKey = 'payment_id'; //<-- this is a primary key

protected $table = 'payment';
// column sa table
protected $fillable = [
'payment_category', 'payment_date','amount'
];
}