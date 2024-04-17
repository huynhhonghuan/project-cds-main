@extends('trangquanly.admin.layout'){{-- kế thừa form layout --}}

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
                    <div class="col-7 p-5 bg-light mx-auto">
                        <h3 class="text-center mt-3 mb-5">Ý KIẾN CỦA DOANH NGHIỆP VỀ CHUYỂN ĐỔI SỐ </h3>
                        <form action="{{ route('doanhnghiep.khaosat.phieu4', ['id' => $phieu4->id]) }}" method="POST"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label>1. Nhu cầu về dịch vụ Công nghệ thông tin/Chuyển đổi số (nếu không có hãy nhập:
                                    "Không").</label>
                                <textarea class="form-control @error('tomtat') is-invalid @enderror" rows="4" id="editor1" name="noidungnhucau" readonly
                                    required>{{ old('noidungnhucau') }} {{ $phieu4->noidungnhucau }}</textarea>
                                <div class="invalid-feedback">
                                    Hãy nhập nhu cầu!
                                </div>
                            </div>

                            <div class="form-group">
                                <label>2. Hỏi/ đáp hoặc đề xuất (nếu không có hãy nhập: "Không").</label>
                                <textarea class="form-control @error('tomtat') is-invalid @enderror" rows="4" id="editor1" name="noidungdexuat" readonly
                                    required>{{ old('noidungdexuat') }} {{ $phieu4->noidungdexuat }}</textarea>
                                <div class="invalid-feedback">
                                    Hãy nhập hỏi/đáp hoặc đề xuất!
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
