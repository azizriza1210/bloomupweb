<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BloomUp</title>
    <!---CSS File!--->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/homestyle.css" />
    <style>
        .caladium-image{
            width: 180px;
            height: 180px;
            flex-shrink: 0;
        }
        .card-upload-image{
            border-radius: 30px;
            background: #FFF;
            box-shadow: 0px 0px 23.2px 8px rgba(0, 0, 0, 0.25);
            width: 480px;
            height: 310px;
            flex-shrink: 0;
        }
        .diseases-text{
            width: 329px;
            flex-shrink: 0;
            color: var(--Green1, var(--Primary, #0D3824));
            font-family: Mitr;
            font-size: 35px;
            font-style: normal;
            font-weight: 500;
            line-height: 115.4%; /* 40.39px */
        }
        .button-unggah{
            border-radius: 50px;
            background: #52BF81;
            width: 342px;
            height: 57px;
            flex-shrink: 0;
            color:#ffff ;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 15px 12px;
            cursor: pointer;
        }

        input[type="file"] {
            display: none;
        }       
    </style>
  </head>

  <body>
    @include('components.navbar')
    <div class="container mt-5">
        <div class="row text-danger">
            <div class="col-md-6">
                <div style="padding-left: 15%;">
                    <img class="caladium-image" id="preview" src="{{asset('gambar/caladium-bicolor-beautiful-leaves-best-pot-garden-decoration_39684-709 1.png')}}" alt="">
                </div>
                <p class="diseases-text" id="label-container" style="text-align: center;">Ketahui penyakit yang ada pada tanaman anda dan temukan solusinya</p>
                {{-- <div id="image-preview-container"></div>
                <div id="label-container"></div> --}}
            </div>

            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="card-upload-image d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <div>
                            <label class="button-unggah">
                                Unggah Gambar
                                <input type="file" onchange="previewImage(event)">
                            </label>
                        </div>
                        {{-- <label class="button-unggah"><input type="file">Unggah Gambar</label> --}}
                        {{-- <input type="file" id="unggah" accept="image/*" onchange="previewImage(event)"> --}}
                            <div class="p-2">Atau</div>
                        <button class="button-unggah">Ambil Gambar</button>
                    </div>
                </div>
            </div>

            <!-- Menambahkan elemen untuk menampilkan gambar -->
            {{-- <div id="imagePreview" class="col-md-6 d-flex justify-content-center align-items-center">
                <img id="preview" src="" alt="Preview Image" style="max-width: 100%;">
            </div> --}}

        </div>
    </div>


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

        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const image = new Image();
                image.src = reader.result;
                console.log("Ini source : ", image.src);

                // Menampilkan gambar di elemen img dengan id "preview"
                document.getElementById("preview").src = image.src;

                image.onload = async function() {
                    const prediction = await model.predict(image);
                    displayPrediction(prediction);
                };
            };

            reader.readAsDataURL(input.files[0]);
        }

        function displayPrediction(prediction) {
            const labelContainer = document.getElementById("label-container");
            labelContainer.innerHTML = ""; // Bersihkan prediksi sebelumnya

            let maxProbability = 0;
            let predictedClass = "";

            // Temukan kelas dengan probabilitas tertinggi
            for (let i = 0; i < maxPredictions; i++) {
                if (prediction[i].probability > maxProbability) {
                    maxProbability = prediction[i].probability;
                    predictedClass = prediction[i].className;
                }
            }

            // Tampilkan hanya kelas dengan probabilitas tertinggi
            const predictionElement = document.createElement("div");
            predictionElement.textContent = `${predictedClass}: ${maxProbability.toFixed(2)}`;
            labelContainer.appendChild(predictionElement);
        }

        // Load the model once the page is ready
        window.onload = init;
    </script>

  </body>
</html>