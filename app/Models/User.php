<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{

public $timestamps = false; // <-- para dili na need ang updated at @ created at column

protected $primaryKey = 'productId'; //<-- this is a primary key

protected $table = 'product';
// column sa table
protected $fillable = [
'productName', 'description','category','price'
];
}