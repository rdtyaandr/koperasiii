document.addEventListener("DOMContentLoaded", function () {
	var dropdowns = document.querySelectorAll(".dropdown");

	dropdowns.forEach(function (dropdown) {
		var dropdownTrigger = dropdown.querySelector(".dropdown-trigger");
		var dropdownText = dropdown.querySelector(".dropdown-text");
		var dropdownMenu = dropdown.querySelector(".dropdown-menu");
		var dropdownItems = dropdown.querySelectorAll(".dropdown-item");

		dropdownTrigger.addEventListener("click", function () {
			dropdowns.forEach(function (d) {
				if (d !== dropdown) d.classList.remove("open");
			});
			dropdown.classList.toggle("open");
		});

		dropdownItems.forEach(function (item) {
			item.addEventListener("click", function () {
				var selectedText = this.textContent;
				dropdownText.textContent = selectedText;
				dropdown.classList.add("selected"); // Add 'selected' class after selection
				dropdown.classList.remove("open");
			});
		});
	});

	// Close the dropdown if the user clicks outside of it
	window.addEventListener("click", function (event) {
		dropdowns.forEach(function (dropdown) {
			if (!dropdown.contains(event.target)) {
				dropdown.classList.remove("open");
			}
		});
	});
});
