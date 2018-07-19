function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("list").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "responcechat.php", true);
  xhttp.send();
}
function show_chat(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("chatll").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "chatll.php?chat="+id+"", true);
  xhttp.send();
}

function show_chatd(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("chatll").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "chatll.php?chat="+id+"", true);
  xhttp.send();
}
function loadchat(id){
  history.pushState({},"","msg.php?chat="+id+"");
}
function submil(receiver){
  var txt = document.getElementById("msgm").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("divl").innerHTML = this.responseText;
    }
  };
  console.log(txt);
  xhttp.open("GET", "send.php?data="+txt+"&recv="+receiver+"", true);
  console.log("send.php?data="+txt+"&recv="+receiver+"");
  xhttp.send();
  document.getElementById("msgm").value="";
}
/*
  */

function like(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
    }
  };
  xhttp.open("GET", "userlike.php?id="+id+"", true);
  xhttp.send();
  console.log("button hider");
  document.getElementById("likebtn").style.display = "none";
  document.getElementById("dislikebtn").style.display = "block";
}

function dislike(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
    }
  };
  xhttp.open("GET", "userlike.php?did="+id+"", true);
  xhttp.send();
  document.getElementById("dislikebtn").style.display = "none";
  document.getElementById("likebtn").style.display = "block";
}

function block(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert("user Blocked");
    }
  };
  xhttp.open("GET", "block.php?id="+id+"", true);
  xhttp.send();
  document.getElementById("unblock").style.display = "block";
  document.getElementById("block").style.display = "none";
}
function unblock(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert("user Unblocked");
    }
  };
  xhttp.open("GET", "block.php?did="+id+"", true);
  xhttp.send();
  document.getElementById("block").style.display = "block";
  document.getElementById("unblock").style.display = "none";
}




function submit(receiver)
{
  var txt = document.getElementById("msgm").value;
  $.ajax({
      type:"get",
      url: "send.php?data="+txt+"&recv="+receiver+"",
      cache:false,
      success:function(html){
        alert("dhckdh");
      }
  });
  document.getElementById("divl").innerHTML = this.responseText;
}

function newMessage(receiver) {
  submil(receiver);
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage(receiver);
});
