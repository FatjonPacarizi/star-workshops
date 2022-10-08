@extends('layouts.app')
@section('content')
@livewire('workshop.edit-workshop',['workshop'=>$workshop]);
@endsection