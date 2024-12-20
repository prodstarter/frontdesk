<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR Code</title>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>QR Code Scanner</title>
                <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
                <style>
                    #reader {
                        width: 300px;
                        margin: 0 auto;
                    }

                    #result {
                        margin-top: 20px;
                        font-size: 1.5rem;
                        font-weight: bold;
                        text-align: center;
                    }
                </style>
            </head>

            <body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div id="reader"></div>
                        </div>
                        <div class="col" style="padding:30px;">
                            <h4>SCAN RESULT</h4>
                            <div id="result">Result Here</div>
                        </div>
                    </div>
                </div>

                <script>
                    const html5QrCode = new Html5Qrcode("reader");

                    html5QrCode.start({
                            facingMode: "environment"
                        }, {
                            fps: 10,
                            qrbox: {
                                width: 250,
                                height: 250
                            }
                        },
                        (decodedText, decodedResult) => {
                            document.getElementById("result").innerText = `Scanned: ${decodedText}`;
                        },
                        (errorMessage) => {
                            console.warn(`Scanning error: ${errorMessage}`);
                        }
                    ).catch((err) => {
                        console.error(`Unable to start scanning: ${err}`);
                    });
                </script>
            </body>

        </html>

    </body>

</html>
