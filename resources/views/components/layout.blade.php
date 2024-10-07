<html>
<head>
	@vite(['resources/css/app.css','resources/js/app.js'])
	@livewireStyles
</head>
<body class="bg-gray-100">
	@livewireScripts
	{{$slot}}
</body>
</html>