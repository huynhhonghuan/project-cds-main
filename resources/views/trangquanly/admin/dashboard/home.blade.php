@extends('trangquanly.admin.layout'){{--kế thừa form layout--}}
@section('content'){{--thêm content vào form kế thừa chỗ @yield('content')--}}
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Good Morning {{Auth::user()->name}}!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection
