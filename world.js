var httpRequest;
var dataString;
var response;
var lookupBtn;
var citylookupBtn;
var url ="https://ad26eb2a119e43e89b202de5e7b4bd28.vfs.cloud9.us-east-1.amazonaws.com/world.php";
window.onload = function (){
    httpRequest = new XMLHttpRequest();
    lookupBtn = document.getElementById("lookup");
    lookupBtn.addEventListener("click", processing);
    
    citylookupBtn = document.getElementById("citylookup");
    citylookupBtn.addEventListener("click", processingCity);
    
    function processing(event){
        event.preventDefault();
        dataString = document.getElementById("country").value.trim();
        url += "?country=" + dataString;
        httpRequest.onreadystatechange = forward;
        httpRequest.open('GET', url);
        httpRequest.send();
    }
    
    function processingCity(event){
        event.preventDefault();
        dataString = document.getElementById("country").value.trim();
        url += "?country=" + dataString +"&context=cities";
        httpRequest.onreadystatechange = forward;
        httpRequest.open('GET', url);
        httpRequest.send();
    }
    
    function forward(){
        
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                alert(httpRequest.responseText);
                response = httpRequest.responseText;
                document.getElementById("result").innerHTML = response;
                url = "https://ad26eb2a119e43e89b202de5e7b4bd28.vfs.cloud9.us-east-1.amazonaws.com/world.php";

            }
        }
    }
}