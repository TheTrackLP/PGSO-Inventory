// $(function () {
//     var showPopup = false;
//     $("form").submit(function (e) {
//         if (showPopup == false) {
//             e.preventDefault();
//             showPopup = true;
//             var form = $(this);
//             Swal.fire({
//                 title: "Confirm?",
//                 text: "Are input data complete?",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#3085d6",
//                 cancelButtonColor: "#d33",
//                 confirmButtonText: "Yes, Confirm it!",
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     Swal.fire(
//                         {
//                             title: "Success!",
//                             text: "New Data has been stored.",
//                             icon: "success",
//                         },
//                         form.trigger("submit")
//                     );
//                 }
//             });
//         }
//     });
// });
