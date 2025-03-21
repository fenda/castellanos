const header = document.querySelector(".header");

window.addEventListener("scroll", function () {
  if (window.scrollY > 0) {
    header.classList.add("animate");
  } else {
    header.classList.remove("animate");
  }
});

// accordion
// const accordionItems = document.querySelectorAll(".js-accordionitem");

// accordionItems.forEach((item) => {
//   item.addEventListener("click", () => {
//     if (item.parentElement.classList.contains("is-open")) {
//       item.parentElement.classList.remove("is-open");
//       console.log("removing");
//     } else {
//       accordionItems.forEach((item) => {
//         item.parentElement.classList.remove("is-open");
//       });
//       item.parentElement.classList.add("is-open");
//     }
//   });
// });

// get screen width and only run parallax above 1024px
const screenWidth = window.innerWidth;

if (screenWidth > 1024) {
  document.querySelectorAll(".img-parallax").forEach(function (img) {
    const imgParent = img.parentElement;

    function parallaxImg() {
      const speed = parseFloat(img.dataset.speed);
      const imgY = imgParent.getBoundingClientRect().top + window.scrollY;
      const winY = window.scrollY;
      const winH = window.innerHeight;
      const parentH = imgParent.offsetHeight;

      const winBottom = winY + winH;

      if (winBottom > imgY && winY < imgY + parentH) {
        const imgBottom = (winBottom - imgY) * speed;
        const imgTop = winH + parentH;
        const imgPercent = (imgBottom / imgTop) * 100 + (50 - speed * 50);

        img.style.top = imgPercent + "%";
        img.style.transform = "translate(-50%, -" + imgPercent + "%)";
      }
    }

    window.addEventListener("scroll", parallaxImg);
    window.addEventListener("load", parallaxImg);
  });
}

// Text expand/collapse functionality
function initializeReadMore() {
  const readMoreContainers = document.querySelectorAll(".js-readMoreContainer");

  readMoreContainers.forEach((container) => {
    const readMoreBtn = container.querySelector(".js-readMore");
    const readLessBtn = container.querySelector(".js-readLess");

    function handleTextDisplay() {
      if (window.innerWidth <= 680) {
        const paragraphs = container.getElementsByTagName("p");

        if (paragraphs.length > 3) {
          readMoreBtn.classList.remove("is-hidden");

          Array.from(paragraphs).forEach((p, index) => {
            if (index >= 3) {
              p.classList.add("is-hidden");
            }
          });
        }
      } else {
        const hiddenParagraphs = container.querySelectorAll(".is-hidden");
        hiddenParagraphs.forEach((p) => p.classList.remove("is-hidden"));
        readMoreBtn.classList.add("is-hidden");
        readLessBtn.classList.add("is-hidden");
      }
    }

    readMoreBtn.addEventListener("click", () => {
      const hiddenParagraphs = container.querySelectorAll("p.is-hidden");
      hiddenParagraphs.forEach((p) => p.classList.remove("is-hidden"));
      readMoreBtn.classList.add("is-hidden");
      readLessBtn.classList.remove("is-hidden");
    });

    readLessBtn.addEventListener("click", () => {
      const paragraphs = container.getElementsByTagName("p");
      Array.from(paragraphs).forEach((p, index) => {
        if (index >= 3) {
          p.classList.add("is-hidden");
        }
      });
      readLessBtn.classList.add("is-hidden");
      readMoreBtn.classList.remove("is-hidden");
    });

    handleTextDisplay();
    window.addEventListener("resize", handleTextDisplay);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initializeReadMore();
});
