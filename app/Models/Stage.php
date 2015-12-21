<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    
	public $table = "stages";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nom",
		"prenom",
		"cne",
		"organisme",
		"adresse",
		"tel_org",
		"portable",
		"periode",
		"debut",
		"fin",
		"etat",
		"type",
		"assurances",
		"email",
		"formation"
	];

	public static $rules = [
	    "nom" => "required",
		"prenom" => "required",
		"cne" => "required",
		"organisme" => "required",
		"adresse" => "required",
		"tel_org" => "required",
		"portable" => "required",
		"periode" => "required",
		"debut" => "required",
		"fin" => "required",
		"etat" => "required",
		"type" => "required",
		"assurances" => "required",
		"email" => "required",
		"formation" => "required"
	];

}
