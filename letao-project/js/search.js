/**
 * Created by Administrator on 2017/5/26 0026.
 */
window.onload = function () {
    var searchIpt1 = document.getElementsByClassName("searchIpt1")[0];
    var searchIpt2 = document.getElementsByClassName("searchIpt2")[0];
    var searchBtn = document.getElementsByClassName("searchBtn");
    for(var i = 0;i<searchBtn.length;i++){
        if(i == 0){
            searchBtn[i].onclick = function () {
                //window.location.href = "https://www.baidu.com";
                var str = searchIpt1.value;
                var arr = "女鞋,女士鞋,时髦女鞋";
                console.log(str);//有值
                console.log(arr);
                // for(var i = 0;i<arr.length;i++){
                //     var tmp = arr[i];
                //     var reg = new RegExp(tmp,"g");
                //     if(str == tmp){
                //         window.location.href = "https://www.baidu.com";
                //     }
                // }
                var tmp = arr.split(",");
                for(var j = 0;j<tmp.length;j++){
                    if(str == tmp[j]){
                        var search = window.location.search;
                        if (search.indexOf("userName") != -1) {
                            window.location.href = "womenshoes.html?userName=" + userName;
                        }else {
                            window.location.href = "womenshoes.html"
                        }
                    }
                }
            }
        }
        if(i == 1){
            searchBtn[i].onclick = function () {
                //window.location.href = "https://www.baidu.com";
                var str = searchIpt2.value;
                var arr = "女鞋,女士鞋,时髦女鞋";
                console.log(str);//有值
                console.log(arr);
                var tmp = arr.split(",");
                for(var j = 0;j<tmp.length;j++){
                    if(str == tmp[j]){
                        var search = window.location.search;
                        if (search.indexOf("userName") != -1) {
                            window.location.href = "womenshoes.html?userName=" + userName;
                        }else {
                            window.location.href = "womenshoes.html"
                        }
                    }
                }
            }
        }

    }

}
