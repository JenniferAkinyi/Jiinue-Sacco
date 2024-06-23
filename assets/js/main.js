function calculate() {
    const loanAmount = parseFloat(document.getElementById("loan-amount").value);
    const interestRate = parseFloat(document.getElementById("interest-rate").value);
    const loanTerm = parseFloat(document.getElementById("loan-term").value);

    const monthlyInterestRate = interestRate / 1200;
    const monthlyPayment = loanAmount * monthlyInterestRate / (1 - (Math.pow(1 / (1 + monthlyInterestRate), loanTerm * 12)));
    const totalInterest = monthlyPayment * loanTerm * 12 - loanAmount;
    const totalAmount = monthlyPayment * loanTerm * 12;

    document.getElementById("monthly-payment").value = monthlyPayment.toFixed(2);
    document.getElementById("total-interest").value = totalInterest.toFixed(2);
    document.getElementById("total-amount").value = totalAmount.toFixed(2);
}

var option = document.getElementById("loantype");
var loanType = option.options[option.selectedIndex].value;
function checkOption() {
    loanType = option.options[option.selectedIndex].value;
    if (loanType === "Emergency Loan") {
        $('#interest-rate').val(10);
    }
    if (loanType === "Development Loan") {
        $('#interest-rate').val(12);
    }
    if (loanType === "Instant Loan") {
        $('#interest-rate').val(1);
    }
}
var amount = document.getElementById('loan-amount').innerHTML;
$("#loan-amount").on("change paste keyup", function() {
    if (amount > 500000) {
        var message = "";
        $('#overflow-alert').append("You have exceeded the required amount");
    }
});