const awardsLogos = document.querySelector(".awards__list");
let slider;

if (awardsLogos) {
  slider = tns({
    container: ".awards__list",
    items: 1,
    autoplay: false,
    autoplayTimeout: 15000,
    swipeAngle: false,
    mouseDrag: true,
    speed: 400,
    controls: false,
    nav: false,
    controls: true,
    mouseDrag: true,
    gutter: 10,
    controlsText: [
      "<svg class='icon icon--nav'><use xlink:href='/wp-content/themes/quintana/img/font-awesome.svg#chevron-left'></use></svg>",
      "<svg class='icon icon--nav'><use xlink:href='/wp-content/themes/quintana/img/font-awesome.svg#chevron-right'></use></svg>",
    ],
    responsive: {
      480: {
        items: 2,
        gutter: 10,
      },
      680: {
        items: 3,
        gutter: 30,
      },
      940: {
        items: 4,
      },
      1200: {
        items: 5,
        gutter: 50,
      },
    },
  });
}
