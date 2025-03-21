document.addEventListener("DOMContentLoaded", function () {
  const servicesSlider = document.querySelector(".js-testimonials");
  if (servicesSlider) {
    new Splide(".js-testimonials", {
      perPage: 3,
      autoplay: true,
      interval: 15000,
      drag: true,
      pauseOnHover: true,
      type: "loop",
      arrows: false,
      pagination: false,
      focus: "center",
      breakpoints: {
        768: {
          perPage: 2,
          focus: "start",
        },
        580: {
          perPage: 1,
          focus: "start",
        },
      },
      // breakpoints: {
      //   1024: {
      //     perPage: 3,
      //   },
      //   768: {
      //     perPage: 2,
      //   },
      // },
    }).mount();
  }
});
