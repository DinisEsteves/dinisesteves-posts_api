<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'wp_posts';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'post_author',
        'post_date',
        'post_date_gmt',
        'post_content',
        'post_title',
        'post_excerpt',
        'post_status',
        'comment_status',
        'ping_status',
        'post_password',
        'post_name',
        'to_ping',
        'pinged',
        'post_modified',
        'post_modified_gmt',
        'post_content_filtered',
        'post_parent',
        'guid',
        'menu_order',
        'post_type',
        'post_mime_type',
        'comment_count'
    ];

    protected $hidden = [
        'post_password',
    ];

    public function childrens(){
        return $this->hasMany(Post::class, 'post_parent' , 'ID');
    }

    public function parent(){
        return $this->hasOne(Post::class, 'ID', 'post_parent');
    }
}
