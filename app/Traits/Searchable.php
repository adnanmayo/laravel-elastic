<?php
/**
 * Created by PhpStorm.
 * User: adnanmumtaz
 * Date: 6/11/18
 * Time: 5:26 PM
 */
namespace App\Traits;

use App\Observers\ElasticPostObserver;

trait Searchable{

    public static function bootSearchable()
    {
        static::observe(ElasticPostObserver::class);
    }

    public function getSearchIndex()
    {
        return $this->getTable();
    }

    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }

        return $this->getTable();
    }

    public function toSearchArray()
    {
        // By having a custom method that transforms the model
        // to a searchable array allows us to customize the
        // data that's going to be searchable per model.
        return $this->toArray();
    }

}