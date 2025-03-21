document.addEventListener("DOMContentLoaded", function () {
  const servicesSlider = document.querySelector(".js-services-slider");
  if (servicesSlider) {
    new Splide(".js-services-slider", {
      perPage: 4,
      perMove: 1,
      type: "loop",
      autoplay: true,
      interval: 15000,
      pauseOnHover: true,
      gap: "30px",
      drag: true,
      arrows: false,
      pagination: false,
      breakpoints: {
        940: {
          perPage: 2,
        },
      },
    }).mount();
  }
});

// before & after slider
const initComparison = () => {
  const sliderButton = document.querySelector(".sliderButton"),
    sliderButtonWidth = sliderButton.getBoundingClientRect().width,
    imageBefore = sliderButton.nextElementSibling,
    imageBeforeWidth = imageBefore.getBoundingClientRect().width;
  let mouseDown = false,
    mousePosition;

  imageBefore.style.clip = `rect(0px, ${imageBeforeWidth / 2}px, 9999px, 0px)`;

  imageBefore.style.clipPath = `inset(0 ${imageBeforeWidth / 2}px 0 0)`;
  sliderButton.style.left = `${imageBeforeWidth / 2 - sliderButtonWidth / 2}px`;

  sliderButton.addEventListener("mousedown", (event) => {
    mousePosition = event.clientX;
    mouseDown = true;
  });
  sliderButton.addEventListener("touchstart", (event) => {
    mousePosition = event.touches[0].clientX;
    mouseDown = true;
  });

  sliderButton.addEventListener("mouseup", () => (mouseDown = false));
  sliderButton.addEventListener("touchend", () => (mouseDown = false));
  sliderButton.addEventListener("mouseout", () => (mouseDown = false));

  sliderButton.addEventListener("mousemove", (event) => {
    if (mouseDown) {
      const sliderButtonPosition = parseInt(sliderButton.style.left);
      sliderButton.style.left = `${
        sliderButtonPosition + (event.clientX - mousePosition)
      }px`;
      mousePosition = event.clientX;

      imageBefore.style.clip = `rect(0px, ${
        sliderButton.getBoundingClientRect().width / 2 + sliderButtonPosition
      }px, ${sliderButton.getBoundingClientRect().height}px, 0px)`;

      imageBefore.style.clipPath = `inset(0 ${
        imageBefore.getBoundingClientRect().width -
        sliderButtonPosition -
        sliderButton.getBoundingClientRect().width / 2
      }px 0 0)`;
    }
  });

  sliderButton.addEventListener("touchmove", (event) => {
    if (mouseDown) {
      const sliderButtonPosition = parseInt(sliderButton.style.left);
      sliderButton.style.left = `${
        sliderButtonPosition + (event.touches[0].clientX - mousePosition)
      }px`;
      mousePosition = event.touches[0].clientX;

      imageBefore.style.clip = `rect(0px, ${
        sliderButton.getBoundingClientRect().width / 2 + sliderButtonPosition
      }px, ${sliderButton.getBoundingClientRect().height}px, 0px)`;

      imageBefore.style.clipPath = `inset(0 ${
        imageBefore.getBoundingClientRect().width -
        sliderButtonPosition -
        sliderButton.getBoundingClientRect().width / 2
      }px 0 0)`;
    }
  });
};

initComparison();
