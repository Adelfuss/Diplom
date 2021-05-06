<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #5BBCEC;
        }
    </style>
</head>
<body>
    <script>
        const allow = navigator.geolocation;
        console.log(allow);
        if (allow) {
            const xhr = new XMLHttpRequest();
            navigator.geolocation.watchPosition(
                data => {
                    console.log(data);
                    xhr.open("POST", '/admin/track/add',true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send(`longitude=${data.coords.longitude}&latitude=${data.coords.latitude}`);
                },
                error => {
                    console.log(error);
                },
                {
                    enableHighAccuracy: true,
                    maximumAge        : 30000,
                    timeout           : 27000
                }
            );
        } else {
            console.log('not');
        }

    </script>
</body>
</html>
