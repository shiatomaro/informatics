const DateReg = new RegExp("^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$");
const MandArray = [];
const FieldArray = [
    "name_first", 
    "name_middle", 
    "name_last", 
    "date-birth", 
    "male", 
    "female", 
    "previous-school-others",
    "grade-level",
    "first-choice",
    "second-choice",
    "mother-name",
    "mother-occupation",
    "father-name",
    "father-occupation",
    "guardian-name",
    "guardian-occupation",
    "grade-level",
    "first-choice",
    "second-choice",
    "previous-school",
    "payment",
    "nso",
    "form-138",
    "form-137",
    "good-moral",
    "baranggay-clearance",
    "transfer-certificate",
    "terms"
];
const IntegrationEnabled = false;
const salesIQFieldsArray = [];

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
    for (let i = 0; i < MandArray.length; i++) {
        var fieldObj = document.forms.form[MandArray[i]];
        if (fieldObj) {
            if (fieldObj.nodeName != null) {
                if (fieldObj.nodeName == 'OBJECT') {
                    if (!MandatoryCheckSignature(fieldObj)) {
                        ShowErrorMsg(MandArray[i]);
                        return false;
                    }
                } else if (((fieldObj.value).replace(/^\s+|\s+$/g, '')) .length == 0) {
                    if (fieldObj.type == 'file') {
                        fieldObj.focus();
                        ShowErrorMsg(MandArray[i]);
                        return false;
                    }
                    fieldObj.focus();
                    ShowErrorMsg(MandArray[i]);
                    return false;
                } else if (fieldObj.nodeName == 'SELECT') {
                    if (fieldObj.options[fieldObj.selectedIndex].value == '-Select-') {
                        fieldObj.focus();
                        ShowErrorMsg(MandArray[i]);
                        return false;
                    }
                } else if (fieldObj.type == 'checkbox' || fieldObj.type == 'radio') {
                    if (fieldObj.checked == false) {
                        fieldObj.focus();
                        ShowErrorMsg(MandArray[i]);
                        return false;
                    }
                }
            } else {
                var checkedValsCount = 0;
                var inpChoiceElems = fieldObj;
                for (let ii = 0; ii < inpChoiceElems.length; ii++) {
                    if (inpChoiceElems[ii].checked === true) {
                        checkedValsCount++;
                    }
                }
                if (checkedValsCount == 0) {
                    inpChoiceElems[0].focus();
                    ShowErrorMsg(MandArray[i]);
                    return false;
                }
            }
        }
    }
    return true;
}

function ValidCheck() {
    var isValid = true;
    for (let ind = 0; ind < FieldArray.length; ind++) {
        var fieldObj = document.forms.form[FieldArray[ind]];
        if (fieldObj) {
            if (fieldObj.nodeName != null) {
                var checkType = fieldObj.getAttribute("checktype");
                if (checkType == "c2") {
                    if (!ValidateNumber(fieldObj)) {
                        isValid = false;
                        fieldObj.focus();
                        ShowErrorMsg(FieldArray[ind]);
                        return false;
                    }
                } else if (checkType == "c4") {
                    if (!ValidateDateFormat(fieldObj)) {
                        isValid = false;
                        fieldObj.focus();
                        ShowErrorMsg(FieldArray[ind]);
                        return false;
                    }
                }
            }
        }
    }
    return isValid;
}

function ShowErrorMsg(uniqName) {
    var fldLinkName;
    for (let errInd = 0; errInd < FieldArray.length; errInd++) {
        fldLinkName = FieldArray[errInd].split('_')[0];
        document.getElementById(fldLinkName + "error").style.display = 'none';
    }
    var linkName = uniqName.split('')[0];
    document.getElementById(linkName + "_error").style.display = 'block';
}

function ValidateNumber(elem) {
    var validChars = "-0123456789";
    var numValue = elem.value.replace(/^\s+|\s+$/g, '');
    if (numValue != null && numValue.length > 0) {
        var strChar;
        var result = true;
        if (numValue.charAt(0) == "-" && numValue.length == 1) {
            return false;
        }
        for (let i = 0; i < numValue.length && result == true; i++) {
            strChar = numValue.charAt(i);
            if ((strChar == "-") && (i != 0)) {
                result = false;
            }
            if (validChars.indexOf(strChar) == -1) {
                result = false;
            }
        }
        return result;
    } else {
        return true;
    }
}

function ValidateDateFormat(inpElem) {
    var dateValue = inpElem.value.replace(/^\s+|\s+$/g, '');
    if (dateValue == "") {
        return true;
    } else {
        return (DateReg.test(dateValue));
    }
}

$(document).ready(()=>{
    $('#form-submit').preventDefault();
});