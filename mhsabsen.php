<!doctype html>
<html>
<head>
	<title>Absen Tamu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="Jquery/jquery-3.3.1.min.js"></script>
	<script src="Scripts/vue.min.js"></script>
	<script src="Scripts/vue-qrcode-reader.browser.js"></script>
	<link rel="stylesheet" href="Scripts/vue-qrcode-reader.css">
	<script src="Bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<style>
	body
	{
		background-color: black;
	}
</style>
</head>

<body bgcolor="black">
	<br>
	<div class="container" id="containerScanner">
		<div class="jumbotron">
			<div id="app">
				<p class="error">
					{{ errorMessage }}
				</p>
				<qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
			</div>
		</div>
	</div>
	<div class="container" id="containerInput" style="display: none">
		<div class="jumbotron">
			<h3>Absen</h3>
			<hr>
			
			<div class="form-group">
				<label for="nrp">NRP</label>
				<input type="nrp" name="nrp" id="nrp" class="form-control" readonly>
			</div>
			<button class="btn btn-success" onclick="checkValid()">Update Data</button>
			
		</div>
	</div>
	<div id="debug">
		
	</div>
	<script>
		var user;
		var timerCheckHadiah;

		Vue.use(VueQrcodeReader)
		new Vue({
			el: '#app',

			data () {
				return {
					decodedContent: '',
					errorMessage: ''
				}
			},

			methods: {
				onDecode (content) {
					$("#nrp").val(content);
					updateFields();
					animateDataTamu();
				},

				onInit (promise) {
					promise.then(() => {
						console.log('Successfully initilized! Ready for scanning now!')
					})
					.catch(error => {
						if (error.name === 'NotAllowedError') {
							this.errorMessage = 'Hey! I need access to your camera'
						} else if (error.name === 'NotFoundError') {
							this.errorMessage = 'Do you even have a camera on your device?'
						} else if (error.name === 'NotSupportedError') {
							this.errorMessage = 'Seems like this page is served in non-secure context (HTTPS, localhost or file://)'
						} else if (error.name === 'NotReadableError') {
							this.errorMessage = 'Couldn\'t access your camera. Is it already in use?'
						} else if (error.name === 'OverconstrainedError') {
							this.errorMessage = 'Constraints don\'t match any installed camera. Did you asked for the front camera although there is none?'
						} else {
							this.errorMessage = 'UNKNOWN ERROR: ' + error.message
						}
					})
				}
			}
		})

		function updateFields()
		{
			$.post("querymh.php",{nrp: $("#nrp").val()}, function(data)
			{
				if(data == ';;;')
				{
					clearFields();
					animateScanner();
					alert("Data Tidak Ditemukan!");	
				}
				else
				{
					var datauser = data.split(";");
					if(datauser[4] != '1')
					{
						$("#namaTamu").val(datauser[1]);
						$("#alamat").val(datauser[2]);
						$("#kuota").val(datauser[3]);
						$("#jumhadir").attr("max",datauser[3]);
					}
					else
					{
						clearFields();
						animateScanner();
						alert("Tamu Sudah Datang! Mohon Kontak Admin untuk Mengubah Data Ini!");
					}
				}
			});
		}

		function clearFields()
		{
			$("#nrp").val("");
		}

		function animateScanner()
		{
			$("#containerScanner").slideDown();
			$("#containerInput").slideUp();
		}

		function animateDataTamu()
		{
			$("#containerScanner").slideUp();
			$("#containerInput").slideDown();
		}

		animateScanner();

	</script>
</body>
</html>