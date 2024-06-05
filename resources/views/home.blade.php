@extends('layout.main')
@section('title', 'Arix')
@section('container')
@include('partials.videoCoverHome', ['title' => 'Top 10', 'data' => $top10videos, 'overlayTextType' => 'rank', 'needCategorySubtitle' => true, 'CategorySubtitle' => 'Drama Korea'])
@include('partials.videoCoverHome', ['title' => 'Episode Baru Series', 'data' => $seriesvideos, 'overlayTextType' => 'episode', 'needCategorySubtitle' => true, 'CategorySubtitle' => 'Drama Korea'])
@include('partials.videoCoverHome', ['title' => 'Episode Baru Variety', 'data' => $variety, 'overlayTextType' => 'episode', 'needCategorySubtitle' => false])
@include('partials.videoCoverHome', ['title' => 'Segera Tayang', 'data' => $comingSoon, 'overlayTextType' => 'timeReleaseOrSoon', 'needCategorySubtitle' => true, 'CategorySubtitle' => 'Drama Korea'])
@include('partials.videoCoverHome', ['title' => 'Drama Romantis', 'data' => $romanceGenre, 'overlayTextType' => 'episode', 'needCategorySubtitle' => false])
@endsection