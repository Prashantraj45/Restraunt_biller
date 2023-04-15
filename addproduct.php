<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link rel="stylesheet" href="./index.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>

<body>
    <div class="navbar">
        <div class="sec1">
            <p>Product Add</p>
        </div>
        <div class="sec2">
            <form method="POST" id="#product_form">
                <button id="save" type="button" value="submit" onclick="validator()">Save</button>
                <button id="cancel"> <a id="cancel" href="/index1.php">Cancel</a></button>
        </div>
    </div>
    <hr>
    <div class="con">
        <div class="formcon" id="product_form">
            <div class="addcon1">
                <div class="inputcon">
                    <label for="textbox_id">SKU</label>
                    <input type="text" id="sku" name="SKU">
                </div>
                <div class="inputcon">
                    <label for="textbox_id">Name</label>
                    <input type="text" id="name" name="NAME">
                </div>
                <div class="inputcon">
                    <label for="textbox_id">Price($)</label>
                    <input type="text" id="price" name="PRICE">
                </div>
            </div>
            <div class="addcon2">
                <div class="inputcon">
                    <label for="dropdown_id">Type Switcher</label>
                    <select id="productType" name="Type_Switcher">
                        <option value="DVD" id="#DVD">DVD</option>
                        <option value="Book" id="#Book">Book</option>
                        <option value="Furniture" id="#Furniture">Furniture</option>
                    </select>
                </div>
            </div>
            <div class="addcon3" id="type">
                <div class="inputcon" id="DVD" style="display:flex">
                    <label for="textbox_id">Size (MB)</label>
                    <input type="text" id="size" name="SIZE">
                </div>
                <div class="inputcon" id="Book">
                    <label for="textbox_id">Weight (KG)</label>
                    <input type="text" id="weight" name="WEIGHT">
                </div>
                <div class="addcon4" id="Furniture">
                    <div id="fur">
                        <div class="inputcon">
                            <label for="textbox_id">Height (CM)</label>
                            <input type="text" id="height" name="HEIGHT">
                        </div>
                        <div class="inputcon">
                            <label for="textbox_id">Width (CM)</label>
                            <input type="text" id="width" name="WIDTH">
                        </div>
                        <div class="inputcon">
                            <label for="textbox_id">Length (CM)</label>
                            <input type="text" id="length" name="LENGTH">
                        </div>
                    </div>
                </div>
                <div class="inputcon" id="instr">Please, provide Size</div>
            </div>
            <div class="empty" id="empty">Please, submit required data</div>
            <div class="ivd" id="ivd">Please, provide the data of indicated type</div>
        </div>

    </div>
    </form>
    </div>
</body>
<?php

echo '
<script>
function dashboard(){
    $("#cancel")[0].click();
}
var typ={"DVD":"Size","Book":"Weight","Furniture":"Dimensions"};
var arr=["DVD","Book","Furniture"];
$("#productType").change(function () {
        var vl=$("#productType").val();
        var s=`Please, provide ${typ[vl]}`;
        $("#instr").text(`${s}`);
        var id=`#${vl}`;
        for(var i=0;i<3;i++){
            var it=arr[i];
            var all=`#${it}`;
        $(String(all)).css("display","none"); 
        }
        $(String(id)).css("display","flex");
    });

    function validator(){
        var arr=["sku","name","productType","price"];
        var tp={"DVD":["size"],"Book":["weight"],"Furniture":["height","width","length"]};
        var ar=tp[$("#productType").val()];
        arr.push(...ar);
        var chk=0;
        var dt=[];
        var iv=0;
        for(var i=0;i<arr.length;i++){
            var st="#"+arr[i];
            var vl=$(String(st)).val();
            if(vl==null||vl==""){
                chk=1;
                $("#empty").css("display","block");
                break;
            }
            if((i>=0 && i<3 && !isNaN(vl))||( i>2 && isNaN(vl))){
                    iv=1;
                    $("#ivd").css("display","block");
                    break;
            }
            if(i>4){
                dt[4]=dt[4]+"X"+vl;
            }
            else dt.push(vl);
        }
        if(chk==0)$("#empty").css("display","none");
        if(iv==0)$("#ivd").css("display","none");
        if(chk==0 && iv==0){
        $.ajax({
            url:"/database.php",
            type:"POST",
            data:{data:{sku:dt[0],name:dt[1],price:dt[3],productType:dt[2],details:dt[4]}},
            success:function(res){
                console.log(res);
                if(res==200){
                    location.href ="index.php";
                }
            }
         });
        }
        };
    </script>'

    ?>

</html>