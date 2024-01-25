// --- face detection ---
const MODEL_URL = "face-api.js/weights";

// load the models
await faceapi.loadSsdMobilenetv1Model(MODEL_URL);
await faceapi.loadFaceLandmarkModel(MODEL_URL);
await faceapi.loadFaceRecognitionModel(MODEL_URL);

// this function tries to find a face in the reference image and returns null if it does not find one
async function faceDetect(input_img, useTinyModel=false) {
    const referenceFaceDetect = await faceapi.detectSingleFace(input_img).withFaceLandmarks(useTinyModel).withFaceDescriptor();
    if (referenceFaceDetect) {
        return referenceFaceDetect;
    } else {
        return null;
    }
}

// this function compares two images and returns a value with the lowest being 0.0.
// 0.0 means they are very similar and a higher value means that they are dissimilar. 
// Note that these arent precentages.
async function matchFace(input_image, reference_image, threshold=0.5) {
    console.log('matching...');
    let inputFaceDetect = await faceDetect(input_image);
    let referenceDetect = await faceDetect(reference_image);

    if(!inputFaceDetect) {
        console.log('no face was detected in the input image')
        return null;
    }
    if(!referenceDetect) {
        console.log('no face was detected in the reference image')
        return null;
    }

    // create FaceMatcher generated from the database image detection results
    let faceMatcher = new faceapi.FaceMatcher(referenceDetect);
    
    // check if the input face detect matches the database image
    const bestMatch = faceMatcher.findBestMatch(inputFaceDetect.descriptor, threshold);
    return {
        'match': bestMatch.distance <= threshold,
        'distance': bestMatch.distance,
    };
}

function initVideoFeed() {
    // Check if the browser supports getUserMedia
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                var video = document.getElementById('video');
                video.srcObject = stream;
            })
            .catch(function(error) {
                console.error('Error accessing the camera:', error);
            });
    } else {
        console.error('getUserMedia is not supported in this browser');
    }
}

// this runs after the page has finished loading the images
$(document).ready(async () => {
    var isFaceMatching = false;
    const dbImg = document.getElementById('dbImg');
    const inputVid = document.getElementById('video');
    const resultMsg = document.getElementById('result_msg');

    initVideoFeed(); // turns on the camera

    // call the matchFace function every 1000ms
    let intervalId;
    intervalId = setInterval(async () => {
        let result = await matchFace(inputVid, dbImg);

        if (result !== null) {
            isFaceMatching = isFaceMatching !== true ? result['match'] : isFaceMatching;

            if (isFaceMatching) {
                clearInterval(intervalId);
                resultMsg.innerText =  "face matches! :D";
            } else {
                resultMsg.innerText =  "Faces do not match, try moving your face around or removing your eyeglasses...";
            }

        } else {
            resultMsg.innerText = "No face detected! Try moving your face around...";
        }

    }, 1000);
});