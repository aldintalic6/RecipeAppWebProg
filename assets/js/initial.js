/*
alert("world");
*/

const person = {"first_name" : "John", "last_name" : "Doe"};

console.log(person.first_name);
console.log(person["last_name"]);

const cars = ["BMW", "Volvo", "AMG"];

console.log(cars[0]);
cars[cars.length] = "MAN";
console.log(cars[cars.length-1]);
console.log(cars.sort());

function hello() {
    alert("hello from function");
}

console.log("Type of 2 is = " + typeof 2);
console.log(typeof cars);
console.log(typeof person);
console.log(typeof "world");

function display(text) {
    document.getElementById("demo").innerHTML = text;
}

function greeting(text) {
    alert(text);
}



let text = '{ "employees" : [' +
'{ "firstName":"John" , "lastName":"Doe" },' +
'{ "firstName":"Anna" , "lastName":"Smith" },' +
'{ "firstName":"Peter" , "lastName":"Jones" } ]}';

console.log(text);

const obj = JSON.parse(text);
console.log(obj);
for (var i = 0; i < obj.employees.length; i++) {   
console.log(obj.employees[i].firstName);  // prints all first names from text; first needs to be parsed (line 43)
}

