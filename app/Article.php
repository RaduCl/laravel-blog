<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Article extends Model {

	//
    protected $fillable = [
        'title',
        'body',
        'img',
        'publish_date',
        'user_id',
        'publish_date',
        'slug'
    ];


    protected $dates = ['publish_date'];


    /**
     * Set the publish_date attribute
     *
     * @param $date
     */



    /**
     * An article is authored by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }



    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    /**
     * Get a list of tags associated with the given article
     * This function injjects the selected tags in the Edit Form
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }


}
