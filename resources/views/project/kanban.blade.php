
@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tailwind.min.css') }}">
@endsection
@section('content')

<board project="{{ $project->id }}" name="{{ $project->name }}"></board>


@endsection


@section('js')
<script type="text/javascript">
  $(document).ready(function($) {
    $("body").addClass("sidebar-toggled");
    $(".sidebar").addClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });
</script>

@endsection