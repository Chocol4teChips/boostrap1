<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <img src="https://a-static.besthdwallpaper.com/one-piece-phanchannii-wx-ll-pepexr-3840x1440-8306_92.jpg"
            class="img-fluid" alt="...">
        <div class="container">
            <div class="row">
                <div class="col-2 " style="background-color:plum">
                    Nav bar
                </div>
                <div class="col-10 ">
                    <div class="row">
                        <div class="col-6" >
                            <figure class="figure">
                                <img src="https://i.pinimg.com/originals/33/bd/ff/33bdfface932f6526cabb176f3f5113b.jpg"
                                    class="figure-img img-fluid rounded"
                                    alt="A generic square placeholder image with rounded corners in a figure."
                                    style="height: 600px;">
                                <figcaption class="figure-caption">Monkey D. Luffy, also known as " Straw Hat Luffy" and commonly as
                                    "Straw Hat", is the main protagonist of the manga and anime,</figcaption>
                            </figure>
                        </div>
                        <div class="col-6">
                            <figure class="figure">
                                <img src="https://i.pinimg.com/originals/3a/cb/d2/3acbd2eb460a71b88727d0dc535b07fc.png"
                                    class="figure-img img-fluid rounded"
                                    alt="A generic square placeholder image with rounded corners in a figure."
                                    style="height: 600px;">
                                <figcaption class="figure-caption">Roronoa Zoro, also known as "Pirate Hunter" Zoro, is the
                                    combatant of the Straw Hat Pirates, and one of their two swordsmen. Formerly a bounty hunter, he
                                    is the second member of Luffy's crew and the first to join it, doing so in the Romance Dawn Arc.
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="container">
                        
                <button id="btnBack"> back </button>

                <div id="main">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody id="tblPost">
                        </tbody>
                    </table>
                </div>


                <div id="detail">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserID</th>
                            </tr>
                        </thead>
                        <tbody id="tblDetails">
                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-12" style="background-color: pink;">
                <p>63104509</p>
                <p>ธันยบูรณ์ พุทธซ้อน</p>
            </div>
        </div>


    </div>

</body>

<script>

    function showDetails(id) {
        $("#main").hide();
        $("#btnBack").show();
        $("#detail").show();

        // console.log(id);
        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='detailROW'";
                line += "><td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>"
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })


    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        var i = 0;
        $("#btnBack").hide();
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    // console.log(item);
                    i++;
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                    if (i == 10) {
                        loadPost().stop();
                    };
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {

            })
    }

    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#btnBack").hide();
            $("#detailROW").remove();
        });
    })
</script>

</html>
