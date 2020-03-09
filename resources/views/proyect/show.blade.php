
@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css">
@endsection
@section('content')

<board proyect="{{ $proyect->id }}" name="{{ $proyect->name }}" type="{{ $proyect->type->description }}"></board>


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