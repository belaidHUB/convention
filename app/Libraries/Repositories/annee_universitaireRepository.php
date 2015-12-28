<?php

namespace App\Libraries\Repositories;


use App\Models\annee_universitaire;
use Illuminate\Support\Facades\Schema;

class annee_universitaireRepository
{

	/**
	 * Returns all annee_universitaires
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return annee_universitaire::all();
	}

	public function search($input)
    {
        $query = annee_universitaire::query();

        $columns = Schema::getColumnListing('annee_universitaires');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores annee_universitaire into database
	 *
	 * @param array $input
	 *
	 * @return annee_universitaire
	 */
	public function store($input)
	{
		return annee_universitaire::create($input);
	}

	/**
	 * Find annee_universitaire by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|annee_universitaire
	 */
	public function findannee_universitaireById($id)
	{
		return annee_universitaire::find($id);
	}

	/**
	 * Updates annee_universitaire into database
	 *
	 * @param annee_universitaire $anneeUniversitaire
	 * @param array $input
	 *
	 * @return annee_universitaire
	 */
	public function update($anneeUniversitaire, $input)
	{
		$anneeUniversitaire->fill($input);
		$anneeUniversitaire->save();

		return $anneeUniversitaire;
	}
}