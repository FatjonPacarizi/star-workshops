@extends('layouts.app')
@section('content')
@livewire('users.edit-user',['user'=>$user])
@endsection