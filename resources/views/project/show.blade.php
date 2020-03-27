
@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tailwind.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
      <employee :id="{{ $project->id }}"></employee>
		</div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-blue-500" style="margin-top: -12px !important; margin-bottom: -12px !important">
        </div>
        <div class="card-header">
          <div class="flex justify-between items-center rounded-lg">    
            <a href="{{ route('project.kanban', $project->id) }}" class="nav-link">
              <h5 class="h5 text-center" style="margin-top: -5px !important; margin-bottom: -5px !important">Actividades</h5>
            </a>
            <span class="badge bg-blue-500 text-white badge-pill cursor-default" title="Total de actividades">{{ $totalActivity }}</span>
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
                  <span class="badge bg-blue-500 text-white badge-pill cursor-default" title="Total de actividades">{{ $list->activity_count }}</span>
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