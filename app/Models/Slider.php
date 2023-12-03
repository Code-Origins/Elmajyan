<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends AppModel{
    use HasFactory;

    const rules = [
        'main_image' => 'numeric|nullable',
    ];

    

    // protected $appends = ['publish_url', 'seo'];
    // protected $searchFields = ['id', 'title', 'slug'];

    //RELATIONS
    public function mainImage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'main_image');
    }

  

    public function publishUrl(): string
    {
        return url('/blog/' . $this->slug);
    }
}
