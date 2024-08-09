<?php

namespace Aaran\ShareMarket\Models;

use Aaran\Sundar\Database\factories\ShareTradesFactory;
use Aaran\Web\Models\FeedCategory;
use Aaran\Web\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{

    protected $guarded=[];
    public $timestamps = false;

    protected static function newFactory(): ShareTradesFactory
    {
        return new ShareTradesFactory();
    }
    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FeedCategory::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public static function allocated($str)
    {
        if ($str) {
            return User::find($str)->name;
        } else return '';
    }

    public static function type($str)
    {
        if ($str) {
            return FeedCategory::find($str)->vname;
        } else return '';
    }

    public static function tagName($str)
    {
        if ($str) {
            return Tag::find($str)->vname;
        } else return '';
    }
}
