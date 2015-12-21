<?php

namespace App\Libraries\Repositories;


use App\Models\Formation;
use Illuminate\Support\Facades\Schema;

class FormationRepository
{

	/**
	 * Returns all Formations
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Formation::all();
	}

	public function search($input)
    {
        $query = Formation::query();

        $columns = Schema::getColumnListing('formations');
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
	 * Stores Formation into database
	 *
	 * @param array $input
	 *
	 * @return Formation
	 */
	public function store($input)
	{
		return Formation::create($input);
	}

	/**
	 * Find Formation by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Formation
	 */
	public function findFormationById($id)
	{
		return Formation::find($id);
	}

	/**
	 * Updates Formation into database
	 *
	 * @param Formation $formation
	 * @param array $input
	 *
	 * @return Formation
	 */
	public function update($formation, $input)
	{
		$formation->fill($input);
		$formation->save();

		return $formation;
	}
}