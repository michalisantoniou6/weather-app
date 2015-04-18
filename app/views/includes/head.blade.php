<head>
	<meta charset="UTF-8">
	<title>Weather App</title>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />

	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}

		#city-container {
			float: right;
			text-align: right;
			padding-right: 2%;
		}

		.error {
			color: red;
		}

		#header {
			height: 50px;
			background-color: rgb(234, 243, 252);
		}

		#saveAll {
			background-color: #FFCD83;
			padding: 5%;
		}

		.user-city {
			cursor: pointer;
		}
	</style>
</head>