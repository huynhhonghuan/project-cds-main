@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}
@section('content')
{!! Toastr::message() !!}
    <div class="page-wrapper" >
        <div class="content container" style="margin-top: 50px;margin-bottom: 50px">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col" >
                        @foreach($tinnhans as $tn)
                        <div class="d-flex {{Auth()->id() == $tn->user_id?'justify-content-end':'justify-content-start'}}">
                            <div class="" style="margin-bottom: 16px;background-color: rgb(236, 236, 236);padding:8px">
                                
                                <div class=" d-flex align-items-center">
                                    <div class="me-2">
                                        <img style="width:40px;height:40px;border-radius:50%;border: 1px solid #c72e2e9d" src="{{ asset('assets/backend/img/hoso/'.$tn->getUser->image) }}" alt="">
                                    </div>
                                    <div class="" style="margin-left: 8px">
                                        <div style="margin: 0;font-size:16px;font-weight:600;color:#777">{{$tn->getUser->name}}</div>
                                    </div>
                                </div>
                                
                                <div class="">
                                    <div class="tn__noidung" style="">
                                        {{$tn->noidung}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="position:fixed;bottom:5%;margin-left:32px">
            <form action="{{ route('doanhnghiep.themtinnhan') }}"  style="display:flex" method="post"> @csrf
                <input type="hidden" name="hoiThoaiId" value="{{$hoithoai->id}}">
                <input name="message" id="" rows="2" style="width:100%; margin-right:8px"></input>
                <button type="submit" class="" style="border: 1px solid #999;">
                    <i class="fa-regular fa-paper-plane" style="padding: 4px 16px; color: blue"></i>
                </button>
            </form>
        </div>
    </div>
@endsection