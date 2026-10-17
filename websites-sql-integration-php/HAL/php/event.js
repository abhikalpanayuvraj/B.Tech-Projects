const btn= document.querySelector("#myBtn"); //Accessing the Button 
btn.addEventListener( "click", () => { //Adding event on click
    alert("Button is Clicked!"); // Alert output
});
function handleClick(){ //Defining function
    console.log("Clicked!") // Print in console
};
btn.addEventListener("click", handleClick); //Adding click event = handleClick



// btn.addEventListener("click", (e) => {
// console.log(e.type); // click
// console.log(e.target); // the element that was clicked
// console.log(e.target.id); // its id attribute
// e.preventDefault(); // stop default action (e.g. form submit)
// });




// nn Click event nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
const btn = document.querySelector("#changeBtn");
const box = document.querySelector("#box");
btn.addEventListener("click", () => {
box.style.backgroundColor = "tomato";
box.textContent = "Clicked!";
});
// nn Input event — fires on every keystroke nnnnnnnnnnnn
const input = document.querySelector("#nameInput");
const display = document.querySelector("#nameDisplay");
input.addEventListener("input", () => {
display.textContent = `Hello, ${input.value}!`;
});

// nn Keyboard event nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
document.addEventListener("keydown", (e) => {
console.log(`Key pressed: ${e.key}`);
if (e.key === "Enter") {
alert("You pressed Enter!");
}
})