
@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tailwind.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-header bg-primary" style="margin-top: -12px !important; margin-bottom: -12px !important">
        </div>
        <div class="card-header bg-white ">
          <div class="flex justify-between items-center rounded-lg">
            <a href="#" class="nav-link">
              <h5 class="h5 text-center" style="margin-top: -5px !important; margin-bottom: -5px !important">Personal</h5>
            </a>    
            <span class="badge badge-primary badge-pill cursor-default">14</span>
          </div>
        </div>
        <div class="card-body">
          <ul class="w-100">
            <li class="p-2 mb-2 flex justify-between items-center bg-white shadow rounded-lg">
              <div class="flex items-center">
                <img class="w-10 h-10 rounded-full" src="{{ asset('img/avatar.png') }}" alt="user.name">
                <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">Samuel Arteaga</p>
              </div>
              <div class="flex">
                <button aria-label="Eliminar" class="p-1 focus:outline-none focus:shadow-outline text-red-500 hover:text-red-600">
                <i class="fa fa-user-slash"></i>
                </button>
              </div>
            </li>
            <li class="p-2 mb-2 flex justify-between items-center text-primary bg-white shadow rounded-lg w-100">
              <div class="flex w-100">
                <button aria-label="Eliminar" class="w-100 p-1 focus:outline-none focus:shadow-outline text-blue-500 hover:text-blue-600 ">
                <i class="fa fa-user-plus"></i> Agregar personal
                </button>
              </div>
            </li>
          </ul>
        </div>
			</div>
		</div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-success" style="margin-top: -12px !important; margin-bottom: -12px !important">
        </div>
        <div class="card-header">
          <div class="flex justify-between items-center rounded-lg">    
            <a href="{{ route('project.kanban', $project->id) }}" class="nav-link">
              <h5 class="h5 text-center" style="margin-top: -5px !important; margin-bottom: -5px !important">Actividades</h5>
            </a>
            <span class="badge badge-success badge-pill cursor-default" title="Total de actividades">{{ $totalActivity }}</span>
          </div>
        </div>
        <div class="card-body">
          <ul class="w-full">
            @foreach($lists as $list)
              <li class="p-2 mb-2 flex justify-between items-center bg-white shadow rounded-lg">
                <div class="flex items-center">
                  <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{ $list->name }}</p>
                </div>
                <div class="flex">
                  <span class="badge badge-success badge-pill cursor-default" title="Total de actividades">{{ $list->activity_count }}</span>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
	</div>
</div>



@endsection


@section('js')


@endsection