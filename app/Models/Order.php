<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by_name',
        'quantity',
        'each_item_amount',
        'amount',
        'order_date',
        'customer_id',
        'size_id',
        'stock_item_id',
        'paper',
        'plate',
        'printing',
        'lamination',
        'binding',
        'delivery_date',
        'created_by',
    ];



    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
    public function stockItem(): BelongsTo
    {
        return $this->belongsTo(StockItem::class);
    }
    public function paperVendor()
    {
        return $this->belongsTo(Vendor::class, 'paper');
    }

    public function plateVendor()
    {
        return $this->belongsTo(Vendor::class, 'plate');
    }

    public function printingVendor()
    {
        return $this->belongsTo(Vendor::class, 'printing');
    }

    public function laminationVendor()
    {
        return $this->belongsTo(Vendor::class, 'lamination');
    }

    public function bindingVendor()
    {
        return $this->belongsTo(Vendor::class, 'binding');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    // In your Order model
    public function getTotalAmountAttribute(): float
    {
        return ($this->quantity ?? 0) * ($this->each_item_amount ?? 0);
    }

}
