<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PlantEvent extends Model
{
	protected $guarded = [];

	protected $with = ['planter'];

	public static function makeFromData(Collection $data, Collection $demo, Collection $players, int $i) : self
	{
		return static::make([
			'index_within_round' => $i,
			'tick' => $data->get('tick'),

			'planter_id' => $players->get($data->get('planter')),
			'site' => $data->get('site'),
		]);
	}

	public function planter()
	{
		return $this->belongsTo(Player::class);
	}
}
