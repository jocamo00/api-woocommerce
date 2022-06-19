 /*var url = 'https://kaisustainable.com'
    var key = 'ck_189de7256b695ed711512d3235a37c197ee11fd6'
    var secret = 'cs_b3f4957a5f38fd426f64b0edb6d823238d2bc222'*/


    jQuery(document).ready(function($) {

  
        createSearchProduct();
        pagination();
    
    $('input#submit').click(function(){
        $('btnProducts').removeClass('invisivle');
    });
    
    // list products
        $('#btnProducts').click(function() {
            var url = $('#stp_api_text_field_0').val();
            var key = $('#stp_api_text_field_1').val();
            var secret = $('#stp_api_text_field_2').val();
    
            /*var url = $('input:text[name=stp_api_settings[stp_api_text_field_0]]').val();
            var key = $('input:text[name=stp_api_settings[stp_api_text_field_1]]').val();
            var secret = $('input:text[name=stp_api_settings[stp_api_text_field_2]]').val();*/
    
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
            var url = $('#stp_api_text_field_0').val();
            var key = $('#stp_api_text_field_1').val();
            var secret = $('#stp_api_text_field_2').val();
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
                var url = $('#stp_api_text_field_0').val();
                var key = $('#stp_api_text_field_1').val();
                var secret = $('#stp_api_text_field_2').val();
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
                var url = $('#stp_api_text_field_0').val();
                var key = $('#stp_api_text_field_1').val();
                var secret = $('#stp_api_text_field_2').val();
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
    
    
    