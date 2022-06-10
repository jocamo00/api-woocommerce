jQuery(document).ready(function($) {

    // Form
    createFormData();

    function createFormData() {
        $('#formData').html(`
            <form method="post">
                <div class="mb-3">
                    <label for="InputUrl" class="form-label">Url</label>
                    <input type="text" class="form-control" id="InputUrl" name="InputUrl">
                </div>
                <div class="mb-3">
                    <label for="InputKey" class="form-label">Key</label>
                    <input type="text" class="form-control" id="InputKey" name="InputKey">
                </div>
                <div class="mb-3">
                    <label for="InputSecret" class="form-label">Secret</label>
                    <input type="text" class="form-control" id="InputSecret" name="InputSecret">
                </div>
                <button type="submit" class="btn btn-primary" name="btnSave" id="btnSave">Save</button>
                <button type="button" class="btn btn-success" name="btnProducts" id="btnProducts">Load Products</button>
            </form>
        `);

    }

        $('#btnProducts').click(function() {
            var settings = {
                "url": "https://kaisustainable.com//wp-json/wc/v3/products?consumer_key=ck_189de7256b695ed711512d3235a37c197ee11fd6&consumer_secret=cs_b3f4957a5f38fd426f64b0edb6d823238d2bc222",
                "method": "GET",
                "timeout": 0,
              };
              
              $.ajax(settings).done(function (response) {
                console.log(response);
              });
        })
            



});