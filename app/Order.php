<?php
namespace App; use Illuminate\Database\Eloquent\Model; class Order extends Model { protected $guarded = array(); const STATUS_UNPAY = 0; const STATUS_PAID = 1; const STATUS_SUCCESS = 2; const STATUS_FROZEN = 3; const STATUS_REFUND = 4; protected $casts = array('api_info' => 'array'); function user() { return $this->belongsTo(User::class); } function product() { return $this->belongsTo(Product::class); } function pay() { return $this->belongsTo(Pay::class); } function cards() { $sp43c091 = $this->belongsToMany(Card::class); return $sp43c091->withTrashed(); } function card_orders() { return $this->hasMany(CardOrder::class); } function fundRecord() { return $this->hasMany(FundRecord::class); } }