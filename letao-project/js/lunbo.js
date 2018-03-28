/**
 * Created by Administrator on 2017/5/26 0026.
 */

    var item = document.getElementsByClassName("item")[0];
    var lis = item.getElementsByTagName("li");

    var point = document.getElementsByClassName("point")[0];
    var pointLis = point.getElementsByTagName("li");

    var leftBtn = document.getElementsByClassName("banner-prev")[0];
    var rightBtn = document.getElementsByClassName("banner-next")[0];


    var imgNum = lis.length;//轮播图片的数量
    var imgWidth = lis[0].offsetWidth;//图片宽度
    console.log(imgNum,imgWidth);

    var lastLi = lis[0].cloneNode(true);//在末尾添加一个图片，克隆第一张，true  深拷贝(包含子节点) false 浅拷贝 不包含子节点
    item.appendChild(lastLi);

    var box = document.getElementsByClassName("box")[0];
    var current = 0;
    pointLis[current].style.backgroundColor = "orangered";

    rightBtn.onclick = function () {
        //pointLis[current].style.background = "rgba(255,255,255,0.5)";
        current ++;
        // console.log(current);
        if(current == (imgNum + 1)){
            item.style.left = 0 + "px";
            current = 1;
        }

        animate(item,{left:-imgWidth*current});
        //pointLis[current].style.backgroundColor = "orangered";
        for(var i=0;i<pointLis.length;i++){
            pointLis[i].style.background = "rgba(255,255,255,0.5)";
        }
        if(current == imgNum){
            pointLis[0].style.background = 'orangered'

        }else{

            pointLis[current].style.background = 'orangered'

        }

    }

    leftBtn.onclick = function () {
        current --;
        console.log(current);
        if(current == -1){
            item.style.left = -imgNum*imgWidth + "px";
            current = imgNum - 1;
        }
        console.log(item.style.left);
        animate(item,{left:-imgWidth*current})
        for(var i=0;i<pointLis.length;i++){
            pointLis[i].style.background = "rgba(255,255,255,0.5)";
        }
        if(current == imgNum){
            pointLis[0].style.background = 'orangered'
        }else{
            pointLis[current].style.background = 'orangered'
        }
    }

    //自动轮播
    var timer = null;  // 这里的timer必须要在外面定义，作为全局变量
    function autoPlay() {
        timer = setInterval(function () {
            rightBtn.onclick();
        },3000);
    }
    // autoPlay();
    timer = setInterval(function () {
        rightBtn.onclick();
    },3000);

    // 鼠标移到图片上时，图片不会进行切换
    var box = document.getElementsByClassName("banner")[0];
    box.onmouseenter= function () {
        console.log("鼠标进入");
        clearInterval(timer);
    };
    box.onmouseleave = function () {
        console.log("鼠标离开");
        // autoPlay();
        if(timer){
            clearInterval(timer);
        }
        timer = setInterval(function () {
            rightBtn.onclick();
        },3000);
    };

    //鼠标移到圆点上，进行图片切换
    for(var i = 0;i < pointLis.length;i++){
        pointLis[i].index = i;
        pointLis[i].onmouseenter = function () {

            pointLis[current].style.background = "rgba(255,255,255,0.5)";
            current = this.index;
            animate(item,{left:-imgWidth*current});
            pointLis[current].style.backgroundColor = "orangered";

        }
    }
