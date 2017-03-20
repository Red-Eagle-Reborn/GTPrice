<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--MUI-->
        <link href="http://cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://use.fontawesome.com/426e009a7d.js"></script>
        <script src="http://cdn.muicss.com/mui-latest/js/mui.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>GTPrice</title>
        <style type="text/css">
            /**
 * Body CSS
 */
            
            html,
            body {
                height: 100%;
                font-family: 'Raleway', sans-serif;
            }
            
            html,
            body,
            input,
            textarea,
            button {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
            }
            /**
 * Header CSS
 */
            
            header {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                z-index: 2;
            }
            
            header ul.mui-list--inline {
                margin-bottom: 0;
            }
            
            header a {
                color: white;
            }
            /**
 * Content CSS
 */
            
            #content-wrapper1 {
                min-height: 100%;
                /* sticky footer */
                margin-bottom: -10px;
            }
            /**
 * Footer CSS
 */
            
            footer {
                height: 60px;
                background-color: #eee;
                border-top: 1px solid #e0e0e0;
                padding-top: 35px;
            }
            
            .custom-category {
                display: none;
                width: 400px;
                height: 300px;
                margin: 100px auto;
                background-color: #fff;
            }
            
            .c-pointer {
                cursor: pointer;
                color: #ffffff;
            }
            
            a:hover {
                text-decoration: none;
            }

        </style>
        <script type="text/javascript">
            var categoryItem = "ALL";
            var categoryItem2 = "Hair"; //soon

            var lastToggle = '';

            $(function () {

                $(".mui-btn--primary")
                    .click(function () {
                        if ($(this)
                            .attr('class') == 'mui-btn mui-btn--primary') {
                            categoryItem = $(this)
                                .attr('value');
                        } else {
                            categoryItem = 'ALL';
                        }
                        $('#btnCatgeory')
                            .val('Category : ' + categoryItem);
                        $('#modalAbout')
                            .modal('toggle');
                        $(this)
                            .toggleClass('mui-btn--primary mui-btn--danger');
                        if (lastToggle != this) {
                            $(lastToggle)
                                .toggleClass('mui-btn--danger mui-btn--primary');
                        }
                        lastToggle = this;
                    });

            });



            function changeStyle() {
                $("#view")
                    .toggleClass('fa-th-list fa-th');
            }

        </script>
    </head>

    <body>
        <header class="mui-appbar mui--z1">
            <div class="mui-container">
                <table width="100%">
                    <tr class="mui--appbar-height">
                        <td class="mui--text-title">GTPrice</td>
                        <td align="right">
                            <ul class="mui-list--inline mui--text-body2">
                                <li><a href="#" class='c-pointer' data-toggle="modal" data-target="#modalContact">Contact</a></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <div class='mui-container' id='content-wrapper1'>
            <div class="mui--text-center">
                <div class="mui--appbar-height"></div>
                <br>
                <br>
                <div class="mui--text-display1">GTPrice</div>
                <br>
                <br>
                <div class="mui--text-headline">Find Growtopia Item Prices Here !</div>
            </div>
            <!--table content-->
            <button class="mui-btn" onclick="changeStyle();">View Style : <i class="fa fa-th-list" aria-hidden="true" id='view'></i>
