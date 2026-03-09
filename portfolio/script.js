let a = 5, b = 10;

a = a + b;
b = a - b;
a = a - b;

console.log(a, b);

function square(n) {
    return n * n;
}
for (let i = 1; i <= 10; i++) {
    console.log(square(i));

}
let arr = [10, 15, 35, 100];

let max = arr[0];

for (let i = 1; i < arr.length; i++) {
    if (arr[i] > max) {
        max = arr[i];
    }
}

console.log("Largest:", max);