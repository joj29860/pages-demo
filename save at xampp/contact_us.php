<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <title>關於我們</title>
    <style>
        body {
            background-color: #f4f7f6;
        }

        .container {
            width: 100%;
            padding: 0;
            /* border: 2px solid palevioletred; */
        }

        .row-top {
            /* 將"聯繫我們"橫過去 */
            display: flex;
            justify-content: space-between;
            margin: 0px 6px;
            padding: 20px 0px;
        }

        .navbar {
            padding: 0;
        }

        .main {
            color: #000;
            display: flex;
            font-size: 2.3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact,.predict {
            color: #000;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .contact {
            margin-right: 10px;
        }

        .fab {
            margin: 3px;
            font-size: 1.7rem;
        }


        .empty-heading {
            margin: 50px;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
        }

        .col>h5 {
            /* 粗體字 */
            font-weight: bold;
            margin-top: 10px;
        }

        .col {
            margin: 1%;
            width: 18%;
            /* 字置中 */
            text-align: center;
            /* 變成圓形 */

        }

        .col img {
            /* 橫過來、塞到同一行 */
            width: 100%;
            /* 調整圖片，滿板剪掉 */
            object-fit: cover;
            border-radius: 50%;
            overflow: hidden;
            margin-top: 10px;
            box-shadow: 3px 3px 12px #ccc;
        }

        form{
            margin-top: 80px;
        }

        label{
            font-weight: bold;
        }

        footer {
            height: 100px;
            background-color: #383838;
        }

        footer>p {
            line-height: 90px;
            color: white;
            text-align: center;
        }

        .contact-content {
            margin-top: 50px;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    <nav class="container" style="border-bottom: 1px solid #ccc">
        <div class="row-top">
            <div class="navbar left">
                <a href="http://192.168.0.110:5000/model2" class="predict">Predict</a>
            </div>
            <div class="navbar name">
                <a href="https://localhost/pages-demo/project_main.php?searchdate=2021-06-01" class="main">大眾情緒與股市分析</a>
            </div>
            <div class="navbar icon">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-line"></i>
            </div>
        </div>
    </nav>
    <main class="container">
        <header class="empty-heading">
            團隊介紹｜聯繫我們
        </header>
        <div class="row members">
            <div class="col">
                <img src="https://localhost/pages-demo/img/member_1.jpeg" alt="">
                <h5>陳冠明</h5>
                <p>資料獲取、機器學習</p>
                <a href="#" class="btn btn-primary">Protfolio</a>
            </div>
            <div class="col">
                <img src="https://localhost/pages-demo/img/member_2.png" alt="">
                <h5>郝逸清</h5>
                <p>機器學習、前後端架設</p>
                <a href="https://www.cakeresume.com/037bc0" class="btn btn-primary">Protfolio</a>
            </div>
            <div class="col">
                <img src="https://localhost/pages-demo/img/member_3.jpg" alt="">
                <h5>曹宇玹</h5>
                <p>情感分析、機器學習</p>
                <a href="#" class="btn btn-primary">Protfolio</a>
            </div>
            <div class="col">
                <img src="https://localhost/pages-demo/img/member_4.jpg" alt="">
                <h5>林佳儒</h5>
                <p>情感分析、機器學習</p>
                <a href="#" class="btn btn-primary">Protfolio</a>
            </div>
            <div class="col">
                <img src="https://localhost/pages-demo/img/member_5.jpg" alt="">
                <h5>黃怡嫣</h5>
                <p>網頁設計、前後端架設</p>
                <!-- <p>MYSQL, HTML, CSS, JS, PHP</p> -->
                <a href="https://www.linkedin.com/in/yiyen-haung/" class="btn btn-primary">Protfolio</a>
            </div>
        </div>
        <div class="contact-content">
            <form id='form' class="cs-content-form" action="connect.php" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">您的姓名</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">您的信箱</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com" name="Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">訊息主旨</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="20字內" name="MTitle">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">訊息內容</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="MContext"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id='submit' name='submit'>確定送出</button>
            </form>
        </div>
    </main>
    <footer class="container">
        <p>
            AI人工智慧與資料分析實戰班課程
            2021/4/12-2021/6/18
        </p>
    </footer>

    <!-- <script>
        $(document).ready(function () {
            $("#submit").on('click', function () {
                $.ajax({
                    method: "POST",
                    url: "connect.php",
                    dataType: "json",
                    data: $("#form").serialize(),
                    success: function (result) {
                        console.log(result);
                    },
                    error: function (result) {
                        console.log(result);
                    }
                })
            });
        });
    </script> -->

</body>

</html>