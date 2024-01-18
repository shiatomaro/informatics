function ValidateAndSubmit() {
	if (CheckMandatory()) {
	  if (ValidCheck()) {
		if (IntegrationEnabled) {
		  addData();
		}
		return true;
	  } else {
		return false;
	  }
	} else {
	  return false;
	}
  }
  
  function CheckMandatory() {
	MandArray.forEach((field) => {
	  const fieldObj = document.forms.form[field];
	  if (fieldObj) {
		if (fieldObj.nodeName !== null) {
		  if (fieldObj.nodeName === "OBJECT") {
			if (!MandatoryCheckSignature(fieldObj)) {
			  ShowErrorMsg(field);
			  return false;
			}
		  } else {
			const isEmpty = (fieldObj.value.replace(/^\s+|\s+$/g, ""));
			if (isEmpty.length === 0) {
			  if (fieldObj.type === "file") {
				fieldObj.focus();
				ShowErrorMsg(field);
				return false;
			  }
			  fieldObj.focus();
			  ShowErrorMsg(field);
			  return false;
			} else if (fieldObj.nodeName === "SELECT") {
			  if (fieldObj.options[fieldObj.selectedIndex].value === "-Select-") {
				fieldObj.focus();
				ShowErrorMsg(field);
				return false;
			  }
			} else if (fieldObj.type === "checkbox" || fieldObj.type === "radio") {
			  if (!fieldObj.checked) {
				fieldObj.focus();
				ShowErrorMsg(field);
				return false;
			  }
			}
		  }
		} else {
		  let checkedValsCount = 0;
		  const inpChoiceElems = fieldObj;
		  inpChoiceElems.forEach((elem) => {
			if (elem.checked === true) {
			  checkedValsCount++;
			}
		  });
		  if (checkedValsCount === 0) {
			inpChoiceElems[0].focus();
			ShowErrorMsg(field);
			return false;
		  }
		}
	  }
	});
	return true;
  }
  
  document.forms.form.addEventListener("submit", (event) => {
	event.preventDefault();
	if (ValidateAndSubmit()) {
	  event.target.submit();
	}
  });