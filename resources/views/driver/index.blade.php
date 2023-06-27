<!DOCTYPE html>
<html>
<head>
    <title>Driver List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    <h2>Driver List</h2>
    
    <h3>Garbages with Level above 50:</h3>
    @foreach ($garbages as $garbage)
        @if ($garbage->level > 50)
            <div>
                <h4>Garbage ID: {{ $garbage->id }}</h4>
                <p>Latitude: {{ $garbage->latitude }}</p>
                <p>Longitude: {{ $garbage->longtiude }}</p>
                
                <label for="driver{{ $garbage->id }}">Select a driver:</label>
                <select id="driver{{ $garbage->id }}" name="driver">
                    <option value="">Choose a driver</option>
                    @foreach ($drivers as $userName)
                        <option value="{{ $userName }}">{{ $userName }}</option>
                    @endforeach
                </select>
            </div>
            <br>
        @endif
    @endforeach

    <button type="button" onclick="assignDrivers()">Assign</button>

    <script>
        function assignDrivers() {
            var driverData = {};
            
            // Collect selected driver for each garbage
            @foreach ($garbages as $garbage)
                @if ($garbage->level > 50)
                    var driverId = document.getElementById("driver{{ $garbage->id }}").value;
                    if (driverId) {
                        driverData["{{ $garbage->id }}"] = driverId;
                    }
                @endif
            @endforeach
            
            // Send the data to the server
            fetch('{{ route('drivers.assignDriver') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(driverData)
            })
            .then(response => {
                // Handle the response
                if (response.ok) {
                    alert('Drivers assigned successfully');
                    location.reload(); // Refresh the page to update the view
                } else {
                    alert('Error assigning drivers');
                }
            })
            .catch(error => {
                alert('An error occurred: ' + error);
            });
        }
    </script>
</body>
</html>
