@extends('trangquanly.hiephoidoanhnghiep.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
@endsection

@section('content')
    {{-- thêm content vào form kế thừa chỗ @yield('content') --}}
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">{{ $tendanhsach }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 p-5 bg-light mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="">
                                    <div class="card-body p-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2" class="pb-5">TT</th>
                                                        <th scope="col" width="60%" rowspan="2" class="pb-5">Câu
                                                            hỏi</th>
                                                        <th scope="col" colspan="5">
                                                            Mức độ <br> (Đánh dấu X vào 1 trong 5 ô bên dưới)
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            1- hoàn <br> toàn <br> không <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            2-phần <br> lớn <br> không <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            3-phân <br> vân
                                                        </th>
                                                        <th>
                                                            4-phần <br> lớn <br> đồng <br> ý
                                                        </th>
                                                        <th>
                                                            5-hoàn <br> toàn <br> đồng <br> ý
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($danhsach as $item1)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            @foreach ($phieu3 as $item2)
                                                                @if ($item1->id == $item2->cauhoiphieu3_id)
                                                                    <td>{{ $item1->tencauhoi }}</td>
                                                                    <td><input type="radio" name="{{ $item2->id }}"
                                                                            disabled
                                                                            {{ $item2->diem == 1 ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td><input type="radio" name="{{ $item2->id }}"
                                                                            disabled
                                                                            {{ $item2->diem == 2 ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td><input type="radio" name="{{ $item2->id }}"
                                                                            disabled
                                                                            {{ $item2->diem == 3 ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td><input type="radio" name="{{ $item2->id }}"
                                                                            disabled
                                                                            {{ $item2->diem == 4 ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td><input type="radio" name="{{ $item2->id }}"
                                                                            disabled
                                                                            {{ $item2->diem == 5 ? 'checked' : '' }}>
                                                                    </td>
                                                                @endif
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
@endsection
