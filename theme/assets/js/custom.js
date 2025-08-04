// jQuery(document).ready(function ($) {
//   function syncAllImageHeights() {
//     if (window.innerWidth >= 992) {
//       $(".hero-section").each(function () {
//         var $section = $(this);
//         var $imageCol = $section.find(".col-lg-6").first();
//         var $textCol = $section.find(".col-lg-6").last();
//         var $image = $imageCol.find("img");

//         if ($image.length && $textCol.length) {
//           var textHeight = $textCol.outerHeight();
//           $image.css({
//             height: textHeight + "px",
//             width: "100%",
//             objectFit: "cover"
//           });
//         }
//       });
//     } else {
//       $(".hero-section .col-lg-6 img").css("height", "");
//     }
//   }

//   syncAllImageHeights();

//   $(window).on("resize", function () {
//     syncAllImageHeights();
//   });
// });
