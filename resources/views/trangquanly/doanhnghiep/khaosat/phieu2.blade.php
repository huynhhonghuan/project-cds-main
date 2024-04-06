@extends('trangquanly.doanhnghiep.layout'){{-- kế thừa form layout --}}

@section('head')
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>

    @livewireStyles
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
                            {{-- <a href="#" class="btn btn-primary float-right veiwbutton ">Lưu khảo sát 2</a> --}}
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 p-5 bg-light mx-auto">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="">
                                    <div class="card-body p-3">
                                        <div class="table-responsive border">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="60%" rowspan="2"
                                                            class="pb-5 text-center">Câu
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
                                                            @if ($item1->cauhoiphieu2_id == null)
                                                                <td colspan="6"
                                                                    style="background-color: rgb(236, 235, 235)">
                                                                    {{ $item1->tencauhoi }}</td>
                                                            @else
                                                                @foreach ($phieu2 as $item2)
                                                                    @if ($item1->id == $item2->cauhoiphieu2_id)
                                                                        <td>{{ $item1->tencauhoi }}</td>
                                                                        <td>@livewire('clickphieu2', ['id' => $item2->id, 'giatri' => 1, 'diem' => $item2->diem, 'trangthai' => $item2->trangthai])</td>
                                                                        <td>@livewire('clickphieu2', ['id' => $item2->id, 'giatri' => 2, 'diem' => $item2->diem, 'trangthai' => $item2->trangthai])</td>
                                                                        <td>@livewire('clickphieu2', ['id' => $item2->id, 'giatri' => 3, 'diem' => $item2->diem, 'trangthai' => $item2->trangthai])</td>
                                                                        <td>@livewire('clickphieu2', ['id' => $item2->id, 'giatri' => 4, 'diem' => $item2->diem, 'trangthai' => $item2->trangthai])</td>
                                                                        <td>@livewire('clickphieu2', ['id' => $item2->id, 'giatri' => 5, 'diem' => $item2->diem, 'trangthai' => $item2->trangthai])</td>
                                                                    @endif
                                                                @endforeach
                                                            @endif
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
@section('footer')
    @livewireScripts
@endsection
