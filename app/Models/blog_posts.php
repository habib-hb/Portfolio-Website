<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class blog_posts extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'blog_posts';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_author',
        'blog_title',
        'blog_link',
        'blog_excerpt',
        'blog_image',
        'blog_text',
        'blog_type',
        'created_at',
        'updated_at'
    ];

    public function searchableAs(): string
    {
        return 'blog_posts';
    }


    public function toSearchableArray(): array
    {

        return [
            'blog_title' => $this->blog_title,
            'blog_excerpt' => $this->blog_excerpt,
            'blog_link' => $this->blog_link
        ];

    }

}
