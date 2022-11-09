<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add lifestyle</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>


                <?php insertLifestyle(); ?>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lifestyleTitle">lifestyle Title</label>
                            <input type="text" id="inputName" class="form-control" name="ls_title" required>
                        </div>


                        <div class="form-group">
                            <label for="lifestyleCategory">lifestyle Status</label>
                            <select class="custom-select" name="ls_status" required>
                                <option value="draft" active>Select Status</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputClientCompany">lifestyle Image</label>
                            <div id="selectedBanner"></div>

                            <input type="file" class="form-control" id="img" name="ls_image" required>



                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">lifestyle Tags</label>
                            <input type="text" id="inputName" class="form-control" name="ls_tags" required>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">lifestyle Description</label>

                            <textarea name="ls_description" class="form-control" style="height: 20%;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleCOntent">lifestyle Content</label>
                            <textarea name="ls_content" id="summernote" class="form-control" required></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>