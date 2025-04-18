/* Yeswanth code: JavaScript for event handling */

// Yeswanth code: "Register/Login" button -> redirect to https://yashedhala.github.io/Yesrayjobportal/
const registerBtn = document.querySelector(".register-btn");
registerBtn.addEventListener("click", () => {
  window.location.href = "https://yashedhala.github.io/Yesrayjobportal/";
});

// Yeswanth code: "Get Started" CTA button in the hero
const ctaBtn = document.querySelector(".cta-btn");
ctaBtn.addEventListener("click", () => {
  alert("Let’s get you started with YesRay!");
  // Yeswanth code: Optionally redirect or open a sign-up form/modal
  // window.location.href = "/signup.html";
});

// Yeswanth code: Handle the contact form submission
const contactForm = document.querySelector(".contact-form");
if (contactForm) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault(); // prevent page refresh
    alert("Thanks for reaching out! We’ll respond as soon as possible.");
    contactForm.reset(); // Clear the form fields
  });
}
