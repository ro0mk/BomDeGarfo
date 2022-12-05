<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="estruturacard">
        <div class="cardtodo">
            <div class="cardcab">
                <h5 style="color: #ff6a00;">Sobremesa</h5>
                <h5 style="color: white;">Cozinheiro</h5>
            </div>
            <div class="cardcorpo">
                    <img src="../IMG/receitasimg/bacalhaucombroa.jpg" alt="" class="imgreceita">
                <div class="titulocard">
                    <h1>Serradura <Button onclick="Toggle2()" id="btnh2" class="btn"><i class="far fa-heart"></i></Button></h1>
                </div>
            </div>
            <div class="cardfooter">
                <img src="../IMG/noun-cook-hat-4585881.svg" class="hat" alt="">
                <input type="button" class="btcard" value="Ver Mais">
            </div>
        </div>
    </div>
    <script>
        var btnvar2 = document.getElementById('btnh2');

function Toggle2(){
         if (btnvar2.style.color =="orangered") {
             btnvar2.style.color = "grey"
         }
         else{   
             btnvar2.style.color = "orangered"
         }
}
    </script>
</body>
</html>
<style>
body{
    font-family: 'Poppins', sans-serif;
}
.estruturacard{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}
.cardtodo {
  width: 400px;
  height: 500px;
  background: linear-gradient(to top, #e2e2e1 80%, #ff6a00 20%);
  display: flex;
  flex-direction: column;
  align-items: center;
}
.cardtodo .imgreceita{
    max-width: 350px;
    min-height: 370px;
    padding: 0px 25px;
    object-fit: cover;  
}
.cardcab{
    display: flex;
    justify-content: space-around;
    background: linear-gradient(to right, #fff 50%, #ff6a00 50%);
    margin-top: 35px;
    width: 350px;
    height: 30px;
}
.cardcab h5{
    margin: 0;
    margin-top: 5px;
}
.cardfooter{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
    background-color: white;
    width: 350px;
    height: 40px;
}
.cardfooter .hat{
    width: 30px;
    height: 30px;
}
.btcard{
  background-color: #ff6a00;
  border: none;
  border-radius: 5px;
  padding: 6px 40px;
  font-size: 16px;
  color: white;
  margin: 0;
}
.cardcorpo{
    display: flex;
    flex-direction: column;
}
.titulocard h1{
    margin: 0;
    margin-left: 25px;
    margin-right: 25px;
    padding-left: 20px;
    margin-top: -49px;
    color: white;
    text-shadow: 2px 2px rgba(255, 98, 0, 0.5);
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6));
    display: flex;
    justify-content: space-between;
}
.btns{
    display: flex;
}

.btn{
    background: transparent;
    border: none;
    font-size: 30px;
    outline: none;
    color: white;
    transition: 0.1s;
    float: right;
    margin-right: 20px;
}

.btn i:hover{
    cursor: pointer;
    transition: 0.1s;
}
</style>
