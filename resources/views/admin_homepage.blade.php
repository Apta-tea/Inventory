<div class="row">
	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<h4 class="card-title">Customers</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0">{{ $total_customers }}</h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small">
                            <a
					href="{{ url('customer') }}">View</a>
                            </span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<h4 class="card-title">Suppliers</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0">{{ $total_supplier }}</h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small">
                            <a
					href="{{ url('supplier') }}">View</a>
                            </span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<h4 class="card-title">Purchase</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0">{{ $purchase_total_cost }}</h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small">
                            <a
					href="{{ url('purchase') }}">View</a>
                            </span>
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<h4 class="card-title">Sell</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0">{{ $invoice_total_cost }}</h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small">
                            <a
					href="{{ url('invoice') }}">View</a>
                            </span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
