"use strict";

function makeScreenshot() {
  html2canvas(document.querySelector("#capture"), {scale: 2}).then(canvas => {
    // document.querySelector("#capture_main").appendChild(canvas)

    const dataURL = canvas.toDataURL();
    const convertedImg = document.querySelector("#screenshot_img");
    convertedImg.src = dataURL;

    document.querySelector(".image_preview").classList.add("show");
  });
}

// function makeScreenshot() {
//   html2canvas($("#capture"), {scale: 2}).then(canvas => {
//     const dataURL = canvas.toDataURL();
//     const convertedImg = $("#screenshot_img");
//     convertedImg.src = dataURL;
//
//     $(".image_preview").addClass("show");
//   });
// }
