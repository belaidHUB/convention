<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    
	public $table = "formations";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nom"
	];

	public static $rules = [
	    "nom" => "required"
	];

}
