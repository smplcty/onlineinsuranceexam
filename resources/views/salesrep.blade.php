@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sales Representative') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<h1>Manage Sales Representative</h1>
                    <hr>

					<div class="row">
						<div class="col">
							<div class="text-right">
								<button type="button" class="btn btn-primary" id="button-refresh-table">Refresh</button>
								<button type="button" class="btn btn-success" id="button-add-sales-rep">Add Sales Representative</button>
							</div>
							<br>
							<table class="table">
								<thead class="thead-dark">
									<tr>
									<th scope="col" style="width: 100px;">ID</th>
									<th scope="col">Name</th>
									<th scope="col" style="width: 150px;">Action</th>
									</tr>
								</thead>
								<tbody id="table-body-salesrep">
									<!-- <tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>
											<button type="button" class="oi-btn btn btn-primary btn-sm" data-target="#modal-salesrep" data-id="1">Edit</button>
										</td>
									</tr> -->
								</tbody>
							</table>
							<!-- <button type="button" class="btn btn-primary float-left" id="button-test">test</button> -->
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-salesrep" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
				<div class="form-group">
					<label for="exampleInputEmail1">ID</label>
					<input type="input" class="fi-field form-control" id="fi-id" name="id" placeholder="< Auto Generated >" value="" disabled=true>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input type="input" class="fi-field form-control" id="fi-name" name="name" placeholder="Enter Name" value=0>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Commission</label>
					<input type="number" class="fi-field form-control" id="fi-commission" name="commission" max=100 min=0 placeholder="Enter Commission" value=0>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Tax</label>
					<input type="number" class="fi-field form-control" id="fi-tax" name="tax" max=100 min=0 placeholder="Enter Tax" value=0>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary" id="button-save-salesrep">Save changes</button>
		</div>
		</div>
	</div>
</div>
@endsection
