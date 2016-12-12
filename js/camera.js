/*
Each room has a camera, but each room does not necessarily have its own camera server. Sometimes rooms share camera servers.

@param cameraServerIP
@param CameraID OPTIONAL an integer starting from 1 of the camera
*/
function getCameraURL(CameraServerIP, CameraID) {
    "use strict";
    var prefix = "TODO";
    var path = "axis-cgi/mjpg/video.cgi";
    var specifyResolution = false;
    var imageAttributes = "";

    if (CameraID !== "") {
        imageAttributes += "?";
        imageAttributes += "camera=" + CameraID;
    }
    if (specifyResolution) {

        if (imageAttributes === "") {
            imageAttributes = "?";
        } else {
            imageAttributes += "&";
        }
        imageAttributes += "resolution=352x240";
    }
    return prefix + CameraServerIP + "/" + path + imageAttributes;
}
