@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('page_title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Students</h6>
                    <i class="icon-user s-48 text-primary" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$students}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Courses</h6>
                    <i class="icon-clipboard-edit s-48 text-primary" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$courses}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Total Fees</h6>
                    <i class="icon-inr s-48 text-primary" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$total_fees}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Remaining Fees</h6>
                    <i class="icon-inr s-48 text-primary" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$remaining_fees}}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">   
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Listening Evaluations</h6>
                    <i class="icon-clipboard-edit s-48 text-success" style="color:#ffb700 !important;" ></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$listening_evaluations}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Reading Evaluations</h6>
                    <i class="icon-clipboard-edit s-48 text-warning" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$reading_evaluations}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;" >Speaking Evaluations</h6>
                    <i class="icon-clipboard-edit s-48 text-danger" style="color:#ffb700 !important;"></i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$speaking_evaluations}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="box-shadow: 0 0 10px rgba(0,0,0,.1)!important;">
                <div class="white text-center p-4">
                    <h6 class="mb-3" style="font-size:20px;">Writing Evaluations</h6>
                    <i class="icon-clipboard-edit s-48 text-secondary" style="color:#ffb700 !important;"> </i>
                    <div class="mt-3"><span class="badge s-18  r-30" style="font-weight:600">{{$writing_evaluations}}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection