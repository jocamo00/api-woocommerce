jQuery(document).ready(function($) {
  
    createFormData();
    createSearchProduct();
    pagination();


// create form
    function createFormData() {
        $('#formData').html(`
            <form method="post" id="formCredentials">
                <div class="mb-3">
                    <label for="InputUrl" class="form-label">Url</label>
                    <input type="text" class="form-control" id="InputUrl" name="InputUrl">
                </div>
                <div class="mb-3">
                    <label for="InputKey" class="form-label">Customer key</label>
                    <input type="text" class="form-control" id="InputKey" name="InputKey">
                </div>
                <div class="mb-3">
                    <label for="InputSecret" class="form-label">Customer secret</label>
                    <input type="text" class="form-control" id="InputSecret" name="InputSecret">
                </div>
                <button type="button" class="btn btn-success mt-2" name="btnProducts" id="btnProducts">Load Products</button>
                <button type="submit" class="btn btn-primary mt-2 ms-2 invisible" name="btnSave" id="btnSave">Save</button>
            </form>
        `);
    }


// save form
    /*$('#btnSave').click(function() {
        var Url = document.getElementById('InputUrl').value;
        var Key = document.getElementById('InputKey').value;
        var Secret = document.getElementById('InputSecret').value;

        var route = "InputUrl="+Url+"&InputKey="+Key+"&InputSecret="+Secret;

        $.ajax({
            url: 'products.php',
            type: 'POST',
            data: route,
        })
        .fail(function() {
            console.log("error");
        })
        .always (function() {
            console.log('complete');
        })
    });*/


// list products
    $('#btnProducts').click(function() {
        var url = $('input:text[name=InputUrl]').val();
        var key = $('input:text[name=InputKey]').val();
        var secret = $('input:text[name=InputSecret]').val();

        $('#tableData').html(`
            <table class="table table-striped mt-5">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock status</th>
                    <th>Stock quantity</th>
                </tr>
                </thead>
                <tbody id="res"></tbody>
            </table>
        `);

        $('#pagination').removeClass('invisible');

        var settings = {
            "url": `${url}/wp-json/wc/v3/products?consumer_key=${key}&consumer_secret=${secret}`,
            "method": "GET",
            "timeout": 0,
        };
        
        $.ajax(settings).done(function (response) {
            let i = 0;
            $('#res').html('');
            for (let item of response) {
                i++;
                res.innerHTML += `
                    <tr>
                        <td id='${i}'>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${item.price}</td>
                        <td>${item.stock_status}</td>
                        <td>${item.stock_quantit}</td>
                    </tr>
                `}
        });

        $('#btnSave').removeClass('invisible');
    });     
        

// create search 
    function createSearchProduct() {
        $('#searchData').html(`
            <form class="d-flex justify-content-end" role="search">
                <input type="text" class="text me-2" name="SearchProduct" id="InputSearch" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-outline-secondary" name="btnSearch" id="btnSearch">Search</button>
            </form>
        `);
    }


// search products
    function searchProduct() {
        var url = $('input:text[name=InputUrl]').val();
            var key = $('input:text[name=InputKey]').val();
            var secret = $('input:text[name=InputSecret]').val();
            var search = $('input:text[name=SearchProduct]').val();
            
            $('#tableData').html(`
                <table class="table table-striped mt-5">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock status</th>
                        <th>Stock quantity</th>
                    </tr>
                    </thead>
                    <tbody id="res"></tbody>
                </table>
            `);

            var settings = {
                "url": `${url}/wp-json/wc/v3/products?search=${search}&consumer_key=${key}&consumer_secret=${secret}`,
                "method": "GET",
                "timeout": 0,
            };
            
            
            $.ajax(settings).done(function (response) {
                $('#res').html('');
                for (let item of response) {
                    res.innerHTML += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td>${item.stock_status}</td>
                            <td>${item.stock_quantit}</td>
                        </tr>
                    `}
            });
    }
        $( "#InputSearch" ).keyup(function() {
            searchProduct();
          });

        $('#btnSearch').click(function() {
            searchProduct();
        });


// pagination
    function pagination() {
        var numPagination = 1;

        $('#pagination').html(`
            <button type="button" class="btn btn-outline-dark invisible" id="btnBack"><--</button>
            <button type="button" class="btn btn-outline-dark" id="btnNext">--></button>
        `);

        $('#btnNext').click(function() {
            var url = $('input:text[name=InputUrl]').val();
            var key = $('input:text[name=InputKey]').val();
            var secret = $('input:text[name=InputSecret]').val();
            numPagination ++;

            if(numPagination > 1) {
                $('#btnBack').removeClass('invisible');
            } else {
                $('#btnBack').addClass('invisible');
            }

            var settings = {        
                "url": `${url}/wp-json/wc/v3/products?page=${numPagination}&consumer_key=${key}&consumer_secret=${secret}`,
                "method": "GET",
                "timeout": 0,
            };
            
            $.ajax(settings).done(function (response) {
                $('#res').html('');
                for (let item of response) {
                    console.log(item);
                    res.innerHTML += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td>${item.stock_status}</td>
                            <td>${item.stock_quantit}</td>
                        </tr>
                    `}
            });
        });
        
        $('#btnBack').click(function() {
            var url = $('input:text[name=InputUrl]').val();
            var key = $('input:text[name=InputKey]').val();
            var secret = $('input:text[name=InputSecret]').val();
            numPagination --;

            if(numPagination > 1) {
                $('#btnBack').removeClass('invisible');
            } else {
                $('#btnBack').addClass('invisible');
            }

            var settings = {
                "url": `${url}/wp-json/wc/v3/products?page=${numPagination}&consumer_key=${key}&consumer_secret=${secret}`,
                "method": "GET",
                "timeout": 0,
            };
            
            $.ajax(settings).done(function (response) {
                $('#res').html('');
                for (let item of response) {
                    console.log(item);
                    res.innerHTML += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td>${item.stock_status}</td>
                            <td>${item.stock_quantit}</td>
                        </tr>
                    `}
            });
        });
    }       
});


