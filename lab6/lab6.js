window.onload=function() {
    function danin(){
        var time=setInterval(add,50);
        function add(){
            var op=document.getElementById("word").style.opacity*100;
            op+=4;
            if(op>=80){
                clearInterval(time);
                op=80;
            }
            document.getElementById("word").style.opacity=op/100;
        }
    }
    function danout(){
        var time2=setInterval(minus,50);
        function minus(){
            var opo=document.getElementById("word").style.opacity*100;
            opo-=4;
            if(opo<=0){
                clearInterval(time2);
                opo=0;
            }
            document.getElementById("word").style.opacity=opo/100;
        }
    }
    document.getElementById("pic1").onclick = function () {
        document.getElementById("picshow").src="images/medium/5855774224.jpg";
        document.getElementById("picshow").title="Battle";
    };
    document.getElementById("pic2").onclick = function () {
        document.getElementById("picshow").src="images/medium/5856697109.jpg";
        document.getElementById("picshow").title="Luneburg";
    };
    document.getElementById("pic3").onclick = function () {
        document.getElementById("picshow").src="images/medium/6119130918.jpg";
        document.getElementById("picshow").title="Bermuda";
    };
    document.getElementById("pic4").onclick = function () {
        document.getElementById("picshow").src="images/medium/8711645510.jpg";
        document.getElementById("picshow").title="Athens";
    };
    document.getElementById("pic5").onclick = function () {
        document.getElementById("picshow").src="images/medium/9504449928.jpg";
        document.getElementById("picshow").title="Florence";
    };
    document.getElementById("featured").onmouseover=function(){
        document.getElementById("word").innerText=document.getElementById("picshow").title;
        danin();
    };
    document.getElementById("featured").onmouseout=function(){
        danout();
    };

};