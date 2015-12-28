<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class annee_universitaire extends Model
{
    
	public $table = "annee_universitaires";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "annee_universitaire"
	];

	public static $rules = [
	    "annee_universitaire" => "required"
	];

}
