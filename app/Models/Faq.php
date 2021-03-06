<?php

namespace App\Models;

use App\Traits\FilterableTrait;
use App\Traits\OrderableTrait;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $table = 'faq';

    use FilterableTrait, SearchableTrait, OrderableTrait;

    /**
     * Filterable fields
     * @var array
     */
    protected $filterableColumns = [
        'locale',
        'question',
        'answer',
        'category_id',
    ];

    protected $searchableColumns = [
        'question',
        'answer'
    ];

    protected $fillable = [
        'locale',
        'question',
        'answer',
        'order',
        'faq_category_id',
    ];

    /**
     * This call should be adapted in each entity model to add required "with()" statements to the query for performance
     * on the datagrids.
     * @param $query
     * @return mixed
     */
    public function scopePreparedWith($query)
    {
        return $query;
    }

    /**
     * @param $query
     * @param bool $visible
     * @return mixed
     */
    public function scopeVisible($query, $visible = true)
    {
        return $query->where('is_visible', $visible);
    }

    /**
     * @param $query
     * @param string $locale
     * @return mixed
     */
    public function scopeLocale($query, $locale = 'en')
    {
        return $query->where('locale', $locale);
    }

    /**
     * @param $query
     * @param string $locale
     * @return mixed
     */
    public function scopeOrdered($query, $order = 'ASC')
    {
        return $query->orderBy('order', $order);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo('App\Models\FaqCategory', 'faq_category_id', 'id');
    }

    /**
     * @return string
     */
    public function slug()
    {
        return str_slug($this->question);
    }

    public function scopeAdmin($query)
    {
        return $query;
    }
}
