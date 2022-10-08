@extends('layouts.app')
@section('content')
@if($section->section_id == "section1")
@livewire('landing.section1-component')
@elseif($section->section_id == "section2")
@livewire('landing.section2-component')
@elseif($section->section_id == "section3")
@livewire('landing.section3-component')
@elseif($section->section_id == "section4")
@livewire('landing.section4-component')
@elseif($section->section_id == "section5")
@livewire('landing.section5-component')
@elseif($section->section_id == "section6")
@livewire('landing.section6-component')
@elseif($section->section_id == "section7")
@livewire('landing.section7-component')
@else 
@livewire('landing.section8-component')

@endif
@endsection