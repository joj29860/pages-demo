<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大眾情緒與股票分析</title>
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">

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

        .select {
            font-size: 1.2rem;
        }

        .chart-area1,
        .chart-area2,
        .chart-area3 {
            /* display: flex; */
            justify-content: space-between;
            /* 將圖弄進範圍內??? */
            margin: 0;
        }

        .forecast {
            width: 100%;
        }

        .chart-area2 {
            justify-content: center;
        }

        .vix,
        .vix-intro,
        .hot-articles {
            width: 32%;
            padding: 0 20px;
            margin-top: 40px;
            background-color: #fff;
        }

        .vix,
        .vix-intro,
        .hot-articles,
        .forecast,
        .emtion,.wordcloud {
            /* 添加陰影 */
            box-shadow: 3px 3px 12px #ccc;
            padding: 3px;
        }

        /* 修改VIX介紹標題 */
        .vix-intro>h5,
        .vix>h5,
        .vix-intro>h5,
        .emtion>h5,
        .wordcloud>h5 {
            text-align: center;
            font-weight: bold;
        }

        .vix-intro>h5,
        .vix>h5,
        .emtion>h5,
        .wordcloud>h5 {
            margin: 5px 0px 20px 0px;
        }


        .vix-intro {
            background-color: #1c49a9;
            color: #fff;
            /* 切介紹圖形與上邊框色 */
            border-radius: 60px 0px;
            /* border: 6px solid #4B4A47; */
            /* 調整文字間距與行距 */
            line-height: 1.6rem;
            letter-spacing: 1.5px;
            padding: 15px;
        }

        .line,
        .title {
            width: 100%;
            text-align: center;
            margin: 0;
        }

        .line {
            border-top: 1px solid #000;
            margin-top: 15px;
            max-width: 120px;
        }

        .subtitle {
            justify-content: center;
            width: 100%;
            margin: 120px 0 50px 0;
            color: #000;
            padding: 15px;
            font-size: 1.3rem;
        }

        .wordcloud,
        .emtion {
            width: 45%;
            text-align: center;
        }

        .wordcloud>img{
            padding:30px;
            width: 100%;
        }

        .forcast {
            width: 100%;
            text-align: center;
        }


        th {
            text-align: center;
            font-size: 1.2rem;
        }

        .table-bordered {
            table-layout: fixed;
            word-wrap: break-word;
            overflow: hidden;
            white-space: nowrap;
        }


        /* 按鈕處有問題，縮小時會換行 */
        .first_row {
            width:100%;
            justify-content:space-between;
            padding: 15px 0;
            display: flex;
        }

        form{
            display: flex;
        }
        
        .glance{
            display:flex;
            /* color: #f4f7f6; */
        }

        .label_2,.label_3{
            margin: 10px 5px;
            text-decoration: underline;
            /* color:#1c49a9; */
        }

        .label_title{
            margin: 10px 5px;
            font-weight: bold;
            font-size: 1.3rem;
            /* color:#1c49a9; */
        }

        .btn {
            width:auto;
            height: fit-content;
            float: right;
            margin: 0 6px;
        }

        .form-control {
            width:auto;
            margin: 0;
        }

        .select {
            width:auto;
            /* 改文字高度與粗體 */
            margin: 6px;
            font-weight: bold;
            text-align: center;
        }

        /* 按鈕處有問題，縮小時會換行 */

        footer {
            height: 150px;
            background-color: #383838;
            color: #fff;
            line-height: 150px;
            text-align: center;
            margin-top: 150px;
        }


    </style>
</head>

