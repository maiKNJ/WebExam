function SponsorText1() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sponsorText").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "sponsor1.txt", true);
  xhttp.send();
  }

function SponsorText2() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sponsorText").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "sponsor2.txt", true);
  xhttp.send();
}
function SponsorText3() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sponsorText").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "sponsor3.txt", true);
  xhttp.send();
}

