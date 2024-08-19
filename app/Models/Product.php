<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getDropDownList($fieldName, $id = NULL)
    {
        $str = "<option value=''>Select One</option>";
        $lists = self::where('status', 1)->orderBy($fieldName, 'asc')->get();
        if ($lists) {
            foreach ($lists as $list) {
                if ($id != NULL && $id == $list->id) {
                    $str .= "<option  value='" . $list->id . "' selected>" . $list->$fieldName . "</option>";
                } else {
                    $str .= "<option  value='" . $list->id . "'>" . $list->$fieldName . "</option>";
                }
            }
        }
        return $str;
    }

    protected $fillable = ['category_id', 'subcategory_id', 'childcategory_id', 'brand_id', 'model_id', 'name', 'code', 'image', 'multiple_images', 'short_description', 'description', 'specification', 'warrenty_policy', 'price', 'discount_price', 'stock', 'unit_id', 'tags', 'video_url', 'warrenty_id', 'slug', 'flag_id', 'meta_title', 'meta_keywords', 'meta_description', 'status', 'has_variant', 'is_demo', 'created_at'];


    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function wishList()
    {
        return $this->hasMany(WishList::class);
    }

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function color()
    {
        return $this->hasOne(Color::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


}
