@extends('layouts.app')
@section('content')
<livewire:viewproduct :category="$category" :product="$product"/>
@endsection