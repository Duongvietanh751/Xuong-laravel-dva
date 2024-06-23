<?php

namespace App\Models;

use App\Http\Controllers\Admin\CatalogueController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'catelogue_id',
        'name',
        'slug',
        'sku',
        'image_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'use_manual',
        'view',
        'is_active',
        'is_hot_deal',
        'is_good_deal',
        'is_new',
        'is_show_home',
    ];
    protected $casts=[
        'is_active'=>'boolean',
        'is_hot_deal'=>'boolean',
        'is_good_deal'=>'boolean',
        'is_new'=>'boolean',
        'is_show_home'=>'boolean',
    ];
    public function catelogue()
    {
        return $this->belongsTo(Catelogue::class);
    }
    public  function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