<body>
    <nav class="container" style="border-bottom: 1px solid #ccc">
        <div class="row-top">
            <div class="navbar left">
                <a href="/pages-demo/contact_us.php" class="contact">About us</a>
                <a href="http://192.168.0.110:5000/model2" class="predict">Predict</a>
            </div>
            <div class="navbar name">
                <div class="main">大眾情緒與股市分析</div>
            </div>
            <div class="navbar icon">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-line"></i>
            </div>
        </div>
    </nav>

    <main class="container">
        <section class="first_row">         
            
            <div class="glance">
                <h5 class='label_title'>快速導覽:</h5>
                <h5 class='label_2'>情感與大盤走勢</h5>
                <h5 class='label_3'>關鍵字與情感</h5>
            </div>
            <form class="form" action="/pages-demo/project_main.php" method="GET">
                 <label for="exampleFormControlInput1" class='select'>選定日期</label>
                <input type="text" id="my-date" class="form-control" name="searchdate">
                <button type="submit" class="btn btn-primary">送出</button>
            </form>
            
        </section>

        <section class='row chart-area1'>
            <div class="vix">
                <h5>S&P500(VIX)恐慌指數</h5>
                <canvas id="mychart" width="300" height="300" style="padding:10px"></canvas>
            </div>
            <div class="vix-intro">
                <h5>關於VIX指數</h5>
                VIX指數用以反映S&P500指數期貨的波動程度，測量未來三十天市場預期的波動程度，通常用來評估未來分險，因此波動率指數也有人稱作恐慌指數。VIX指數雖然是反映未來三十天的波動程度，卻以年化百分比表示，並且以常態分布的機率出現。通常VIX指數超過40時，表示市場對未來的非理性恐慌，可能短期內出現反彈。相對當VIX指數低於15，表示市場出現非理性繁榮，可能會伴隨著賣壓殺盤。
            </div>
            <div class="hot-articles">
                <table class="table table-bordered">
                    <thead>
                        <th style='border-bottom:2px solid #4B4A47'>PTT熱門文章</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </section>

        <section class="row subtitle">
            <h2 class='title'>社群情感與台股大盤走勢</h2>
            <hr class='line'>
        </section>

        <section class="row chart-area2">
            <div class="forecast">
                <!-- 設定走勢圖的大小 -->
                <canvas id="mixchart" width="600" height="300"></canvas>
            </div>
        </section>

        <section class="row subtitle">
            <h2 class="title">關鍵字雲與情感分布</h2>
            <hr class='line'>
        </section>
        <section class="row chart-area3">
            <div class="wordcloud">
                <h5>該天PTT關鍵字雲</h5>
                <img method = 'GET' src="https://localhost/pages-demo/img/<?=$_GET['searchdate']?>.png" alt="" >
            </div>
            <div class="emtion">
                <h5>該天PTT情感呈現</h5>
                <!-- 設定柱狀圖的大小 -->
                <canvas id="emochart" width="300" height="300" style="padding:20px"></canvas>
            </div>
        </section>
    </main>

    <footer class="container">
        <p>AI人工智慧與資料分析實戰班課程 2021/4/12-2021/6/18</p>  
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
        $(function () {
            $("#my-date").datepicker({
                // 調整格式以配合mysql內資料格式
                altField: "#datepicker",
                altFormat: "yy-mm-dd",
                dateFormat: "yy-mm-dd",
                constrainInput: false
            });
        });
    </script>


    <script>
        // url後那串為api(無論是php或json都能到後台去拿資料)
        $.ajax({
            method: "GET",
            // url: "./covid19/vix.json",
            url: "http://localhost/pages-demo/php/vix.php?searchdate=<?=$_GET['searchdate']?>",

        })
            // 取得key
            .done(function (response) {

                console.log("Date Saved: " + response);
                response = JSON.parse(response);

                // 產生陣列、寫入圖表中
                const date = [];
                const index = [];
                // 直條圖之顏色
                const rgba = [];
                // idex=索引，item=一筆筆資料
                //跑迴圈取資料
                for (let i = 0; i < response.data.length; i++) {
                    const item = response.data[i];
                    date.push(item.Date);
                    index.push(item.Index);
                    rgba.push(`rgba(${getRandomInt(256)}, ${getRandomInt(256)}, ${getRandomInt(256)},0.5)`);
                }
                // 都塞進去後，確認一下目前area的字串+變數
                // console.log('area', area);
                // console.log('ppl', ppl);
                // console.log('rgba', rgba);

                // 呼叫function，設定放入的值
                updateChart(date, index, rgba);
            });

        // 產生直條圖之隨機色
        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max - 50) + 100);
        }

        //丟label,data,backfround的陣列進來：設定出labelArr, dataArr, backgroundArr
        function updateChart(labelArr, dataArr, backgroundArr) {
            // 從chartjs上copy下來的
            var ctx = document.getElementById('mychart').getContext('2d');
            var myChart = new Chart(ctx, {
                // 長條圖
                type: 'polarArea',
                data: {
                    labels: labelArr,
                    datasets: [{
                        label: '# of VIX Index',
                        data: dataArr,
                        backgroundColor: backgroundArr,
                        borderWidth: 1,
                        // borderColor: 'rgba(201, 203, 207)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    </script>

    <script>
        $.ajax({
            method: "GET",
            // url: "./covid19/hit.json",
            url: "http://localhost/pages-demo/php/hit.php?searchdate=<?=$_GET['searchdate']?>",
        })
            .done(function (response) {
                console.log("Data Saved: " + response);
                response = JSON.parse(response);

                for (let i = 0; i < response.data.length; i++) {
                    const item = response.data[i];
                    $('tbody').append(`
                        <tr>
                            <td>
                            ${i+1}．
                            <a class='hot' href="${item.link}">${item.art}</a>
                            </td>
                        </tr>
                    `);
                }

            });


    </script>

    <script>
        // url後那串為api(無論是php或json都能到後台去拿資料)
        $.ajax({
            method: "GET",
            // url: "./covid19/test_data.json",
            url: "https://localhost/pages-demo/php/test_data.php",
            dataType: "json"
        })
            // 取得key
            .done(function (response) {

                console.log("Date Saved: " + response);

                // 產生陣列、寫入圖表中
                const date = [];
                const bi = [];
                const close = [];

                // idex=索引，item=一筆筆資料
                //跑迴圈取資料
                for (let i = 0; i < response.data.length; i++) {
                    const item = response.data[i];
                    date.push(item.date);
                    bi.push(item.BI);
                    close.push(item.close);

                }
                // 都塞進去後，確認一下目前area的字串+變數
                // console.log('area', area);
                // console.log('ppl', ppl);
                // console.log('rgba', rgba);

                updateChartLine(date, bi, close);
            });

        function updateChartLine(labelArr, dataArr, dataArr2) {
            // 從chartjs上copy下來的
            var canvas = document.getElementById('mixchart').getContext('2d');
            new Chart(canvas, {
                // 長條圖
                type: 'line',
                data: {
                    labels: labelArr,
                    datasets: [{
                        // number of 確診數
                        label: 'BI指數',
                        data: dataArr,
                        // 去除原點
                        pointRadius: 0,
                        yAxisID: 'y',
                        // borderWidth: 1
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgba(255, 99, 132)',
                    }, {
                        label: '大盤指數',
                        data: dataArr2,
                        pointRadius: 0,
                        yAxisID: 'y1',
                        // borderWidth: 1
                        backgroundColor:'rgba(102, 99, 255)',
                        borderColor: 'rgba(102, 99, 255)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',

                            // grid line settings
                            grid: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        },
                    }
                }
            });

        }

    </script>

    <script>
    
        $.ajax({
            method: "GET",
            // url: "./covid19/pos_neg.json",
            url: "http://localhost/pages-demo/php/pos_neg.php?searchdate=<?=$_GET['searchdate']?>",
        })
            // 取得key
            .done(function (response) {

                console.log("Date Saved: " + response);
                response = JSON.parse(response);

                // 產生陣列、寫入圖表中
                const date = [];
                const pos = [];
                const neg = [];
                // 顏色
                // const rgba = [];

                // idex=索引，item=一筆筆資料
                //跑迴圈取資料
                for (let i = 0; i < response.data.length; i++) {
                    const item = response.data[i];
                    date.push(item.date);
                    pos.push(item.pos);
                    neg.push(item.neg);
                }
                // 都塞進去後，確認一下目前area的字串+變數
                // console.log('date', date);
                // console.log('pos', pos);
                // console.log('neg', neg);

                // 呼叫function，設定放入的值
                updateChartBar(date, pos, neg);
            });


        function updateChartBar(labelArr, dataArr1, dataArr2) {
            // 從chartjs上copy下來的
            var ctx = document.getElementById('emochart').getContext('2d');
            var emoChart = new Chart(ctx, {
                // 長條圖
                type: 'bar',
                data: {
                    labels: labelArr,
                    datasets: [{
                        label: '正面貼文數',
                        data: dataArr1,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    }, {
                        label: '負面貼文數',
                        data: dataArr2,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }

    </script>

</body>

</html>