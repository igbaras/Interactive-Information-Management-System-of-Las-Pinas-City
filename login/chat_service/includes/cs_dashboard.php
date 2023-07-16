<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">

                            <?php

                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>
                            <p>Total Posts</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-android-clipboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">

                            <?php

                            $query = "SELECT * FROM lifestyles ";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>
                            <p>Total Lifestyles</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-filing"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php

                            $query = "SELECT * FROM gallery ";
                            $select_all_cat = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_cat);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>

                            <p>Total Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->


                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    var selDiv = "";
    var storedFiles = [];
    $(document).ready(function() {
        $("#img").on("change", handleFileSelect);
        selDiv = $("#selectedBanner");
    });

    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {
            if (!f.type.match("image.*")) {
                return;
            }
            storedFiles.push(f);

            var reader = new FileReader();
            reader.onload = function(e) {
                var html =
                    '<img src="' +
                    e.target.result +
                    "\" data-file='" +
                    f.name +
                    "alt='Category Image'  width='20%'>";
                selDiv.html(html);
            };
            reader.readAsDataURL(f);
        });
    }
</script>