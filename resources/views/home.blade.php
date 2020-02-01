@extends('layouts.admin')

@section('content')

@include('panels.page-header')
<div class="container-fluid">
<router-view></router-view>
<vue-progress-bar></vue-progress-bar>
</div>
@endsection