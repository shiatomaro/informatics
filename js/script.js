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

// this function compares two images and returns a value, ranging from 0.0 to 1.0,
//  that represents how similar the faces are.
async function matchFace(input_image, reference_image) {
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
    const bestMatch = faceMatcher.findBestMatch(inputFaceDetect.descriptor);
    return bestMatch.distance;
}

// this runs after the page has finished loading the images
$(document).ready(async () => {
    const inputImg = document.getElementById('inputImg');
    const dbImg = document.getElementById('dbImg');
    const result = await matchFace(inputImg, dbImg);
    if (result) {
        $("#result_msg").text(` match found! (${(result * 100).toFixed(2)}% match)`);
    } else {
        $("#result_msg").text(" the images do not match");
    }
    console.log("script finished running");
});
