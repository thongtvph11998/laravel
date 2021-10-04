<?php

namespace App\Models;

use App\Casts\InvoiceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primarykey='id';
    protected $fillable=[
        'user_id',
        'number',
        'address',
        'total_price',
        'status' ,
    ];

    protected $casts = [
        'status' => InvoiceCast::class
    ];
    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetail::class,'invoice_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    //Accessor get{Attribute}Attribute
    // public function getTotalPriceAttribute(){
    //     $newValue= $this->attributes['total_price']."VND";
    //     return $newValue;
    // }

}
