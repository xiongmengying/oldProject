/**
 * Created by Administrator on 2017/5/2 0002.
 */


//获取计算 样式  显示样式
function getStyle(obj) {
    if(obj.currentStyle){//说明current对象 存在  ie
        //ie
        return obj.currentStyle;
    }else{
        //fei ie
        //return getComputedStyle(obj);
        return getComputedStyle(obj);

    }
}


function animate(box,obj,callback) {
    clearInterval(box.time);
    box.time = setInterval(function () {
        var flag = true;//假设已经到达目的地

        for(var key in obj){
            if(key == "opacity"){
                //如果是透明度
                var current = parseFloat(getStyle(box)[key])*100;//当前目标
                var target = obj[key]*100;//目的地坐标
                var step = (target - current)/10;//步长
                step = (step > 0?Math.ceil(step):Math.floor(step));//若step大于0，就向上取整，小于0，向下取整
                var op = current + step;
                box.style[key] = op/100;

            }else{
                //x和y坐标
                var current = parseFloat(getStyle(box)[key]);//当前目标
                var target = obj[key];//目的地坐标
                var step = (target - current)/10;//步长
                step = (step > 0?Math.ceil(step):Math.floor(step));//若step大于0，就向上取整，小于0，向下取整

                box.style[key] = current + step + "px";


            }
            if(current != target){
                flag = false;//没有到达目的地
            }
        }
        if(flag == true){
            clearInterval(box.time);
            if(callback){
                callback();
            }
        }
    },50)
}