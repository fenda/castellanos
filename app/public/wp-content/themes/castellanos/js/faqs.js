const buttons = document.querySelectorAll(".js-openQ");

buttons.forEach((thisQuestion) => {
  thisQuestion.addEventListener("click", () => {
    if (thisQuestion.parentElement.classList.contains("faqlist__item--open")) {
      thisQuestion.parentElement.classList.remove("faqlist__item--open");
    } else {
      buttons.forEach((question) => {
        question.parentElement.classList.remove("faqlist__item--open");
      });
      thisQuestion.parentElement.classList.add("faqlist__item--open");
    }
  });
});
