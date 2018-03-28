/**
 * Created by Administrator on 2017/6/1 0001.
 */
$(document).ready(function () {

    /*var box = document.getElementsByClassName("box")[0];
    var small = document.getElementsByClassName("small")[0];
    var smallImg = document.getElementsByClassName("smallImg")[0];
    var mask = document.getElementsByClassName("mask")[0];
    var big = document.getElementsByClassName("big")[0];
    var bigImg = document.getElementsByClassName('bigImg')[0];*/
   var box = $('.box');
   console.log($('.box'));

    var small = $(".small");
   console.log(small);

    var smallImg = $(".smallImg");
    var mask = $(".mask");
    var big = $(".big");
    var bigImg = $(".bigImg");

    //先调整 大图的宽高 ，让 遮罩 跟 大图片的比例对应
    //比例关系  遮罩宽度/小图宽度 =  big宽度/大图宽度
    //大图宽度 = big宽度 * 小图宽度/遮罩宽度
    /*var bigImgWidth = parseInt(getStyle(big).width) * small.offsetWidth / parseInt(getStyle(mask).width);
    var bigImgHeight = parseInt(getStyle(big).height) * small.offsetHeight / parseInt(getStyle(mask).height);
     bigImg.style.width = bigImgWidth + "px";
     bigImg.style.height = bigImgHeight + "px";
    */
    var small = $(".small");
    var mask = $(".mask");

    var big = $(document).find(".big").eq(0);
    console.log($(big).width());


    var bigImgWidth = parseInt($(".big").width()) * $(".small").offsetWidth / parseInt($(".mask").width());
    var bigImgHeight = parseInt($(".big").height()) * $(".small").offsetHeight / parseInt($(".mask").height());

    $(".bigImg").width(bigImgWidth);
    $(".bigImg").height(bigImgHeight);
    console.log(bigImgWidth);
    console.log(bigImgHeight);
    //console.log(bigImg);
    //console.log(bigImg.style.width);//1100px

    console.log($(small)[0]);


    $(document).on("mouseenter", ".small", function () {
        //alert(33333);
        $(".mask").show();
        $(".big").show();
    })
    $(document).on("mouseleave", ".small", function () {
        //alert(33333);
        $(".mask").hide();
        $(".big").hide();
    })
    $(document).on("mousemove", ".small", function () {

        var e = event || window.event;
        var mask = $(".mask");
        var box = $(".box");
        var small = $(".small");
        //鼠标移入时，让遮罩随着鼠标移动
        var maskX = e.pageX - $(mask)[0].offsetWidth/2 - $(box)[0].offsetLeft;//遮罩左上点的位置
        var maskY = e.pageY - $(mask)[0].offsetWidth/2- $(box)[0].offsetTop;
       // console.log(maskX);
        //console.log($(mask)[0].offsetWidth/2);
        //边界处理
        if(maskX < 0){
            maskX = 0;
        }else if(maskX > $(small)[0].offsetWidth - $(mask)[0].offsetWidth){
            maskX = $(small)[0].offsetWidth - $(mask)[0].offsetWidth;
        }
        if(maskY < 0){
            maskY = 0;
        }else if(maskY > $(small)[0].offsetWidth - $(mask)[0].offsetWidth){
            maskY = $(small)[0].offsetWidth - $(mask)[0].offsetWidth;
        }
        console.log(maskX,maskY);

        $(".mask").css({"left":maskX,"top": maskY});



        //遮罩移动时，大图要随比例移动
        //比列关系：遮罩移动的距离 /小图的宽度 = 大图移动的距离/大图的宽度
        //大图移动的距离 =大图的宽度* 遮罩移动的距离 /小图的宽度
        // bigImg.style.left = - maskX * bigImgWidth/small.offsetWidth + "px";
        // bigImg.style.top = - maskY * bigImgHeight/small.offsetWidth + "px";
        // console.log(bigImg.style.left);

        $(".bigImg").css({"left":- maskX * bigImgWidth/$(small)[0].offsetWidth,"top":- maskY * bigImgHeight/$(small)[0].offsetWidth});

    })

    //当点击最小图时，
    var ssmall = document.getElementsByClassName("sosmall")[0];
    var lis = $(".sosmall li");//ssmall.getElementsByTagName("li");
    for(var i = 0;i < lis.length;i++){
        lis[i].index = i;
        lis[i].onclick = function () {
            for(var j = 0;j < lis.length;j++){
                lis[j].className = " ";
            }
            lis[this.index].className = "current";

            //smallImg.src = "images/img7/CZ708_017_" + (this.index+1) +".JPG";
            //bigImg.src = "images/img7/CZ708_017_"+ (this.index+1) +".JPG";
            $.ajax({
                type: "get",
                url: "http://localhost/letao_select_goodId.php",
                data: {goodId: goodid},
                dataType: "json",
                success: function (data) {
                    var html = "";
                    for (var i = 0; i < data.length; i++) {
                        var tmp = data[i];
                        console.log(tmp);
                        var goodSrc = tmp["goodSrc"];
                        console.log(goodSrc);
                        var temp = goodSrc.split("1.")[0];
                        console.log(temp);
                        smallImg.src = "images/img7/"+temp + (this.index+1) +".JPG";
                        bigImg.src = "images/img7/"+temp + (this.index+1) +".JPG";
                        //images/img7/CZ708_017_2.JPG
                    }
                }
            });
        }
    }

})
