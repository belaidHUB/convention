<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateanneeURequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\anneeURepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class anneeUController extends AppBaseController
{

	/** @var  anneeURepository */
	private $anneeURepository;

	function __construct(anneeURepository $anneeURepo)
	{
		$this->anneeURepository = $anneeURepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the anneeU.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->anneeURepository->search($input);

		$anneeUs = $result[0];

		$attributes = $result[1];

		return view('anneeUs.index')
		    ->with('anneeUs', $anneeUs)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new anneeU.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('anneeUs.create');
	}

	/**
	 * Store a newly created anneeU in storage.
	 *
	 * @param CreateanneeURequest $request
	 *
	 * @return Response
	 */
	public function store(CreateanneeURequest $request)
	{
        $input = $request->all();

		$anneeU = $this->anneeURepository->store($input);

		Flash::message('anneeU saved successfully.');

		return redirect(route('anneeUs.index'));
	}

	/**
	 * Display the specified anneeU.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$anneeU = $this->anneeURepository->findanneeUById($id);

		if(empty($anneeU))
		{
			Flash::error('anneeU not found');
			return redirect(route('anneeUs.index'));
		}

		return view('anneeUs.show')->with('anneeU', $anneeU);
	}

	/**
	 * Show the form for editing the specified anneeU.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$anneeU = $this->anneeURepository->findanneeUById($id);

		if(empty($anneeU))
		{
			Flash::error('anneeU not found');
			return redirect(route('anneeUs.index'));
		}

		return view('anneeUs.edit')->with('anneeU', $anneeU);
	}

	/**
	 * Update the specified anneeU in storage.
	 *
	 * @param  int    $id
	 * @param CreateanneeURequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateanneeURequest $request)
	{
		$anneeU = $this->anneeURepository->findanneeUById($id);

		if(empty($anneeU))
		{
			Flash::error('anneeU not found');
			return redirect(route('anneeUs.index'));
		}

		$anneeU = $this->anneeURepository->update($anneeU, $request->all());

		//Flash::message('annee updated successfully.');

		return redirect(route('stages.index'));
	}

	/**
	 * Remove the specified anneeU from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$anneeU = $this->anneeURepository->findanneeUById($id);

		if(empty($anneeU))
		{
			Flash::error('anneeU not found');
			return redirect(route('anneeUs.index'));
		}

		$anneeU->delete();

		Flash::message('anneeU deleted successfully.');

		return redirect(route('anneeUs.index'));
	}

}
