const amountPlaceholder = document.querySelector('#amount');
const rangeInput = document.querySelector('[type="range"]');

if (rangeInput) {
  amountPlaceholder.innerText = rangeInput.value;
  rangeInput.addEventListener('input', e => {
    amountPlaceholder.innerText = e.target.value;
  });
}

const msg = document.querySelector('[data-removable]');
 
 
 
 
 
 