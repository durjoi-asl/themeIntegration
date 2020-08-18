"use strict";

function makeScreenshot() {
  html2canvas(document.querySelector("#capture"), {scale: 2}).then(canvas => {
    // document.querySelector("#capture_main").appendChild(canvas)

    const dataURL = canvas.toDataURL();

    console.log(dataURL);

    const convertedImg = document.querySelector("#screenshot_img");
    convertedImg.src = dataURL;

    document.querySelector(".image_preview").classList.add("show");
  });
}
