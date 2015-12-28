<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anneeU extends Model
{
    
	public $table = "annee_us";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "anneeUn"
	];

	public static $rules = [
	    "anneeUn" => "required"
	];

}
