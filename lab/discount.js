const TAX_RATE = 0.05;
let budgetAlertShown = false;

const originalPriceInput = document.getElementById('original-price');
const discountInput = document.getElementById('discount');
const finalPriceInput = document.getElementById('final-price');

function calculateFinalPrice() {
    const originalPriceValue = originalPriceInput.value;
    const discountValue = discountInput.value;


    if (originalPriceValue === "" || discountValue === "") {
        finalPriceInput.value = "";
        budgetAlertShown = false;
        return;
    }

    let originalPrice = Number(originalPriceValue);
    let discount = Number(discountValue);


    if (originalPrice < 0) originalPrice = 0;
    if (discount < 0) discount = 0;
    if (discount > 100) discount = 100;


    originalPriceInput.value = originalPrice;
    discountInput.value = discount;


    const discountAmount = (discount / 100) * originalPrice;


    const finalPrice = (originalPrice - discountAmount) * (1 + TAX_RATE);

    finalPriceInput.value = finalPrice.toFixed(2);


    if (finalPrice < 500 && !budgetAlertShown) {
        alert("🎉 Congrats! You unlocked a Budget Deal!");
        budgetAlertShown = true;
    }


    if (finalPrice >= 500) {
        budgetAlertShown = false;
    }
}


originalPriceInput.addEventListener('input', calculateFinalPrice);
discountInput.addEventListener('input', calculateFinalPrice);