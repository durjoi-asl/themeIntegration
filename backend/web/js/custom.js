"use strict";

function makeScreenshot() {
  html2canvas(document.querySelector("#capture"), {scale: 2}).then(canvas => {
    // document.querySelector("#capture_main").appendChild(canvas)

    const dataURL = canvas.toDataURL();
    const convertedImg = document.querySelector("#screenshot_img");
    convertedImg.src = dataURL;



    $.ajax({
      url: '/screenshot/store',
      type: 'post',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
      },
      data: {
        'img': dataURL
      },
      success: function(response) {
        if (response){
          console.log(response);
          document.querySelector(".image_preview").classList.add("show");
        } else {
          console.log(response);
        }

      }
    })


  });
}


// function makeScreenshot() {
//   html2canvas($('#capture'), {
//       onrendered: function (canvas) {
//         console.log("ok");
//         var dataURL = canvas.toDataURL();
//         var convertedImg = $("#screenshot_img");
//         convertedImg.src = dataURL;
//       }
//   });
// }

// function makeScreenshot() {
//   html2canvas(document.querySelector("#capture"), {scale: 2}).then(canvas => {
//     // document.querySelector("#capture_main").appendChild(canvas)
//
//     const dataURL = canvas.toDataURL();
//     const convertedImg = document.querySelector("#screenshot_img");
//     convertedImg.src = dataURL;
//     document.querySelector(".image_preview").classList.add("show");
//
//   });
// }
