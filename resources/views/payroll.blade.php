@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Payroll') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<h1>Payroll</h1>
                    <hr>

					<div class="row">
						<div class="col">
							<form>
								<div class="row">
									<div class="col">
										<select class="custom-select" id="payroll-controller-salesrep" placeholder="Sales Representative">
											<option selected>-- Sales Representative --</option>
											<option value="1">[1] Martin Neir</option>
											<option value="2">[2] Simon Sunod</option>
											<option value="3">[3] Jina Pholine</option>
											<option value="4">[4] Jose Chan</option>
										</select>
									</div>
									<div class="col-2">
										<select class="custom-select" id="payroll-controller-month" placeholder="Month">
											<option value="January">January</option>
											<option value="February">February</option>
											<option value="March">March</option>
											<option value="April">April</option>
											<option value="May">May</option>
											<option value="June">June</option>
											<option value="Jully">Jully</option>
											<option value="August">August</option>
											<option value="September">September</option>
											<option value="October">October</option>
											<option value="November">November</option>
											<option value="December">December</option>
										</select>
									</div>
									<div class="col-2">
										
									<select class="custom-select" id="payroll-controller-period" placeholder="Period">
											<option value="1">Week 1</option>
											<option value="2">Week 2</option>
											<option value="3">Week 3</option>
											<option value="4">Week 4</option>
										</select>
									</div>
									<div class="col-2">
										<select class="custom-select" id="payroll-controller-year" placeholder="Year"></select>
									</div>
									<div class="col-2">
										<input type="number" id="payroll-controller-bonus" class="form-control" placeholder="Bonus" min=0 max=100>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-2">
										<input type="number" id="payroll-controller-no-of-clients" class="form-control" placeholder="No. of Client" value="0" min=0 max=100>
									</div>
								</div>
							</form>
							<hr>

							<h4>Clients</h4>
							<form id="section-clients">
								<!-- <div class="row p-3 client-panel">
									<div class="col-8">
										<label>Client Name</label>
										<input type="text" class="form-control fi-client-name" placeholder="Client Name">
									</div>
									<div class="col">
										<label>Commission Amount</label>
										<input type="number" class="form-control fi-client-comission" placeholder="Commission Amount">
									</div>
								</div> -->
							</form>
							<hr>
							<div class="text-center">
								<button class="btn btn-lg btn-primary" id="payroll-control-create-button">Create Payroll</button>
							</div>
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
