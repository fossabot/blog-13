<div class="blog-form">
    <div class="section-heading-4 heading-dark">
        <h3 class="item-heading">WRITE A COMMENT</h3>
    </div>
    <form class="contact-form-box" action="" method="POST">
        @csrf
        <div class="row gutters-15">
            <div class="col-md-4 form-group">
                <label for="first_name" class="sr-only"></label>
                <input id="first_name" type="text" placeholder="Name*" class="form-control" name="first_name"
                       data-error="Name field is required" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="col-md-4 form-group">
                <label for="email" class="sr-only"></label>
                <input id="email" type="email" placeholder="E-mail*" class="form-control" name="email"
                       data-error="E-mail field is required" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="col-md-4 form-group">
                <label for="website" class="sr-only"></label>
                <input id="website" type="text" placeholder="Website*" class="form-control" name="website"
                       data-error="website field is required" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="col-12 form-group">
                <label for="content" class="sr-only"></label>
                <textarea id="content" placeholder="Write your comments ..." class="textarea form-control"
                          name="content" rows="8" cols="20" data-error="Message field is required"
                          required></textarea>
                <div class="help-block with-errors"></div>
            </div>
            <div class="col-12 form-group">
                <button class="item-btn" type="button">POST COMMENT</button>
            </div>
        </div>
        <div class="form-response"></div>
    </form>
</div>
