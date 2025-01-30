<x-app-layout>

    <!--Scripts start-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
    <!--Scripts end-->

    <div class="wizard-v3-content">
        <div class="wizard-form">
            <div class="wizard-header">
                <h3 class="heading">Create Document</h3>
                <p>Fill all necessary fields to go next step</p>
            </div>

            <form class="form-upload" action="#" method="post">
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>
                        <span class="step-icon"><i class="mdi mdi-upload"></i></span>
                        <span class="step-text">Upload</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>Upload Document:</h3>
                            <div class="form-group">
                                <input class="form-control" type="file" id="formFile">
                            </div>

                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>
                        <span class="step-icon"><i class="mdi mdi-information"></i></span>
                        <span class="step-text">File Info</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>General Information:</h3>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="doc-title">Title</label>
                                    <input type="text" class="form-control mt-2" id="doc-title"
                                        placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="doc-desc">Description</label>
                                    <input type="text" class="form-control mt-2" id="doc-desc"
                                        placeholder="Enter Description">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 3 -->
                    <h2>
                        <span class="step-icon"><i class="mdi mdi-file-chart"></i></span>
                        <span class="step-text">More Details</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <h3>More Details:</h3>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="doc-meta-author">Author</label>
                                    <input type="text" class="form-control mt-2" id="doc-meta-author"
                                        placeholder="Enter Author">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="doc-meta-keyword">Keyword</label>
                                    <input type="text" class="form-control mt-2" id="doc-meta-keyword"
                                        placeholder="Enter keyword">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <label for="doc-meta-language">Language</label>
                                    <input type="text" class="form-control mt-2" id="doc-meta-language"
                                        placeholder="Enter language">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>