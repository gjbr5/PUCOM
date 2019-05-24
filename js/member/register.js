JotForm.init(function () {
    setTimeout(function () {
        $('input_10').hint('ex: myname@example.com');
    }, 20);
    JotForm.alterTexts({
        "confirmClearForm": "Are you sure you want to clear the form",
        "lessThan": "Your score should be less than"
    });
    /*INIT-END*/
});

JotForm.prepareCalculationsOnTheFly([null, null, null, null, {
    "name": "name",
    "qid": "4",
    "text": "Name",
    "type": "control_fullname"
}, {"name": "address", "qid": "5", "text": "Address", "type": "control_address"}, {
    "name": "homeNumber",
    "qid": "6",
    "text": "Home Number",
    "type": "control_phone"
}, {
    "name": "cellularNumber",
    "qid": "7",
    "text": "Cellular Number",
    "type": "control_phone"
}, null, {"name": "workNumber", "qid": "9", "text": "Work Number", "type": "control_phone"}, {
    "name": "email10",
    "qid": "10",
    "text": "E-mail",
    "type": "control_email"
}, null, null, {
    "name": "website",
    "qid": "13",
    "text": "Website",
    "type": "control_textbox"
}, null, null, null, null, null, null, null, null, null, {
    "name": "signatureDate",
    "qid": "23",
    "text": "Signature date",
    "type": "control_textbox"
}, null, null, null, {
    "name": "submitForm",
    "qid": "27",
    "text": "Apply for Membership",
    "type": "control_button"
}, {
    "name": "clickTo28",
    "qid": "28",
    "text": "Membership Application",
    "type": "control_head"
}, {"name": "signature29", "qid": "29", "text": "Signature", "type": "control_signature"}]);
setTimeout(function () {
    JotForm.paymentExtrasOnTheFly([null, null, null, null, {
        "name": "name",
        "qid": "4",
        "text": "Name",
        "type": "control_fullname"
    }, {"name": "address", "qid": "5", "text": "Address", "type": "control_address"}, {
        "name": "homeNumber",
        "qid": "6",
        "text": "Home Number",
        "type": "control_phone"
    }, {
        "name": "cellularNumber",
        "qid": "7",
        "text": "Cellular Number",
        "type": "control_phone"
    }, null, {
        "name": "workNumber",
        "qid": "9",
        "text": "Work Number",
        "type": "control_phone"
    }, {
        "name": "email10",
        "qid": "10",
        "text": "E-mail",
        "type": "control_email"
    }, null, null, {
        "name": "website",
        "qid": "13",
        "text": "Website",
        "type": "control_textbox"
    }, null, null, null, null, null, null, null, null, null, {
        "name": "signatureDate",
        "qid": "23",
        "text": "Signature date",
        "type": "control_textbox"
    }, null, null, null, {
        "name": "submitForm",
        "qid": "27",
        "text": "Apply for Membership",
        "type": "control_button"
    }, {
        "name": "clickTo28",
        "qid": "28",
        "text": "Membership Application",
        "type": "control_head"
    }, {"name": "signature29", "qid": "29", "text": "Signature", "type": "control_signature"}]);
}, 20);
