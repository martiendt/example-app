<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $errors->first('file') }}</strong>
		</div>
		@endif

    <div class="container mt-3 text-center">
        <h3 class="mb-2">
            Import Penjualan Infor (Report Detail Penjualan) 
        </h3>
        <form action="{{ route('file-import-jual') }}" method="POST" enctype="multipart/form-data">
		@if ($sukses = Session::get('jualsuccess'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

            @csrf
            <div class="form-group mb-2" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile" accept=".xlsx">
                    <label class="custom-file-label" for="customFile">...</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>

    <div class="container mt-3 text-center">
        <h3 class="mb-2">
            Import Harga Barang (Item Pricing)
        </h3>
        <form action="{{ route('file-import-harga') }}" method="POST" enctype="multipart/form-data">
		@if ($sukses = Session::get('hargasuccess'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

            @csrf
            <div class="form-group mb-2" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile" accept=".csv">
                    <label class="custom-file-label" for="customFile">...</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>

    <div class="container mt-3 text-center">
        <h3 class="mb-2">
            Import PO Infor (Report Pembelian 3)
        </h3>
        <form action="{{ route('file-import-po') }}" method="POST" enctype="multipart/form-data">
		@if ($sukses = Session::get('posuccess'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

            @csrf
            <div class="form-group mb-2" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile" accept=".xlsx">
                    <label class="custom-file-label" for="customFile">...</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>

    <div class="container mt-3 text-center">
        <h3 class="mb-2">
            Report
        </h3>
        <a href="/kdu/display-jualstokpo" class="btn btn-info" role="button">Penjualan, Stok, PO</a>
    </div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


</body>
</html>