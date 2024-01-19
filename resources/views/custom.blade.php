
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="container mx-auto p-8">

        <h1 class="text-4xl font-bold mb-8">Service State Management</h1>

        <!-- Service List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service )
                <x-service-card 
                    serviceDescription="{{ $service->description }}"
                    serviceName="{{ $service->name }}"
                    status="{{ $service->status }}"/>
            @endforeach
        </div>
    </div>
    </body>
    
    <script>
        function submitForm(serviceName) {
            axios.post("{{ route('service.addAll') }}")
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => console.log(error));


            // Prevent the default form submission behavior
            // event.preventDefault();
            // console.log("salam");
            // axios.post("{{ route('service.start') }}",{serviceName: serviceName})
            // .then((response) => {
            //     toggleStatus(response.data['isActive'], serviceName);
            // })
            // .catch((error) => console.log(error));
        }

        function stopService(serviceName)
        {
            event.preventDefault();
            axios.post("{{ route('service.stop') }}",{serviceName: serviceName})
            .then((response) => {
                toggleStatus(response.data['isActive'], serviceName);
            })
            .catch((error) => console.log(error));
        }

        function restartService(serviceName)
        {
            event.preventDefault();
            axios.post("{{ route('service.restart') }}",{serviceName: serviceName})
            .then((response) => {
                toggleStatus(response.data['isActive'], serviceName);
            })
            .catch((error) => console.log(error));
        }

        function toggleStatus(isActive, serviceName)
        {
            if(isActive)
                {
                    document.getElementById(serviceName).innerHTML = `Status: <span class="font-bold text-green-500" id="isRunning">Running</span>`;
                }
                else 
                    document.getElementById(serviceName).innerHTML = `Status: <span class="font-bold text-red-500" id="isStopped">Stopped</span>`; 
        }

    </script>
</html>