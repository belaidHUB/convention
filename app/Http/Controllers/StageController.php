<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStageRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\StageRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use PDF;
use DB;
use Illuminate\Routing\UrlGenerator;
use Mail;
use Log;

class StageController extends AppBaseController
{

	/** @var  StageRepository */
	private $stageRepository;
	protected $url;


	function __construct(StageRepository $stageRepo,UrlGenerator $url)
	{
		$this->stageRepository = $stageRepo;
		$this->url = $url;
		//$this->middleware('auth',['only' => ['index','show','edit']]);
		$this->middleware('auth',['except' => ['create','store','Etudiant_index','serch_formation_Ajax','imprimer']]);
	}

	/**
	 * Display a listing of the Stage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
   /* $input = $request->all();

		$result = $this->stageRepository->search($input);

		$stages = $result[0];

		$attributes = $result[1];

		return view('stages.index')
		    ->with('stages', $stages)
		    ->with('attributes', $attributes);*/
        $anneU = DB::table('annee_us')->where('id',1)->first()->anneeUn;
		$stages = DB::table('stages')->orderBy('etat','asc')->orderBy('updated_at','DESC')->paginate(8);
		$links = str_replace('/?', '?', $stages->render());
        return view('stages.index', compact('stages', 'links','anneU'));
	}

	public function Etudiant_index()
	{
		$formations = DB::table('formations')->lists('nom','nom');
        return view('stages.etudiant', compact('formations'));
	}

	public function serch_Ajax()
    {
        $Nom_serch = $_GET['Nom_serch'];

        $stages=DB::table('stages')->where('nom', 'like', "%$Nom_serch%")->orderBy('etat','asc')->orderBy('updated_at','DESC')->paginate(8);
     
        $links = str_replace('/?', '?', $stages->render());
        $data=view('stages.table', compact('links','stages'))->render();
        
        return response()->json($data);
    }

    public function serch_formation_Ajax(Request $request)
    {
    	$formations = DB::table('formations')->lists('nom','nom');
    	if($request->ajax()){
	        $formation_serch = $_GET['formation_serch'];
	        $stages=DB::table('stages')->where('formation', '=',$formation_serch )->orderBy('updated_at','DESC')->paginate(8);
	     
	        $links = str_replace('/?', '?', $stages->render());
	        $data=view('stages.table-serch', compact('links','stages','formations'))->render();
        return response()->json($data);
    }
        else{
        	$stages = DB::table('stages')->where('formation', '=',collect($formations)->first())->orderBy('etat','asc')->orderBy('updated_at','DESC')->paginate(8);
		    
		    $links = str_replace('/?', '?', $stages->render());
            return view('stages.serch_stage', compact('stages', 'links','formations'));
        }

    }

	/**
	 * Show the form for creating a new Stage.
	 *
	 * @return Response
	 */
	public function create()
	{
		$formations = DB::table('formations')->lists('nom','nom');
		return view('stages.create')->with('formations', $formations);
	}

	/**
	 * Store a newly created Stage in storage.
	 *
	 * @param CreateStageRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateStageRequest $request)
	{
        $input = $request->all();

		$stage = $this->stageRepository->store($input);
		Log::info('store'.$stage);
	    Flash::message('Stage saved successfully.');
        return view('stages.imp')->with('stage', $stage);
		//return redirect(route('stages.index'));
	}

	/**
	 * Display the specified Stage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$stage = $this->stageRepository->findStageById($id);

		if(empty($stage))
		{
			Flash::error('Stage not found');
			return redirect(route('stages.index'));
		}

		return view('stages.show')->with('stage', $stage);
	}

	/**
	 * Show the form for editing the specified Stage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stage = $this->stageRepository->findStageById($id);
		$formations = DB::table('formations')->lists('nom','nom');

		if(empty($stage))
		{
			Flash::error('Stage not found');
			return redirect(route('stages.index'));
		}

		return view('stages.edit')->with('stage', $stage)->with('formations', $formations);
	}

	/**
	 * Update the specified Stage in storage.
	 *
	 * @param  int    $id
	 * @param CreateStageRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateStageRequest $request)
	{
		$stage = $this->stageRepository->findStageById($id);

		if(empty($stage))
		{
			Flash::error('Stage not found');
			return redirect(route('stages.index'));
		}

		$stage = $this->stageRepository->update($stage, $request->all());

		Flash::message('Stage updated successfully.');

		return redirect(route('stages.index'));
	}

	public function update_etat($id)
	{
		$stage = $this->stageRepository->findStageById($id);

		if(empty($stage))
		{
			Flash::error('Stage not found');
			return redirect(route('stages.index'));
		}

		//$stage = $this->stageRepository->update($stage, $request->all());
		if($stage->etat==0){
               //demande de signature
			   $stage->etat=1;
           }
        else if($stage->etat==1){
               //signature 
               $stage->etat=2;
               $stage->save();
               // send email                
				Flash::success('message envoyé.'.$stage->nom.' '.$stage->prenom);
				$email=$stage->email;
				Mail::send('emails.contact', ['email' => $email], function($message) use ($email)
				{
					$message->to($email)->subject('Votre Convention de stage est prête');
				});
           }
        else if($stage->etat==2){
        	   //récupérer la demande
               $stage->etat=3;
           }
        $stage->save();
        //Flash::message('Stage updated successfully.');
		return redirect(route('stages.index'));
	}

	/**
	 * Remove the specified Stage from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$stage = $this->stageRepository->findStageById($id);

		if(empty($stage))
		{
			Flash::error('Stage not found');
			return redirect(route('stages.index'));
		}

		$stage->delete();

		Flash::message('Stage deleted successfully.');

		return redirect(route('stages.index'));
	}


	//impression de Convenation de stage
	public function imprimer($id)
	{ 
		$stage = $this->stageRepository->findStageById($id);
		$img1=$this->url->to('/')."/images/fstg.png";
		$img2=$this->url->to('/')."/images/fstg2.png";
		$anneU = DB::table('annee_us')->where('id',1)->first()->anneeUn;


		$html='
		    <meta charset="UTF-8">
		    <img src="'.$img1.'" alt="CadiAyyadUniversity"  style="width: 100%"><br>
		    <h1 style="text-align: center">CONVENTION DE STAGE</h1>
		    <p></p>'
     
		    ;

        if($stage->type=='Normal'){
        $html.='        
    
		    <p style="white-space: pre;font-size: 16px">
		       Entre :
		       -	d’une part :
		       la Faculté des Sciences et Techniques de Marrakech, représentée par son Doyen Monsieur Moha 
		       TAOURIRTE
		       Adresse            : BP 524, AV. Abdelkrim El Khattabi, Guéliz
		       , Marrakech, Maroc.
		       Téléphone        : +212 524 43 34 04
		       Fax                   : +212 524 43 31 70
		       Et désignée ci après par Etablissement de formation
               

		       -	et d’autre part
		       Nom                    : '.$stage->organisme.'
		       Adresse               : '.$stage->adresse.'
		       Téléphone           : '.$stage->tel_org.'
		       Fax                      : '.$stage->portable.'
		       Représenté par :
		       Et désigné ci-après par l’entreprise.
                              

		       Elle concerne :
		       Mr/Mlle : '.$stage->prenom.' '.$stage->nom.'
		       Etudiant(e) régulièrement inscrit (e) dans l’établissement pour l’année universitaire '.$anneU.' et dont la 
		       carte d’étudiant porte le numéro du CNE suivant :'.$stage->cne.'
		       Et dénommé ci-après le stagiaire.
               

		       Article 1 :
		       La présente convention régit les rapports des deux parties, dans le cadre de l’organisation de stage
		       d’entreprise conformément aux conditions fixées à la présente convention.
               

		       Article 2 :
		       Le programme du stage est élaboré par le personnel chargé de l’encadrement du stagiaire, en tenant
		       compte du programme et de spécialité des études du stagiaire, ainsi que des moyens   humain et matériel 
		       de l’entreprise. Cette dernière se réserve le droit de réorienter l’apprentissage en fonction des
		       qualifications du stagiaire et du rythme de ses activités professionnelles.
               

		       Article 3 :
		       Pendant le stage, le stagiaire est soumis aux usages et règlements de l’entreprise, notamment en matière 
		       de discipline et des horaires.



               <p style="-webkit-transform: rotate(90deg);font-size: 12px">'.$stage->assurances.date("my").'</p>
               <p style="text-align: right">1/2</p>
		       <img src="'.$img2.'" alt="CadiAyyadUniversity"  style="width: 100%"><br>
		       
		   </p>
		';
         $html.='
				 <div style="page-break-after: always"></div>

				 <p style="white-space: pre;font-size: 16px">
				 En cas de manquement à ces règles, l’entreprise se réserve le droit de mettre fin au stage, après avoir 
				 prévenu l’établissement de formation.


				 Article 4 :
				 Au terme de son stage, le stagiaire remettra un rapport de stage à l’entreprise si réclamé par celle-ci.
              

				 Article 5 :
				 Le stagiaire s’engage à garder confidentielle toute information recueillie dans l’entreprise, et à n’utiliser 
				 en aucun cas ces informations pour faire l’objet d’une publication, communication à des tiers, 
				 conférences,…, sans l’accord préalable de l’entreprise.
              

				 Article 6 :
				 Le stagiaire est tenu de souscrire une assurance pour  le garantir contre les risques d’accident ou 
				 d’incident auxquels le stagiaire pourrait être exposé durant la période de son stage.
              

				 Article 7 :
				 En cas de non-respect de l’une des clauses de cette convention aussi bien par le stagiaire, l’entreprise se 
				 réserve le droit de mettre fin à ce stage.
              

				 Article 8 :
				 Le stage est d’une durée d’un '.$stage->periode.'  Jours  et se déroulera du  '.$stage->debut.'   au   '.$stage->fin.'.
      
      
      
      

				 Pour l’entreprise                                          Pour l’établissement

				………… le …..	                                                Lu et approuvé
				                                                                            Le stagiaire : ……….
				                                                                            …..       , le …..
					                                                  
      
      
      

					                                  Le responsable de la Filière
				                                      …………...  , le ………..
					                                        
      
      
      

					                                  Le Doyen
				                                      …..  , le ………..

					                                        
      
      					                                        
      
      					                                        
      
                  <p style="-webkit-transform: rotate(90deg);font-size: 12px">'.$stage->assurances.date("my").'</p>
                  <p style="text-align: right">2/2</p>
                  <img src="'.$img2.'" alt="CadiAyyadUniversity"  style="width: 100%"><br>
				 </p>
				 ';
				 }
		 else{
		 	$html.='
		 	<p style="white-space: pre;font-size: 16px">
			Article 1 : Objet de la convention
			La présente convention de stage a pour objet de  régler les rapports entre :
         

			- La Faculté des Sciences et Techniques de Marrakech, représentée par son Doyen Monsieur Moha
			TAOURIRTE
			Adresse            : BP 549, AV. Abdelkrim El khattabi, Guéliz, Marrakech, Maroc,
			Téléphone        : +212 524 43 34 04
			 Fax                  : +212 524 43 31 70
			et désignée ci après par Etablissement.
			Et 

              
			- L’Organisme ci-dessous mentionné :
			Nom		   : '.$stage->organisme.'
			Adresse	   :  '.$stage->adresse.'
			Téléphone	   : '.$stage->tel_org.'
			Fax		   : '.$stage->portable.'
			Représenté par :
			Et désigné ci-après par l’Organisme.

                
			Elle concerne : '.$stage->prenom.' '.$stage->nom.'
			Étudiant(e) régulièrement inscrit(e) dans l’établissement pour l’année universitaire '.$anneU.' et dont la
			 carte d’étudiant porte le numéro du CNE suivant : '.$stage->cne.'
			Et dénommé ci-après le stagiaire.

              
			Article 2 : Objectif du stage
			Le stage de formation a pour objet de permettre à l’étudiant de mettre en pratique les outils théoriques et 
			éthodologiques acquis au cours de sa formation, d’identifier ses compétences et de conforter son
			objectif professionnel.
			Le stage s’inscrit dans le cadre de la formation et du projet personnel et professionnel de l’étudiant. Il
			entre dans son cursus pédagogique et est obligatoire en vue de la délivrance du diplôme.
             

			Article 3 : Lieu et période du stage
			Le stage d’une durée de '.$stage->periode.' Jours  et se déroulera du  '.$stage->debut.'   au   '.$stage->fin.' .
                          
                         
            </p>

            <p style="-webkit-transform: rotate(90deg);font-size: 12px">'.$stage->assurances.date("my").'</p>
            <p style="text-align: right">1/3</p>
            <p style="white-space: pre;font-size: 16px;border-top: 1px solid #000">Convention de stage FSTG/'.$stage->organisme.'                                                                 -Etudiant –'.$stage->prenom.' '.$stage->nom.'</p>
		 	';

		 	 $html.='
			<div style="page-break-after: always"></div>
			<p style="white-space: pre;font-size: 16px">
                                         

			Article 4 : Statut du stagiaire – Accueil et encadrement
			L’étudiant, pendant la durée de son stage dans l’Organisme, demeure étudiant de l’Établissement ; il est 
			suivi régulièrement par l’Établissement. L’Organisme nomme un Encadrant chargé d’assurer le suivi 
			technique et d’optimiser les conditions de réalisation du stage. 
                                           

			Article 5 : Intitulé du stage 
			Le projet de stage est intitulé : 
			Et son programme est établi en fonction de la spécialisation de l’étudiant.
			Dans l’organisme d’accueil, le responsable de stage, chargé du suivi des travaux du stagiaire est :
			Monsieur        :
			Qualité 	: 
			Téléphone       : 
			E-mail		: 
			A la Faculté des Sciences et Techniques de Marrakech, le responsable de stage, chargé du suivi des
			 travaux du stagiaire est : 
			Monsieur         : 
			Qualité 	 : 
			Téléphone 	: 
			E-mail 	: 
                                    

			Article 6 : Gratification 
			L’étudiant ne peut prétendre à rémunération, cependant il peut bénéficier d’une gratification. 
			Les frais de déplacement et d’hébergement engagés par l’étudiant à la demande de l’Organisme, ainsi 
			que les frais de formation éventuellement nécessités par le stage, seront intégralement pris en charge par l’Organisme selon les modalités qui y sont en vigueur.
                                      

			Article 7 : Responsabilité civile et assurances
			Le stagiaire s’engage à se couvrir par un contrat d’assurance individuelle.
			Lorsque l’Organisme met un véhicule à la disposition du stagiaire, il lui incombe de vérifier 
			préalablement que la police d’assurance du véhicule couvre son utilisation par un étudiant.
                                   

			Article 8 : Discipline
			Durant son stage, l’étudiant est soumis à la discipline et au règlement intérieur de l’Organisme,
			notamment en ce qui concerne les horaires, et les règles d’hygiène et de sécurité en vigueur dans 
			l’Organisme.
			Toute sanction disciplinaire ne peut être décidée que par l’Établissement. Dans ce cas, l’Organisme 
			informe l’Établissement des manquements et lui fournit éventuellement les éléments constitutifs.
			En cas de manquement particulièrement grave à la discipline, l’Organisme se réserve le droit de mettre 
			fin au stage de l’étudiant tout en respectant les dispositions fixées à l’article 10 de la présente
			convention.
               

			Article 9 : Fin de stage – Rapport –Evaluation
			A l’issue du stage, l’Organisme délivre au stagiaire une attestation de stage et remplit une fiche
			d’évaluation qu’il retourne à l’Établissement. Selon les règlements pédagogiques en vigueur, l’étudiant
			sera susceptible de fournir un rapport. Ce rapport ainsi que les éventuels travaux associés pourront être
			présentés lors d’une soutenance.
		    </p>
            <p style="-webkit-transform: rotate(90deg);font-size: 12px">'.$stage->assurances.date("my").'</p>
            <p style="text-align: right">2/3</p>
            <p style="white-space: pre;font-size: 16px;border-top: 1px solid #000">Convention de stage FSTG/'.$stage->organisme.'                                                                 -Etudiant –'.$stage->prenom.' '.$stage->nom.'</p>  
		    ';

		 	$html.='
		    <div style="page-break-after: always"></div>
			<p style="white-space: pre;font-size: 16px">  
			Le responsable direct du stagiaire ou tout autre membre de l’Organisme appelé à se rendre à
			l’Établissement dans le cadre de la préparation, du déroulement et de la validation du stage ne peut
			prétendre à une quelconque prise en charge ou indemnisation de la part de l’Établissement.
                     

			Article 10 : Absence et Interruption du stage Interruption temporaire:
			Au cours du stage, le stagiaire pourra bénéficier de congés sous réserve que la durée minimale du stage
			soit respectée.
			Pour toute autre interruption temporaire du stage (maladie, maternité, absence injustifiée…) 
			l’Organisme avertira le Responsable de l’Établissement par courrier.
                          

			Article 11 : Devoir de réserve et confidentialité
			Le devoir de réserve est de rigueur absolue. Les étudiants stagiaires prennent donc l’engagement de 
			n’utiliser en aucun cas les informations recueillies ou obtenues par eux pour en faire l’objet de
			publication, communication à des tiers sans accord préalable de la Direction de l’Organisme, y compris
			le rapport de stage. Cet engagement vaudra non seulement pour la durée du stage mais également après 
			son expiration. L’étudiant s’engage à ne conserver, emporter, ou prendre copie d’aucun document ou 
			logiciel, de quelque nature que ce soit, appartenant à l’Organisme, sauf accord de ce dernier.
                        

			Article 12 : Recrutement
			Le stagiaire n’est lié par aucun contrat de travail avec l’organisme qui l’accueille.
			S’il advenait qu’un contrat de travail prenant effet avant la date de fin du stage soit signé avec 
			l’Organisme la présente convention deviendrait caduque ; l’ « étudiant » ne relèverait plus de la 
			responsabilité de l’Établissement. Ce dernier devrait impérativement en être averti avant la signature du 
			contrat.
                   

			Article 13 : Droit applicable – Tribunaux compétents
			La présente convention est régie exclusivement par le droit marocain. Tout litige non résolu par voie 
			amiable sera soumis à la compétence de la juridiction marocaine compétente.
                    
                                         
                                     

			                                                  Lu et approuvé
			                                                  Le stagiaire : 
			                                                   …………, le………….
                          

                                        

			Le Responsable de l’Organisme d’Accueil ou son délégué,
			………………, le………….
                                                
                                         
                                                            Pour l’établissement,
												 

                                                            Le Responsable de stage						 Le Doyen
                                                            ………………, le…………						            …………, le…………
                                                  

			</p>
            <p style="-webkit-transform: rotate(90deg);font-size: 12px">'.$stage->assurances.date("my").'</p>
            <p style="text-align: right">3/3</p>
            <p style="white-space: pre;font-size: 16px;border-top: 1px solid #000">Convention de stage FSTG/'.$stage->organisme.'                                                                 -Etudiant –'.$stage->prenom.' '.$stage->nom.'</p>
			';
		 }
         $pdf = PDF::loadHTML($html);
        return $pdf->stream('CONVENTION_'.$stage->nom.'.pdf');
	}

}
