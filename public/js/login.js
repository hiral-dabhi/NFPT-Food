"use strict";

window.addEventListener("DOMContentLoaded", function () {
	// main modal for large and small devices
	const mainModal = new bootstrap.Modal(
		document.getElementById("mainModal"),
		{}
	);

	/* =====================================================
  Tab Login/Register Modal For Small Devices
  ======================================================== */
	const registerLinkMobile = document.getElementById("registerLinkMobile");
	const loginLinkMobile = document.getElementById("loginLinkMobile");
	const loginTab = document.getElementById("pills-login");
	const registerTab = document.getElementById("pills-register");
	const loginTabButton = document.getElementById("tab-login");
	const registerTabButton = document.getElementById("tab-register");

	// mobile login/register modal tab
	function switchTab(targetTab, currentTab, targetButton, currentButton) {
		// Update the active state of the tab buttons
		currentButton.classList.remove("active");
		targetButton.classList.add("active");

		// Hide the current tab content with fade effect
		currentTab.classList.remove("show", "active");
		currentTab.classList.add("fade");

		setTimeout(function () {
			currentTab.classList.remove("fade");
			currentTab.classList.remove("show", "active");
		}, 200);

		// Show the target tab content with fade effect
		targetTab.classList.add("show", "active");
		setTimeout(function () {
			targetTab.classList.remove("fade");
		}, 200);
	}

	// tab activating process calling
	registerLinkMobile.addEventListener("click", function (event) {
		event.preventDefault();
		switchTab(registerTab, loginTab, registerTabButton, loginTabButton);
	});

	loginLinkMobile.addEventListener("click", function (event) {
		event.preventDefault();
		switchTab(loginTab, registerTab, loginTabButton, registerTabButton);
	});

	/* =====================================================
    Sliding Login/Register Modal Start With Medium Devices
  ======================================================== */

	const loginLink = document.getElementById("loginLink");
	const registerLink = document.getElementById("registerLink");

	const formImage = document.querySelector("#formImage");
	const formContent = document.querySelector("#formContent");

	const loginForm = document.querySelector(".loginForm");
	const registerForm = document.querySelector(".registerForm");

	// register slide
	registerLink.addEventListener("click", function (event) {
		event.preventDefault();
		formImage.classList.remove("slide-in");
		formImage.classList.add("slide-in-reverse");
		formContent.classList.remove("slide-in");
		formContent.classList.add("slide-out");
		loginForm.classList.remove("form-show");
		registerForm.classList.add("form-show");

		// image changing with slide
		formImage.style.backgroundImage = `url("https://i.ibb.co/2sL6wtP/movie-poster-register.jpg")`;
	});

	// login slide
	loginLink.addEventListener("click", function (event) {
		event.preventDefault();
		formImage.classList.remove("slide-in-reverse");
		formImage.classList.add("slide-in");
		formContent.classList.remove("slide-in-reverse");
		formContent.classList.add("slide-in");
		registerForm.classList.remove("form-show");
		loginForm.classList.add("form-show");

		// image changing with slide
		formImage.style.backgroundImage = `url("https://i.ibb.co/JQNt37h/avenger-movie-login.jpg")`;
	});
});
