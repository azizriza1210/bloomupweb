<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BloomUp</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/homestyle.css" />
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')
    
    <div class="container mt-5">
        <div class="row text-danger">
            <div class="col-md-6">
                <!-- Image and prediction result container -->
                <div style="padding-left: 15%;">
                    <img class="caladium-image" src="{{asset('gambar/caladium-bicolor-beautiful-leaves-best-pot-garden-decoration_39684-709 1.png')}}" alt="">
                </div>
                <p class="diseases-text" style="text-align: center;">Ketahui penyakit yang ada pada tanaman anda dan temukan solusinya</p>
                <div id="label-container"></div>
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <!-- Card for image upload or capture -->
                <div class="card-upload-image d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <!-- Button to capture image -->
                        <button class="button-unggah" onclick="captureImage()">Ambil Gambar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script type="text/javascript">
        const URL = "./my_model/";
        let model, maxPredictions;

        async function init() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";

            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();
        }

        // Function to capture image from webcam
        function captureImage() {
            Webcam.snap(async function(data_uri) {
                const image = new Image();
                image.src = data_uri;

                image.onload = async function() {
                    const prediction = await model.predict(image);
                    displayPrediction(prediction);
                };
            });
        }

        function displayPrediction(prediction) {
            const labelContainer = document.getElementById("label-container");
            labelContainer.innerHTML = ""; // Clear previous predictions

            let maxProbability = 0;
            let predictedClass = "";

            // Find the class with the highest probability
            for (let i = 0; i < maxPredictions; i++) {
                if (prediction[i].probability > maxProbability) {
                    maxProbability = prediction[i].probability;
                    predictedClass = prediction[i].className;
                }
            }

            // Display only the class with the highest probability
            const predictionElement = document.createElement("div");
            // predictionElement.textContent = `${predictedClass}: ${maxProbability.toFixed(2)}`;
            predictionElement.textContent = `Nama Penyakit : ${predictedClass}`;
            labelContainer.appendChild(predictionElement);
        }

        // Load the model once the page is ready
        window.onload = function() {
            init();
            // Initialize webcam
            Webcam.set({
                width: 240,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('.card-upload-image');
        };
    </script>
</body>
</html>
