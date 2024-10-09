<html>
<head>
	@vite(['resources/css/app.css','resources/js/app.js'])
	@livewireStyles
</head>
<body class="bg-gray-100">
	@livewireScripts
	<x-navbar></x-navbar>
	<div class="flex flex-col w-full gap-y-6 px-12 my-12">
		{{$slot}}
	</div>
</body>
</html>