<?php
session_start();
require_once './versleutel.php';
?>

<html>
        <title>ITPH  ingelogd welkom </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel = "stylesheet" type = "text/css" href="deCss.css">  
    <head>

        <style>
            body
            {
                background-color:#d2d2d2;
            }

            #canvas
            {
                background-color:#000;
                display:block;
                margin:auto;
            }

            #logo {
                text-align: center;
                border: 10px solid black;  
                display:none;
            }



            #welkom {
                text-align: center;
                border: 1px solid blue;                
            }
            #etxt {
                text-align: center;
                border: 1px solid black;                
            }

        </style>

    </head>
    <body onresize="resize_canvas()">
    <!--<body>-->
            <div id="welkom">
            <!--<img   src=https://www.caict.nl/uploads/nieuws/logo-itph-academy.jpg   width="100% ">--> 

                <?php
                $welkomstext = "Welkom ";
                $welkomstext .= $_SESSION['naam'];
                $welkomstext .= " met wachtwoord :  ";
                $welkomstext .= $_SESSION['ww'];
                echo "<div id=txt> <h2> $welkomstext </div>";
                ?>
                <!--<div  id=logo width="400px;" src='pl.png'> aklsdjhfalkjqwerlok</div>-->
<!--<img   src=pl.png height="90%" >--> 

            </div>

        <canvas id=canvas onclick="resize_canvas()"  >



        <!--<canvas id=canvas width="600px" height="400px"></canvas>-->



        </canvas>

        <script>
            
                function resize_canvas(){
//                    console.log("In de resize");
            canvas = document.getElementById("canvas");
            if (canvas.width  < window.innerWidth)
            {
                canvas.width  = window.innerWidth;
            }

            if (canvas.height < window.innerHeight)
            {
                canvas.height = window.innerHeight;
            }
            console.log(canvas.height );
            
        }
            
            
        //        speciaal hier omdat i anders te vroeg laad
            var canvas = document.getElementById("canvas");
            console.log("Na canvas declared ");

            resize_canvas();
            
            console.log(canvas.height );
            console.log(window.innerHeight);
            
//                    alert(canvas);
            var ctx = canvas.getContext("2d");
            var t = text();
//            var logo = document.getElementById('logo');
//            logo.value =  "$welkomstext";
            var lines = [];
            window.setInterval(draw, 100);
            
            
            function draw() {
                if (Math.floor(Math.random() * 2) === 0 && lines.length < 200) {
                    lines.push(new textLine());
                }
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                //voor elke regel in de lines arry teken i een img 
                //met plaatje ti.text op de x coordinaat ti.posx en dat is een methode in textline
                //tl.animate is een methode die iedere keer een ofset y meegeeft

                lines.forEach(function (tl) {
                    ctx.drawImage(tl.text, tl.posX, tl.animate(), 10, 1000);
                });
//                ctx.drawImage(logo, 100, 155, 400, 70);
//                ctx.fillText($welkomstext, 10, 50);
    }
            
            
            function textLine() {
                this.text = t;
                this.posX = (function () {
                    return Math.floor(Math.random() * canvas.width);
                })();
                this.offsetY = -1000;
                this.animate = function () {
                    if (this.offsetY >= 0) {
                        this.offsetY = -1000;
                    }
                    this.offsetY += 5;   // anamatie snelheid
                    return this.offsetY;
                };
            }
            
            
            function text() {
                var offscreenCanvas = document.createElement('canvas');
                offscreenCanvas.width = '10';
                offscreenCanvas.height = '900';
                offscreenCanvas.style.display = 'none';
                document.body.appendChild(offscreenCanvas);
                var octx = offscreenCanvas.getContext('2d');
        //            octx.textAlign =center;
//                octx.shadowColor = "lightgreen";
//                octx.shadowOffsetX = 2;
//                octx.shadowOffsetY = -5;
//                octx.shadowBlur = 1;
                octx.fillStyle =   'darkgreen';
                octx.textAlign = "left";
                var step = 10;
                for (i = 0; i < 200; i++) {
                    var charCode = 0;
                    while (charCode < 60) {
                        charCode = Math.floor(Math.random() * 100);
                    }
                    octx.fillText(String.fromCharCode(charCode), 0, step);
                    step += 10;
                }
                return offscreenCanvas;
            }





        </script>




    </body>
</html>
