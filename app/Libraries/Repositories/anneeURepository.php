<?php

namespace App\Libraries\Repositories;


use App\Models\anneeU;
use Illuminate\Support\Facades\Schema;

class anneeURepository
{

	/**
	 * Returns all anneeUs
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return anneeU::all();
	}

	public function search($input)
    {
        $query = anneeU::query();

        $columns = Schema::getColumnListing('annee_us');
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
	 * Stores anneeU into database
	 *
	 * @param array $input
	 *
	 * @return anneeU
	 */
	public function store($input)
	{
		return anneeU::create($input);
	}

	/**
	 * Find anneeU by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|anneeU
	 */
	public function findanneeUById($id)
	{
		return anneeU::find($id);
	}

	/**
	 * Updates anneeU into database
	 *
	 * @param anneeU $anneeU
	 * @param array $input
	 *
	 * @return anneeU
	 */
	public function update($anneeU, $input)
	{
		$anneeU->fill($input);
		$anneeU->save();

		return $anneeU;
	}
}