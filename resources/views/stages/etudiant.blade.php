@extends('app')

@section('content')

     {{--<div style="padding-top: 20px">--}}
         {{--<img src="{{ url('images/uca.png')}}" class="center-block img-responsive" style="height: 100px" alt=""/>--}}
         {{--<h1 class="text-center text-resp" style="color: #A25118">Faculté des Sciences et Techniques Marrakech</h1>--}}
     {{--</div>--}}

     <div class="row">
         <div class="col-md-offset-2  col-md-8 style-background" style="min-height: 365px;background-color: rgba(254, 254, 254, 0.32);">
             <div class="btn-resp">
             <button type="button" class="btn btn-lg  btn-style-1" style="border-radius: inherit;">
                 <a href="{!! route('stages.create') !!}">
                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                 convention de stage
                 </a>
             </button>
             <button type="button" class="btn btn-lg btn-style-2" style="border-radius: inherit;">
                 <a href="{{ url('serch_stage')}}">
                 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                 recherche de stage</button>
                 </a>
             </div>

         </div>
     </div>


@endsection