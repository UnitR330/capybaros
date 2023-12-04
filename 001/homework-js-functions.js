//1

function print(text) {
    console.log(text);
}
print("Hello!");

//2

function print2(text2, count) {
    for (let i = 0; i < count; i++) {
      console.log(text2);
    }
  }
  print2("Print me!", 3);

  //4

  function check(number) {
   if(number <= 1 ) {
        return 0;
    }
 
    let count = 0;
  
    for (let i = 2; i <= Math.sqrt(number); i++) {
      if (number % i === 0) {
        count++;
        if (i !== number / i) {
          count++;
        }
      }
    }
  
    return count;
  }
  
  // Example usage:
  const numberToCheck = 1;
  const divisorsCount = check(numberToCheck);
  console.log(`The number ${numberToCheck} has ${divisorsCount} divisors.`);
  
  
    
  
  
  
  
  
  
  
    
  
    
  
  
  
    