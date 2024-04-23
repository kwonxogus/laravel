@extends('layout.master')

@section('script')
@endsection

@section('content')
    로그인 성공! 로그인한 id는 {{Session::get('id')}} 입니다.
@endsection