@extends('layouts.app')
@section('content')
<livewire:cproducts :products="$products" :category="$category"/>

@endsection