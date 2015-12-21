<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFormationRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\FormationRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class FormationController extends AppBaseController
{

	/** @var  FormationRepository */
	private $formationRepository;

	function __construct(FormationRepository $formationRepo)
	{
		$this->formationRepository = $formationRepo;
	}

	/**
	 * Display a listing of the Formation.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->formationRepository->search($input);

		$formations = $result[0];

		$attributes = $result[1];

		return view('formations.index')
		    ->with('formations', $formations)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Formation.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('formations.create');
	}

	/**
	 * Store a newly created Formation in storage.
	 *
	 * @param CreateFormationRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFormationRequest $request)
	{
        $input = $request->all();

		$formation = $this->formationRepository->store($input);

		Flash::message('Formation saved successfully.');

		return redirect(route('formations.index'));
	}

	/**
	 * Display the specified Formation.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$formation = $this->formationRepository->findFormationById($id);

		if(empty($formation))
		{
			Flash::error('Formation not found');
			return redirect(route('formations.index'));
		}

		return view('formations.show')->with('formation', $formation);
	}

	/**
	 * Show the form for editing the specified Formation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$formation = $this->formationRepository->findFormationById($id);

		if(empty($formation))
		{
			Flash::error('Formation not found');
			return redirect(route('formations.index'));
		}

		return view('formations.edit')->with('formation', $formation);
	}

	/**
	 * Update the specified Formation in storage.
	 *
	 * @param  int    $id
	 * @param CreateFormationRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateFormationRequest $request)
	{
		$formation = $this->formationRepository->findFormationById($id);

		if(empty($formation))
		{
			Flash::error('Formation not found');
			return redirect(route('formations.index'));
		}

		$formation = $this->formationRepository->update($formation, $request->all());

		Flash::message('Formation updated successfully.');

		return redirect(route('formations.index'));
	}

	/**
	 * Remove the specified Formation from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$formation = $this->formationRepository->findFormationById($id);

		if(empty($formation))
		{
			Flash::error('Formation not found');
			return redirect(route('formations.index'));
		}

		$formation->delete();

		Flash::message('Formation deleted successfully.');

		return redirect(route('formations.index'));
	}

}
