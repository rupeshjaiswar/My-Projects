"use strict";

function display(num) {
  val = dis = document.getElementById("result").value += num; // console.log(typeof(dis))

  document.getElementById("mydiv").innerHTML = val;
}

function solve() {
  var disp = document.getElementById("result").value; // document.getElementById("result").value = eval(disp); 

  ans = document.getElementById("result").value = eval(disp);
  document.getElementById("mydiv").innerHTML = val + "=" + ans; // disp.forEach((element) => {
  // var ans = eval(disp);
  // )};
}

function backSpace() {
  var val = document.getElementById("result").value;
  back = document.getElementById("result").value = val.substr(0, val.length - 1);
  document.getElementById("mydiv").innerHTML = back;
}

function allClear() {
  document.getElementById("result").value = null;
  document.getElementById("mydiv").innerHTML = null;
}