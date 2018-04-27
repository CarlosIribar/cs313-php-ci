function clickHandler() {
  alert('click me')
}
function colorChange() {
  const elem = document.getElementById('color')
  document.getElementById('first-div').style.background = elem.value
}
