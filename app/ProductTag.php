<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $filable = [
        'product_id',
        'tag_id'
    ];

    protected $table = 'product_tag';
}
