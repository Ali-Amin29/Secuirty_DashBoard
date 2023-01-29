<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @if (Session()->has('massage'))
        <div class="alert alert-info">
            {{ session()->get('massage') }}
        </div>
    @endif
    <audio id="auto">
        <source src="{{ asset('Room/ahmed.mp3') }}" type="audio/mp3">
        <source src="{{ asset('Room/ahmed.mp3') }}" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>


    <div id="reader" width="600px"></div>

    <form action="{{ route('Scans') }}" id="myForm" method="post">
        @csrf
        <input type="text" value="" id="xx" name="user">
        <input type="text" value="1" id="room" name="room">
        <button type="submit">guashk</button>

    </form>


    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            var scan = `${decodedText}`;
            const elem = document.getElementById('xx').value = `${decodedText}`;
            document.getElementById('auto').play();
            document.getElementById("myForm").submit();


        }

        function onScanFailure(error) {

        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 500,
                    height: 500
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>

</html>
