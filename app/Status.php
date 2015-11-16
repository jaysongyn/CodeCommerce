<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

	protected $fillable = [
		'id',
		'descricao'
	];

	protected $table = 'status';
}

