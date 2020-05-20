window.addEventListener("DOMContentLoaded", function() {
	var btnPlus = document.querySelector("#btn-plus"),
			btnMinus = document.querySelector("#btn-minus"),
			count = document.querySelector("#count");

	btnPlus.addEventListener("click", changeCounter);
	btnMinus.addEventListener("click", changeCounter);

	function changeCounter() {
		if (this == btnPlus) {
			enableBtn(btnMinus);
			if (count.value >= 9) {
				disableBtn(this);
			}
			else {
				count.value++;
				if (count.value == 9) {
					disableBtn(this);
				}
			}
		}
		if (this == btnMinus) {
			enableBtn(btnPlus);
			if (count.value <= 1) {
				disableBtn(this);
			}
			else {
				count.value--;
				if (count.value == 1) {
					disableBtn(this);
				}
			}
		}
	}

	function disableBtn(btn) {
		btn.style.opacity = .3;
		btn.style.cursor = "default";
	}

	function enableBtn(btn) {
		btn.style.opacity = 1;
		btn.style.cursor = "pointer";
	}
});

function confirm() {
	var myForm = document.getElementByClass('reservation-form')
   if (confirm("Voulez-vous bien passer cette demande ?" == true)) {
   	myForm.submit();
   }	
   else {
   	window.location.assign("catalogue.php");
   }
}

