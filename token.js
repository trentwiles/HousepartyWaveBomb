// Run this in the console to get your API token

var json = localStorage.getItem("profile")
var user = JSON.parse(json)
console.log(user.token)
