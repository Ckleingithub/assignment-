// Get the quantity element
var quantityElement = document.querySelector('.quantity');

// Get the minus and plus buttons
var minusButton = document.querySelector('.minus');
var plusButton = document.querySelector('.plus');

// Get the cart total element
var cartTotalElement = document.querySelector('.cart-total p');

// Get the initial quantity and price
var quantity = parseInt(quantityElement.textContent);
var price = 202999; // Change this to the actual price

// Calculate the total price
var total = calculateTotal(quantity, price);

// Update the total price element
cartTotalElement.textContent = 'Total Price: KSH' + total;

// Add event listener for the minus button
minusButton.addEventListener('click', function() {
  if (quantity > 1) {
    quantity--;
    quantityElement.textContent = quantity;
    total = calculateTotal(quantity, price);
    cartTotalElement.textContent = 'Total Price: KSH' + total;
  }
});

// Add event listener for the plus button
plusButton.addEventListener('click', function() {
  quantity++;
  quantityElement.textContent = quantity;
  total = calculateTotal(quantity, price);
  cartTotalElement.textContent = 'Total Price: KSH' + total;
});

// Function to calculate the total price
function calculateTotal(quantity, price) {
  var tax = 1000; // Change this to the actual tax amount
  return (quantity * price) + tax;
}