</button>
            <input type='button' class='mui-btn' data-toggle="modal" data-target="#modalAbout" id='btnCatgeory' value='Category : ALL' />
            <table class="mui-table mui-table--bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ip = "localhost";
                        $user = "root";
                        $password = "";
                        $dbName = "item";

                        $conn = mysqli_connect($ip,$user,$password,$dbName);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $q = "SELECT * FROM itemList";
                        if(isset($_GET['category'])) {
                            $q = "SELECT * FROM itemList WHERE category='" . $_GET['category'] . "'";
                        }
                        $runQuery = mysqli_query($conn,$q);
                        if(mysqli_num_rows($runQuery) > 0) {
                            while ($r = mysqli_fetch_assoc($runQuery)) {
                                echo "<tr>
                                        <td>
                                        " .
                                            $r['name']
                                          . 
                                        "
                                        </td>
                                        <td>" .
                                            $r['price'] . "
                                        </td>
                                      </tr>";
                            }  
                        } else {
                                echo "0 results";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <footer>
            <div class="mui-container mui--text-center">
                Developed by <a href="https://www.facebook.com/bte.svdex" target="_blank">Riezqu Ibnanta</a> and <a href="https://www.facebook.com/darius.redeagle" target='_blank'>Darius Ellert Klaus</a>
            </div>
        </footer>
        <!--hidden popup modal-->
        <div id="modalAbout" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Category</h4>
                    </div>
                    <div class="modal-body" align='center' style='overflow-y:auto'>

                        <ul class="mui-tabs__bar mui-tabs__bar--justified">
                            <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-events-1">Event</a></li>
                            <li><a data-mui-toggle="tab" data-mui-controls="pane-events-2">Other</a></li>
                        </ul>
                        <div class="mui-tabs__pane mui--is-active" id="pane-events-1">
                            <a href="index.php?category=Anniversary" class="mui-btn mui-btn--primary" value='Anniversary'>Anniversary</a>
                            <a href="index.php?category=Valentine" class="mui-btn mui-btn--primary" value='Valentine'>Valentine</a>
                            <a href="index.php?category=St Patrick" class="mui-btn mui-btn--primary" value='St. Patrick'>St. Patrick</a>
                            <a href="index.php?category=Easter Egg" class="mui-btn mui-btn--primary" value='Easter Egg'>Easter Egg</a>
                            <a href="index.php?category=Cinco de Mayo" class="mui-btn mui-btn--primary" value='Cinco de Mayo'>Cinco de Mayo</a>
                            <a href="index.php?category=SummerFest" class="mui-btn mui-btn--primary" value='Summerfest'>SummerFest</a>

                        </div>
                        <div class="mui-tabs__pane" id="pane-events-2">
                            <a href="index.php?category=Wings" class="mui-btn mui-btn--primary" value='Wings'>Wings</a>
                            <a href="index.php?category=Pet" class="mui-btn mui-btn--primary" value='Pet'>Pet</a><br>
                            <a href="index.php?category=Farmables" class="mui-btn mui-btn--primary" value='Farmables'>Farmables</a>
                            <a href="index.php?category=Basic Seed" class="mui-btn mui-btn--primary" value='Basic Seed'>Basic Seed</a>
                        </div>
                        <script>
                            // get toggle elements
                            var toggleEls = document.querySelectorAll('[data-mui-controls^="pane-events-"]');

                            function logFn(ev) {
                                var s = '[' + ev.type + ']';
                                s += ' paneId: ' + ev.paneId;
                                s += ' relatedPaneId: ' + ev.relatedPaneId;
                                console.log(s);
                            }

                            // attach event handlers
                            for (var i = 0; i < toggleEls.length; i++) {
                                toggleEls[i].addEventListener('mui.tabs.showstart', logFn);
                                toggleEls[i].addEventListener('mui.tabs.showend', logFn);
                                toggleEls[i].addEventListener('mui.tabs.hidestart', logFn);
                                toggleEls[i].addEventListener('mui.tabs.hideend', logFn);
                            }

                        </script>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!--contact-->
        <div id="modalContact" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Send Message</h4>
                    </div>
                    <div class="modal-body">
                        <form class="mui-form">
                            <div class="mui-textfield mui-textfield--float-label">
                                <input type="text" style='width:200px;' required>
                                <label>Name</label>
                                <div class="mui-textfield mui-textfield--float-label">
                                    <input type="text" style='width:200px;' required>
                                    <label>Email</label>
                                    <div class="mui-textfield">
                                        <textarea placeholder="Message" required></textarea>
                                    </div>
                                </div>
                        </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="mui-btn mui-btn--accent" data-dismiss="modal">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
    </body>

</html>
