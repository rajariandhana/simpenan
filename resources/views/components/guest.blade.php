<html>
<head>
	@vite(['resources/css/app.css','resources/js/app.js'])
	@livewireStyles
</head>
<body class="bg-white">
	@livewireScripts
    {{$slot}}
</body>
</html>