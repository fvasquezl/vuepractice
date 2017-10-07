<?php

namespace App;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model

{
    use FilterPaginateOrder;

    protected $fillable = [
      'company','email','name','phone','address'
    ];
    //wishlist of filter-table columns
    protected $filter = [
        'id','company','email','name','phone','address','created_at'
    ];

    public static function initialize()
    {
        return[
            'company'=>'',
            'email'=>'',
            'name'=>'',
            'phone'=>'',
            'address'=>''
        ];
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
