
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="container mx-auto p-8">

        <h1 class="text-4xl font-bold mb-8">Service State Management</h1>

        <!-- Service List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service )
                <x-service-card 
                    serviceTitle="{{ $service->title }}"
                    serviceName="{{ $service->name }}"
                    status="{{ $service->status }}"/>
            @endforeach
        </div>
    </div>
    </body>
    
    <script>
        function submitForm(serviceName) {
            // Prevent the default form submission behavior
            event.preventDefault();
            console.log("salam");
            axios.post("{{ route('service.start') }}",{serviceName: serviceName})
            .then((response) => {
                console.log(response.data)
                if(response.data['isActive'])
                {
                    window.location.reload();
                    document.getElementById('isRunning').innerHTML = "Running";
                }
            })
            .catch((error) => console.log(error));
        }

        function stopService(serviceName)
        {
            event.preventDefault();
            axios.post("{{ route('service.stop') }}",{serviceName: serviceName})
            .then((response) => {
                console.log(response.data['isActive'])
                console.log(response.data);
                window.location.reload();
            })
            .catch((error) => console.log(error));
        }

        function restartService(serviceName)
        {
            event.preventDefault();
            axios.post("{{ route('service.restart') }}",{serviceName: serviceName})
            .then((response) => {
                console.log(response.data['isActive'])
                console.log(response.data);
                window.location.reload();
            })
            .catch((error) => console.log(error));
        }
    </script>
</html>