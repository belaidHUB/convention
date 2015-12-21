<?php

namespace App\Libraries\Repositories;


use App\Models\Stage;
use Illuminate\Support\Facades\Schema;

class StageRepository
{

	/**
	 * Returns all Stages
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Stage::all();
	}

	public function search($input)
    {
        $query = Stage::query();

        $columns = Schema::getColumnListing('stages');
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
	 * Stores Stage into database
	 *
	 * @param array $input
	 *
	 * @return Stage
	 */
	public function store($input)
	{
		return Stage::create($input);
	}

	/**
	 * Find Stage by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Stage
	 */
	public function findStageById($id)
	{
		return Stage::find($id);
	}

	/**
	 * Updates Stage into database
	 *
	 * @param Stage $stage
	 * @param array $input
	 *
	 * @return Stage
	 */
	public function update($stage, $input)
	{
		$stage->fill($input);
		$stage->save();

		return $stage;
	}
}